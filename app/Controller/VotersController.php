<?php
App::uses('AppController', 'Controller');
/**
 * Voters Controller
 *
 * @property Voter $Voter
 */
class VotersController extends AppController {


    // extended method from AppController where we can set administrative privilidges
    public function isAuthorized($user) {
    	// allow anybody logged in to access any view
    	return true;
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		// the elements from the url we set above are read 
        // automagically by cake into $this->passedArgs[]
        // eg:
        // $passedArgs['Search.id'] = 47
        // $passedArgs['Search.name'] = SomeName
 
        // we want to set a title containing all of the
        // search criteria used (not required)     
        $title = array();
         
        // filter by id
        //var_dump($this->passedArgs);
        //die();

        if(isset($this->passedArgs['Search.id']) && $this->passedArgs['Search.id'] !== '') {
 			var_dump("filter by ID: " . $this->passedArgs['Search.id']);
 			
            // set the conditions
            $this->paginate['conditions'][]['Voter.id'] = $this->passedArgs['id'];
 
            // set the Search data, so the form remembers the option
            $this->data['Search']['id'] = $this->passedArgs['id'];
 
            // set the Page Title (not required)
            $title[] = __('ID',true).': '.$this->passedArgs['id'];
        } else {

	        // filter by name
	        if(isset($this->passedArgs['Search.name']) && $this->passedArgs['Search.name'] !== '') {
	            var_dump("filter by Name: " . $this->passedArgs['Search.name']);
	            
	            //$this->paginate['conditions'][]['Voter.name LIKE'] = str_replace('*','%',$this->passedArgs['Search.name']);
	            //$this->data['Search']['name'] = $this->passedArgs['Search.name'];
	            $title[] = __('Name',true).': '.$this->passedArgs['Search.name'];
	        }
	        else {
		   		// get voters
				$this->Voter->recursive = 0;
				//var_dump($this->Voter);
				//die();
				$this->set('voters', $this->paginate());
		 		//$voters = $this->paginate();

				// set title
		        $title = implode(' | ',$title);
		        $title = (isset($title)&&$title)?$title:__('All Posts',true);
		         
		        // set related data
		        //$tags = $this->Voter->Tag->find('list');
		        //$this->set(compact('voters','tags','title'));	        	
	        }
	    }
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Voter->exists($id)) {
			throw new NotFoundException(__('Invalid voter'));
		}
		$options = array('conditions' => array('Voter.' . $this->Voter->primaryKey => $id));
		
		// set voter variable for use on form
		$resultset = $this->Voter->find('first', $options);
		$this->set('voter', $resultset);
	}


	// this function will handle our search results
	public function search_result()
	{
		//var_dump($this->params->query);
		//die();
		// Was the export button clicked?
    	if(stristr($this->params->query['submitbutton'], 'export')) {
    		// DO NOT USE RequestAction() here it will slow performance
    		$this->setAction('export');
    	} else {
    		// query voters based on search criteria
        	$resultset = $this->query_voters($this->params->query);
    		$this->set('voters', $resultset);	
    	}
	}

	// this function will handle the search input
	public function search() {
    } 


    // this function will export the current input screen to CSV format
	public function export() {
		// do not allow any HTML to return from this function
		$this->autoRender = false;

		//ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large

		// query voters based on search criteria
    	$resultset = $this->query_voters($this->params->query);

		//create a file
		$filename = "voter_list_".date("Ymd").".csv";
		$csv_file = fopen('php://output', 'w');

		// create the header and specify CSV
 		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename="'.$filename.'"');

		// The column headings of your .csv file
		$header_row = array("VoterID", "FirstName", "LastName", "Street #", "Street Name", "City", "State", "Zip Code", "Phone", "Party", "\r\n");
		fputcsv($csv_file, $header_row);

		// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
		foreach($resultset as $voter)
		{
			
			if (strlen($voter['Voter']['Phone']) == 11) {
				$areacode = substr($voter['Voter']['Phone'], 0, 3);
				$phoneNumber = substr($voter['Voter']['Phone'], 3, 8);
				$voter['Voter']['Phone'] = $areacode . "-" . $phoneNumber;
			}
			
			$row = array(
				$voter['Voter']['VoterID'],
				$voter['Voter']['FirstName'],
				$voter['Voter']['LastName'],
				$voter['ResidentialAddress']['StreetNumber'],
				$voter['ResidentialAddress']['Address1'],
				$voter['ResidentialAddress']['City'],
				$voter['ResidentialAddress']['State'],
				$voter['ResidentialAddress']['Zip'],
				$voter['Voter']['Phone'],
				$voter['Affiliation']['Party'],
//				$voter['MailingAddress']['Address1'] . ' ' . $voter['MailingAddress']['City'] . ' ' . $voter['MailingAddress']['State'] . ' ' . $voter['MailingAddress']['Zip'],
				"\r\n"
			);
			fputcsv($csv_file, $row);
		}
		fclose($csv_file);
	}


	// this function will query for a voter list given the voter search array
	private function query_voters($voter)
	{
		// flags to know if we need to join a table or not
		$affiliationFlag = false;
		$voterHistoryFlag = false;

		// make sure we can execute big selects
		$sql = "SET SQL_BIG_SELECTS=1";
		$this->Voter->query($sql);

		// build conditions for database query
    	$conditions = array();
    	if(!empty($voter['firstName'])) {
    		$conditions['Voter.FirstName LIKE'] = '%' . $voter['firstName'] . '%';
    	}
    	if(!empty($voter['lastName'])) {
    		$conditions['Voter.LastName LIKE'] = '%' . $voter['lastName'] . '%';
    	}
    	if(!empty($voter['gender'])) {
    		$conditions['Voter.Gender'] = $voter['gender'];
    	}
    	if (!empty($voter['address'])) {
    		$conditions['ResidentialAddress.Address1 LIKE'] = '%' . $voter['address'] . '%';
    	}
    	if (!empty($voter['city'])) {
    		$conditions['ResidentialAddress.City'] = $voter['city'];
    	}
    	if (!empty($voter['zip'])) {
    		$conditions['ResidentialAddress.Zip'] = $voter['zip'];
    	}
    	//if (!empty($voter['district'])) {
    	//	$conditions['Affiliation.District'] = $voter['district'];
    	//}
    	if (!empty($voter['countylegislativedistrict'])) {
    		$affiliationFlag = true;
    		$conditions['Affiliation.CountyLegislativeDistrict'] = $voter['countylegislativedistrict'];
    	}
    	if (!empty($voter['town'])) {
    		$affiliationFlag = true;
    		$conditions['Affiliation.Town'] = $voter['town'];
    	}
    	if (!empty($voter['ward'])) {
    		$affiliationFlag = true;
    		$conditions['Affiliation.Ward'] = $voter['ward'];
    	}
    	if (!empty($voter['party'])) {
    		$affiliationFlag = true;
    		$conditions['Affiliation.Party'] = $voter['party'];
    	}    	
    	if (!empty($voter['election_years'])) {
    		$voterHistoryFlag = true;
    		//var_dump($voter['election_years']);
    		//die();
    		$election_year_array = array();
    		foreach ($voter['election_years'] as $election_year) {
    			$election_year_array[] = $election_year;
    			//array_push($conditions, array('ElectionHistory.CodeYear' => $election_year));
    		}
    		$conditions['ElectionHistory.CodeYear'] = $election_year_array;
    		//$conditions['ElectionHistory.CodeYear'] = array('AND' => $election_year_array);
    		//array_push($conditions, 'AND' => array('ElectionHistory.CodeYear' => $election_year_array));

    	}
    	if (!empty($voter['positions'])) {
    		//var_dump($voter['positions']);
    		foreach ($voter['positions'] as $position) {
    			$conditions['Position.' . $position] = true;
    		}
    		
    	}
		//var_dump($conditions);
		//die();

    	/*
    	//*******************************************************************************
    	// NOTE: NOT USED FOR PAGINATION, KEPT AROUND FOR LEGACY PURPOSES, DO NOT DELETE
    	//*******************************************************************************
    	// set options for Find All 
    	$options = array(
    		'joins' => array(
		        //array('table'=>'election_history', 'alias'=>'ElectionHistory', 'type'=>'LEFT', 'conditions'=>array('Voter.VoterID = ElectionHistory.VoterID'))//,
		        //array('table'=>'address', 'alias'=>'ResidentialAddress', 'type'=>'LEFT', 'conditions'=>array('Voter.AddressResidentialID = ResidentialAddress.AddressID')),
		        //array('table'=>'address', 'alias'=>'MailingAddress', 'type'=>'LEFT', 'conditions'=>array('Voter.AddressMailingID = ResidentialAddress.AddressID')),
		        //array('table'=>'affiliation', 'alias'=>'Affiliation', 'type'=>'LEFT', 'conditions'=>array('Voter.AffiliationID = Affiliation.AffiliationID'))
		    ),
		    'conditions' => $conditions, //array of conditions
		    'recursive' => 0, 	// automated joins producing a BIG resultset
		    //'recursive' => -1,	// -1 doesn't do ANY joins for us, we need to do them manually
		    'fields' => array('DISTINCT Voter.FirstName', 'Voter.LastName', 'Voter.Gender', 'Voter.Phone', 'ResidentialAddress.StreetNumber', 'ResidentialAddress.Address1', 'ResidentialAddress.City', 'ResidentialAddress.State', 'ResidentialAddress.Zip', 'MailingAddress.Address1', 'MailingAddress.City', 'MailingAddress.State', 'MailingAddress.Zip', 'Affiliation.Party'), //array of field names
		    //'order' => array('ResidentialAddress.City', 'ResidentialAddress.Address1', 'ResidentialAddress.StreetNumber', 'Voter.LastName', 'Voter.FirstName') //, //string or array defining order
		    //'group' => array('Model.field'), //fields to GROUP BY
		    //'limit' => n, //int
		    //'page' => n, //int
		    //'offset' => n, //int
		    //'callbacks' => true //other possible values are false, 'before', 'after'
		);
		//var_dump($options);
		//die();
    	//*******************************************************************************
    	// NOTE: NOT USED FOR PAGINATION, KEPT AROUND FOR LEGACY PURPOSES, DO NOT DELETE
    	//*******************************************************************************
		*/

		//create JOIN array only if we need it
		$joinArray = array();
		if ($voterHistoryFlag === true) {
			$voterHistoryArray = array(
				'table'=>'election_history', 
				'alias'=>'ElectionHistory', 
				'type'=>'LEFT', 
				'conditions'=>array('Voter.VoterID = ElectionHistory.VoterID')
			);
			array_push($joinArray, $voterHistoryArray);
		}

		// variable to allow for pagination and defines its properties
		$this->paginate = array(
			'conditions' => $conditions, 	// array of conditions above
			'fields' => array('DISTINCT Voter.FirstName', 'Voter.LastName', 'Voter.Gender', 'Voter.Phone', 'ResidentialAddress.StreetNumber', 'ResidentialAddress.Address1', 'ResidentialAddress.City', 'ResidentialAddress.State', 'ResidentialAddress.Zip', 'MailingAddress.Address1', 'MailingAddress.City', 'MailingAddress.State', 'MailingAddress.Zip', 'Affiliation.Party'), //array of field names
			'limit' => 20,					// pagination result limit
	        'recursive' => 0, 				// automated joins producing a BIG resultset
		    //'recursive' => -1,			// -1 doesn't do ANY joins for us, we need to do them manually
		    //'order' => array('Voter.Name' => 'asc')
	        //'joins' => array(
		        //array('table'=>'election_history', 'alias'=>'ElectionHistory', 'type'=>'LEFT', 'conditions'=>array('Voter.VoterID = ElectionHistory.VoterID')))
		        //array('table'=>'address', 'alias'=>'ResidentialAddress', 'type'=>'LEFT', 'conditions'=>array('Voter.AddressResidentialID = ResidentialAddress.AddressID'))
			//)
			'joins' => $joinArray
	    );

    	// NOTE: use this resultset for PAGED data
		$resultset = $this->paginate('Voter');

    	// NOTE: use this resultset for NON-PAGED data
    	//$resultset = $this->Voter->find('all', $options);

		//var_dump($resultset);
		//die();
		$this->set(compact('Voter'));

		
    	//var_dump($resultset);
    	//die();
		return $resultset;
	}



/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 	public function edit($id = null) {
		if (!$this->Voter->exists($id)) {
			throw new NotFoundException(__('Invalid voter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			// we have posted back so we need to do a save

			// created date
			//$this->request->data['Voter']['Created']['month'] = date('m');
			//$this->request->data['Voter']['Created']['day'] = date('d');
			//$this->request->data['Voter']['Created']['year'] = date('y');
			
			if ($this->Voter->save($this->request->data)) {
				$this->Session->setFlash(__('The voter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voter could not be saved. Please, try again.'));
			}
		} else {
			// else we are displaying data only
			$options = array('conditions' => array('Voter.' . $this->Voter->primaryKey => $id));
			$this->request->data = $this->Voter->find('first', $options);
	
			// set voter variable for use on form
			$this->set('voter', $this->request->data);

		}
		$residentialAddresses = $this->Voter->ResidentialAddress->find('list');
		$this->set(compact('residentialAddresses'));
	}
*/

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
	public function delete($id = null) {
		$this->Voter->id = $id;
		if (!$this->Voter->exists()) {
			throw new NotFoundException(__('Invalid voter'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Voter->delete()) {
			$this->Session->setFlash(__('Voter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Voter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
 */



}

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

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Voter->create();
			
			// get plumbing variables
			$this->request->data['Voter']['Created']['month'] = date('m');
			$this->request->data['Voter']['Created']['day'] = date('d');
			$this->request->data['Voter']['Created']['year'] = date('y');


			// save request
			if ($this->Voter->save($this->request->data)) {
				$this->Session->setFlash(__('The voter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voter could not be saved. Please, try again.'));
			}
		}
		$residentialAddresses = $this->Voter->ResidentialAddress->find('list');
		$this->set(compact('residentialAddresses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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


	// this function will handle the search functionality and redirect back to the index page to display the results
	public function search() {

        if ($this->request->is('post')) {
        	
        	if(stristr($this->params['data']['submitbutton'], 'export')) {
        		//$this->export($resultset);
        		//$this->redirect(array('action'=>'export', $resultset));
        		$this->setAction('export');
        		//$this->requestAction(array('action'=>'export'), array('pass'=>$resultset), array('return'));
        	} else {
        		// query voters based on search criteria
	        	$resultset = $this->query_voters($this->data['Voter']);
        		$this->set('voters', $resultset);	
        	}
		}
    } 


	public function export() {
		// do not allow any HTML to return from this function
		$this->autoRender = false;

		//ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large

		// query voters based on search criteria
    	$resultset = $this->query_voters($this->data['Voter']);

		//create a file
		$filename = "voter_list_".date("Ymd").".csv";
		$csv_file = fopen('php://output', 'w');

		// create the header and specify CSV
 		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename="'.$filename.'"');

		// The column headings of your .csv file
		$header_row = array("VoterID", "FirstName", "LastName", "Gender", "\r\n");
		fputcsv($csv_file, $header_row);

		// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
		foreach($resultset as $voter)
		{
			$row = array(
				$voter['Voter']['VoterID'],
				$voter['Voter']['FirstName'],
				$voter['Voter']['LastName'],
				"\r\n"
			);
			fputcsv($csv_file, $row);
		}
		fclose($csv_file);
	}


	// this function will query for a voter list given the voter search array
	private function query_voters($voter)
	{
		// build conditions for database query
    	$conditions = array();
    	if (!empty($voter['name'])) {
			$conditions = array('OR' => array(
			    array('Voter.FirstName LIKE' => '%' . $voter['name'] . '%'),
			    array('Voter.LastName LIKE' => '%' . $voter['name'] . '%')
			));
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
    	if (!empty($voter['party'])) {
    		$conditions['Affiliation.Party'] = $voter['party'];
    	}
    	//if (!empty($voter['election_year_start'])) {
    	//	$ele_year_start = $voter['election_year_start'];
    	//	if(strlen($ele_year_start > 2)) {
    	//		$ele_year_start = substr($ele_year_start, -2);
    	//	}
    	//	if(!empty($voter['election_year_end'])) {
    	//		$ele_year_end = $voter['election_year_end'];
    	//		if(strlen($ele_year_end > 2)) {
    	//			$ele_year_end = substr($ele_year_end, -2);
    	//		} else { 
    	//			$ele_year_end = substr(date("Y"), -2);
    	//		}
    	//	}
    	//	$conditions['ElectionHistory.Year'] = $ele_year;
    	//}
    	//if (!empty($voter['election_code'])) {
    	//	$conditions['ElectionHistory.ElectionCode'] = $voter['election_code'];
    	//}

    	//var_dump($voter['election_years']);
    	if (!empty($voter['election_years'])) {
    		//var_dump($voter['election_years']);
    		//die();
    		$election_year_array = array();
    		foreach ($voter['election_years'] as $election_year) {
    			//$conditions['ElectionHistory.CodeYear'] = $election_year);
    			$election_year_array[] = $election_year;
    		}
    		$conditions['ElectionHistory.CodeYear'] = $election_year_array;
    	}

    	if (!empty($voter['positions'])) {
    		//var_dump($voter['positions']);
    		foreach ($voter['positions'] as $position) {
    			$conditions['Position.' . $position] = true;
    		}
    		
    	}

    	// set options for Find All 
    	$options = array(
    		
    		'joins' => array(
		        array('table'=>'election_history', 'alias' => 'ElectionHistory', 'type' => 'INNER', 'conditions' => array('Voter.VoterID = ElectionHistory.VoterID'))//,
		        //array('table'=>'address', 'alias' => 'ResidentialAddress', 'type' => 'INNER', 'conditions' => array('Voter.AddressResidentialID = ResidentialAddress.AddressID'))
		    ),
		    'conditions' => $conditions, //array of conditions
		    'recursive' => 0, //int
		    'fields' => array('DISTINCT Voter.VoterID', 'Voter.FirstName', 'Voter.LastName', 'Voter.Gender', 'ResidentialAddress.Address1', 'ResidentialAddress.City', 'ResidentialAddress.Zip', 'Affiliation.Party'), //array of field names
		    'order' => array('Voter.LastName', 'Voter.FirstName', 'ResidentialAddress.City') //, //string or array defining order
		    //'group' => array('Model.field'), //fields to GROUP BY
		    //'limit' => n, //int
		    //'page' => n, //int
		    //'offset' => n, //int
		    //'callbacks' => true //other possible values are false, 'before', 'after'
		);
		//var_dump($options);
		//die();

    	$resultset = $this->Voter->find('all', $options);
    	//var_dump($resultset);
    	//die();
		return $resultset;
	}



}

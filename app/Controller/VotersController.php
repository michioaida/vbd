<?php
App::uses('AppController', 'Controller');
/**
 * Voters Controller
 *
 * @property Voter $Voter
 */
class VotersController extends AppController {

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
		$this->set('voter', $this->Voter->find('first', $options));
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
        	//var_dump($this->data['Voter']['q']);
        	//$this->set('Voters', $this->Voter->search($this->data['Voter']['q']));

        	$options = array(
			    'conditions' => array('Voter.LastName' => $this->data['Voter']['q']), //array of conditions
			    //'conditions' => array('Voter.LastName' => 'Voter.LastName = ? OR Voter.FirstName = ?' => array($this->data['Voter']['q'], $this->data['Voter']['q'])),
			    'recursive' => 0, //int
			    //'fields' => array('Model.field1', 'DISTINCT Model.field2'), //array of field names
			    'order' => array('Voter.LastName') //, //string or array defining order
			    //'group' => array('Model.field'), //fields to GROUP BY
			    //'limit' => n, //int
			    //'page' => n, //int
			    //'offset' => n, //int
			    //'callbacks' => true //other possible values are false, 'before', 'after'
			);
        	$this->set('voters', $this->Voter->find('all', $options));
		}
    } 


}

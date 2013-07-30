<?php
App::uses('AppController', 'Controller');
/**
 * Positions Controller
 *
 * @property Position $Position
 */
class PositionsController extends AppController {


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
		$this->Position->recursive = 0;
		$this->set('positions', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Position->exists($id)) {
			throw new NotFoundException(__('Invalid position'));
		}
		$options = array('conditions' => array('Position.' . $this->Position->primaryKey => $id));
		$this->set('position', $this->Position->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		// get voter object from querystring and display information
		$voterID = $this->request->query['id'];
		Controller::loadModel('Voter');
		$this->set('voter', $this->Voter->find('first', array('conditions' => array('Voter.VoterID' => $voterID))));
			
		if ($this->request->is('post')) {
			// create the new position object and add to database
			$this->Position->create();
			foreach($this->request->data['Position']['positions'] as $position) {
				$this->Position->set($position, true);
			}
			
			if ($this->Position->save($this->request->data)) {
				// save the relationship between new position record and the voter
				ClassRegistry::init("Voter")->save_voter_position($voterID, $this->Position->id);

				$this->Session->setFlash(__('The position has been saved'));

				// redirect back to voter view
				$this->redirect(array('controller'=>'Voters', 'action'=>'view', $voterID));
			} else {
				$this->Session->setFlash(__('The position could not be saved. Please, try again.'));
			}
		}
	}


	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		// get voter object from querystring
		$voterID = $this->request->query['id'];

		if (!$this->Position->exists($id)) {
			throw new NotFoundException(__('Invalid position'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			
			$voter_positions_old = $this->Position->find('first', array('conditions' => array('Position.PositionID' => $id)));
			$voter_positions_new = $this->request->data['Position']['positions'];
			// need to accont for empty list
			if ($voter_positions_new === '') $voter_positions_new = array();
			$voter_positions_save['PositionID'] = $id;

			//var_dump($voter_positions_old);
			//var_dump($voter_positions_new);

			foreach($voter_positions_old['Position'] as $key => $value) {
				//var_dump($key . ' - ' . $value);
				if (array_search($key, $voter_positions_new) !== false) {
					//var_dump($key . " is in array");
					$voter_positions_save[$key] = true;
				} else {
					// do not modify PostionID as it is the primary key
					if (strpos('PositionID', $key) === false) {
						//var_dump($key . ' is NOT in array');
						$voter_positions_save[$key] = false;
					}
				}
			}
			//var_dump($voter_positions_save);
			//die();
			
			//if ($this->Position->save($this->request->data)) {
			if ($this->Position->save($voter_positions_save)) {
				$this->Session->setFlash(__('The positions has been saved'));
				
				// redirect back to voter view
				$this->redirect(array('controller'=>'Voters', 'action'=>'view', $voterID));

			} else {
				$this->Session->setFlash(__('The position could not be saved. Please, try again.'));
			}
		} else {
			// get and display voter information
			Controller::loadModel('Voter');
			$this->set('voter', $this->Voter->find('first', array('conditions' => array('Voter.VoterID' => $voterID))));

			$options = array('conditions' => array('Position.' . $this->Position->primaryKey => $id));
			$this->request->data = $this->Position->find('first', $options);
		}
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Position->id = $id;
		if (!$this->Position->exists()) {
			throw new NotFoundException(__('Invalid position'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Position->delete()) {
			$this->Session->setFlash(__('Position deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Position was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Addresses Controller
 *
 * @property Address $Address
 */
class AddressesController extends AppController {

public $helpers = array('AppHelp');
			
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Address->recursive = 0;
		$this->set('addresses', $this->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		$options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
		$this->set('address', $this->Address->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		// we only have address information, no voter info
		//var_dump($this->request->data);
		//die();

		// if we have a POST then we need to save the record, else just display form
		if ($this->request->is('post')) {
			$this->Address->create();

			// attempt to save information
			if ($this->Address->save($this->request->data)) {
				
				// get which voterID and the button was clicked from querystring
				$voterID = $this->request->query['vid'];
				$buttonClicked = $this->request->query['btn'];
				//var_dump($button_click);
				//die();

				// save the relationship between new address and the voter
				ClassRegistry::init("Voter")->save_voter_address($voterID, $this->Address->id, $buttonClicked);

				$this->Session->setFlash(__('The address has been saved'));
				$this->redirect(array('controller'=>'Voters', 'action' => 'view', $voterID));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
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
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
			$this->request->data = $this->Address->find('first', $options);
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
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Address->delete()) {
			$this->Session->setFlash(__('Address deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Address was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

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
		if ($this->request->is('post')) {
			$this->Position->create();
			if ($this->Position->save($this->request->data)) {
				$this->Session->setFlash(__('The position has been saved'));
				$this->redirect(array('action' => 'index'));
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
		if (!$this->Position->exists($id)) {
			throw new NotFoundException(__('Invalid position'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Position->save($this->request->data)) {
				$this->Session->setFlash(__('The position has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The position could not be saved. Please, try again.'));
			}
		} else {
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

<?php
App::uses('AppController', 'Controller');
/**
 * Affiliations Controller
 *
 * @property Affiliation $Affiliation
 */
class AffiliationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Affiliation->recursive = 0;
		$this->set('affiliations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Affiliation->exists($id)) {
			throw new NotFoundException(__('Invalid affiliation'));
		}
		$options = array('conditions' => array('Affiliation.' . $this->Affiliation->primaryKey => $id));
		$this->set('affiliation', $this->Affiliation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Affiliation->create();
			if ($this->Affiliation->save($this->request->data)) {
				$this->Session->setFlash(__('The affiliation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The affiliation could not be saved. Please, try again.'));
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
		if (!$this->Affiliation->exists($id)) {
			throw new NotFoundException(__('Invalid affiliation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Affiliation->save($this->request->data)) {
				$this->Session->setFlash(__('The affiliation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The affiliation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Affiliation.' . $this->Affiliation->primaryKey => $id));
			$this->request->data = $this->Affiliation->find('first', $options);
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
		$this->Affiliation->id = $id;
		if (!$this->Affiliation->exists()) {
			throw new NotFoundException(__('Invalid affiliation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Affiliation->delete()) {
			$this->Session->setFlash(__('Affiliation deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Affiliation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

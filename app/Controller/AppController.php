<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	/*
	public function save_voter_address($voterID, $addressType) {
		//var_dump($voterID . ' ' . $addressType);
		//die();
		
		//var_dump($this->{$this->modelClass});
		//die();
		var_dump(ClassRegistry::init("Voter")->find($voterID));
		die();

		if (!$this->{$this->Voter}->exists($id)) {
			var_dump("not found");
			die();
			throw new NotFoundException(__('Invalid voter'));
		}

		$options = array('conditions' => array('Voter.' . $this->{$this->Voter}->primaryKey => $id));
		//$this->set('voter', $this->Voter->find('first', $options));
		$voterUpdate = $this->{$this->Voter}->find('first', $options);
		var_dump($voterUpdate);
		die();

	}
	*/
}

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

	// addition of authentication to component array to redirect upon login/logout
	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'voters', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
            'authorize' => array('Controller')  // this line is called ControllerAuthorize which allows you to handle authorization checks in a controller callback (used in conjunction with isAuthorized($user))
        )
    );


	// use beforeFilter to add authentication exceptions
	public function beforeFilter() {
        // tell the AuthComponent to not require a login for all index and view actions, in every controller 
        // this works in every controller because we defined this in AppController, if you want to authenticate individual controllers put this code in those specific controllers
        //$this->Auth->allow('index', 'view');
    }


    // use this function to see if a user is an administrator
    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            //var_dump("We are authorized!");
            //die();
            return true;
        }

        // Default deny
        //var_dump("We are NOT authorized");
        //die();
        return false;
    }

}

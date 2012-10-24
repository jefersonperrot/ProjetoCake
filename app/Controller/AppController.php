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
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array('Session', 'Auth');

	public function isPrefix($prefix) {
		return isset($this->request->params['prefix']) &&
		$this->request->params['prefix'] == $prefix;
	}
	
	public function beforeFilter() {
	
		if ($this->isPrefix('painel'))
			$this->layout = 'painel'; // Layout para o prefixo
		
		parent::beforeFilter();
		
		$this->Auth->authenticate = array('Form' => array(
			'userModel' => 'Usuario',
			'fields' => array(
				'username' => 'login',
				'password' => 'senha'
			)
		));
		$this->Auth->loginAction = array(
			'controller' => 'usuarios',
			'action' => 'login',
			'painel' => true
		);
		if (!$this->isPrefix('painel'))
			$this->Auth->allow();
	}

}

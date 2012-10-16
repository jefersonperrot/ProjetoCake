<?php
class UsuariosController extends AppController {
	
	function painel_add() {
		if (!empty($this->data)) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->data)) {
				$this->Session->setFlash(__('O Usuário foi criado corretamente', true));
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('O usuário não foi criado .Por favor , tente outra vez', true));
			}
		}
	}
	
	
	public function painel_login() {
		if ($this->Auth->login()) {
			// $this->redirect($this->Auth->redirect());
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash('Dados incorretos!');
		}
		// $this->layout = "login";
	}
	
	public function painel_logout() {
		$this->redirect($this->Auth->logout());
	}
	
	function painel_index() {
		$this->redirect(array('controller' => 'palestras', 'action' => 'painel_add'));
	}	
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('painel_add');
	}
}
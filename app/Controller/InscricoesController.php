<?php

// App::uses('AppController', 'Controller');

class InscricoesController extends AppController {

	public $uses = array('Inscricao', 'Cidade', 'Estado');
	
	public $scaffold = 'painel';
		
	//Action da Inscri��o
	// public function index() {
		
		// $this->set('cidades', array('0'=>'Selecione um estado'));
		// $this->set('estados', $this->Cidade->Estado->find('list'));
		// $this->render('inscricao');
	
	// }
	
	// public function inscricao() {
		
		// $isPost = $this->request->isPost();

		// if ($isPost && !empty($this->request->data['Inscricoes'])) {
		
		   // if ($this->Inscricao->save($this->request->data['Inscricoes'])) {
				
				// $this->render('inscricao_realizada');
				
		   // } 
		   
		// } else {

			// $this->set('cidades', array('0'=>'Selecione um estado'));
			// $this->set('estados', $this->Cidade->Estado->find('list'));
			// $this->render('inscricao');
		
		// }	
	// }
	
	
	public function inscricao() {
		// Se a requisi��o for um POST
		if ($this->request->is('post')) {
			// Conseguiu salvar a inscri��o?
			if ($this->Inscricao->save($this->request->data)) {
				$this->redirect(array('controller' => 'pages', 'action' => 'display', 'agradecimento'));
			} else {
				
			}
		}
		
		$this->set('cidades', array(''=>'Selecione um estado'));
		$this->set('estados', $this->Cidade->Estado->find('list'));
		$this->render('inscricao');
		
	}

}

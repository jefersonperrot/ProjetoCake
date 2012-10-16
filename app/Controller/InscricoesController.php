<?php
class InscricoesController extends AppController {
	public $uses = array('Inscricao', 'Cidade', 'Estado');
	
	public $scaffold;
	
	//Action da Inscrição
	public function index() {
		
		// $this->set('cidades', array('0'=>'Selecione um estado'));
		// $this->set('estados', $this->Cidade->Estado->find('list'));
		// $this->render('inscricao');
	
	}
	
	public function inscricao() {
		
		$isPost = $this->request->isPost();

		if ($isPost && !empty($this->request->data['Inscricoes'])) {
		
		  // Tenta salvar os dados da inscrição
		   if ($this->Inscricao->save($this->request->data['Inscricoes'])) {
				
				// Registro inserido com sucesso!
				$this->render('inscricao_realizada');
				
		   } 
		   
		} else {

			$this->set('cidades', array('0'=>'Selecione um estado'));
			$this->set('estados', $this->Cidade->Estado->find('list'));
			$this->render('inscricao');
		
		}	
	}
}

<?php
class InscricoesController extends AppController {

	public $uses = array('Inscricao');
	
	//Action da Inscrição
	public function index() {
		
		$this->render('inscricao');
	
	}
	
	public function inscricao() {
		
		$isPost = $this->request->isPost();
		
		if ($isPost && !empty($this->request->data['Inscricoes'])) {
		
		  // Tenta salvar os dados da inscrição
		   if ($this->Inscricao->save($this->request->data['Inscricoes'])) {
				
				// Registro inserido com sucesso!
				$this->render('inscricao_realizada');
		   }
		   
		} 
		
		
	}
}

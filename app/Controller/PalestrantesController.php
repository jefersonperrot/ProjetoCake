<?php
class PalestrantesController extends AppController {

	public $uses = array('Palestrante');
	
	public $scaffold;
	
	//Listagem das Palestras
	public function index() {
		
		$params = array(
			'fields' => array('Palestrante.nome', 'Palestrante.descricao', 'Palestrante.endereco_site'),
			'order' => array('Palestrante.nome ASC')
		);
		
		$listagem = $this->Palestrante->find('all', $params);
		$this->set('listagem', $listagem);
		
		
		$this->render('index');
	
	}
	
	
	public function view($id) {
	
		$this->Palestrante->id = $id;
		$dados = $this->Palestrante->read();
		$this->set('palestrante', $dados);
		
		$this->render('detalhes_palestrante');
	
	}
			
}

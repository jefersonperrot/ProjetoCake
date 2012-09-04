<?php
class PalestrasController extends AppController {

	public $uses = array('Palestra', 'Palestrante');
	
	//Listagem das Palestras
	public function index() {
		
		$params = array(
			'order' => array('Palestra.inicio ASC')
		);
		
		$listagem = $this->Palestra->find('all', $params);
		$this->set('listagem', $listagem);
		
		
		$this->render('index');
	
	}
	
	public function CadastrarPalestra() {
		
		if(!empty($this->data['CadastroPalestra'])) {
		
		   if ($this->Palestra->save($this->request->data['CadastroPalestra'])) {		
		   
				$this->redirect(array('controller'=>'palestras', 'action'=>'index'));;
				
			}			
			
		} else {
		
			$palestrantes = $this->Palestrante->find('list');
			$this->set('palestrante', $palestrantes);
			
			$this->render('formulario_palestra');
		
		}
		
	}
		
	
		
		
}

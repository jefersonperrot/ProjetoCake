<?php
class PalestrasController extends AppController {

	public $uses = array('Palestra', 'Palestrante');
	public $helpers = array ('Html','Form');
	
	public $scaffold = 'painel';
	
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
		
		if(!empty($this->data)) {
		// die(pr($this->data));
		   if ($this->Palestra->save($this->request->data)) {		
		   
				$this->redirect(array('controller'=>'palestras', 'action'=>'index'));
				
			}	else {
					$this->Session->write('Palestra', $this->data);
					$this->Session->write('erros', $this->Palestra->invalidFields());
					$this->Session->setFlash('Erro ao cadastrar cliente');
					$this->redirect($this->referer());
			}			
			
		} else {
		
			$palestrantes = $this->Palestrante->find('list');
			$this->set('palestrante', $palestrantes);
			// date_default_timezone_set('America/Sao_Paulo'); 
			// setlocale(LC_ALL, "pt_BR", "ptb");
			$this->render('formulario_palestra');
		
		}
		
	}
		
	
		
		
}

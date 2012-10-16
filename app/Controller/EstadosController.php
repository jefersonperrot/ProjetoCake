<?php

	class EstadosController extends AppController {

		var $helpers = array('Paginator');
		var $paginate = array(
        	'limit' => 25,
        	'order' => array(
        	    'Estado.nome' => 'asc'
        	)
    	);
		
		function index() {
			$this->paginate['Estado']['fields'] = array('id', 'nome', 'uf');
			$this->set('estados', $this->paginate('Estado'));
		}
		
		function cadastrar() {
			$this->set('botao', 'Cadastrar');
			$this->render('formulario');
			if (!empty($this->data)) {
				if ($this->Estado->save($this->data)) {
					$this->Session->setFlash('Estado cadastrado com sucesso');
					$this->redirect(array('controller'=>'estados', 'action'=>'index'));
				} else {
					$this->Session->setFlash('Erro ao cadastrar estado');
				}
			}
		}
		
		function editar($id) {
			$this->set('botao', 'Editar');
			$this->Estado->id = $id;
			if (empty($this->data)) {
				$this->data = $this->Estado->read();
				$this->render('formulario');
			} else {
				if ($this->Estado->save($this->data)) {
					$this->Session->setFlash('Estado atualizado com sucesso');
					$this->redirect(array('controller'=>'estados', 'action'=>'index'));
				} else {
					$this->Session->setFlash('Erro ao atualizar estado');
				}
			}
		}
		
		function excluir($id) {
			if ($this->Estado->delete($id)) {
				$this->Session->setFlash('Estado excluído com sucesso');
			} else {
				$this->Session->setFlash('Erro ao excluir estado');
			}
			$this->redirect(array('controller'=>'estados', 'action'=>'index'));
		}
		
	}

?>
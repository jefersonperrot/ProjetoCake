<?php

	class CidadesController extends AppController {

		var $helpers = array('Paginator');
		var $paginate = array(
        	'limit' => 25,
        	'order' => array(
        	    'Cidade.nome' => 'asc'
        	)
    	);
		
		function beforeFilter() {
			parent::beforeFilter();
			// $this->Auth->allow('listar_ajax');
			//$this->Auth->allow('teste_ajax');
	//		$this->Auth->allow('listar_comarcas_por_cidade');
			
		}
		
		function index() {
			$this->paginate['Cidade']['fields'] = array('id', 'nome', 'Estado.uf');
			$this->set('cidades', $this->paginate('Cidade'));
		}
		
		function cadastrar() {
			$this->set('botao', 'Cadastrar');
			$this->set('estados', $this->Cidade->Estado->find('list',array('order'=>'Estado.nome ASC')));
			$this->render('formulario');
			if (!empty($this->data)) {
				if ($this->Cidade->save($this->data)) {
					$this->Session->setFlash('Cidade cadastrada com sucesso');
					$this->redirect(array('controller'=>'cidades', 'action'=>'index'));
				} else {
					$this->Session->setFlash('Erro ao cadastrar cidade');
				}
			}
		}
		
		function listar_ajax() {
		//	die(pr($this->data));
			$estado_id = $this->data['estado_id'];
			$cidades = $this->Cidade->find('list', array('conditions'=>array('estado_id'=>$estado_id)));
			
			die(json_encode($cidades));
		}
		
		function teste_ajax()
		{
			$retorno = array();
			$this->loadModel('Cidade');
			$this->loadModel('ClienteLeilao');
			
			$estado_id = $this->data['estado_id'];
			$retorno['Cidades']  = $this->Cidade->find('list', array('conditions'=>array('estado_id'=>$estado_id)));
			
			$retorno["Comarcas"] = $this->ClienteLeilao->ClientesLeilaoPorEstado($estado_id);
	
					
			die(json_encode($retorno));
		}
		
		
		// BUSCA COMARCAS POR CIDADE
		function listar_comarcas_por_cidade()
		{
			$this->loadModel('ClienteLeilao');
			$cidade_id = $this->data['cidade_id'];
		
			if($cidade_id==0)		
			{
				$sql = "SELECT
						  clientes_leilao.id,clientes_leilao.nome
						FROM
						  clientes_leilao
						LEFT JOIN
						  cidades ON clientes_leilao.cidade_id = cidades.id
						LEFT JOIN
						  estados ON cidades.estado_id = estados.id
						WHERE
						  estados.id = 12 AND clientes_leilao.cliente_justica_id = 1";
				
				$dados = $this->ClienteLeilao->query($sql);

				die(json_encode($dados));
			}
			else
			{
				die(json_encode($this->ClienteLeilao->query("SELECT id,nome FROM clientes_leilao WHERE cidade_id = $cidade_id")));
			}
		}
		
		
		function editar($id) {
			$this->set('botao', 'Editar');
			$this->Cidade->id = $id;
			if (empty($this->data)) {
				$this->data = $this->Cidade->read();
				$this->set('estados', $this->Cidade->Estado->find('list', array('fields'=>array('Estado.id', 'Estado.nome'))));
				$this->render('formulario');
			} else {
				if ($this->Cidade->save($this->data)) {
					$this->Session->setFlash('Cidade atualizada com sucesso');
					$this->redirect(array('controller'=>'cidades', 'action'=>'index'));
				} else {
					$this->Session->setFlash('Erro ao atualizar cidade');
				}
			}
		}
		
		function excluir($id) {
			if ($this->Cidade->delete($id)) {
				$this->Session->setFlash('Cidade excluída com sucesso');
			} else {
				$this->Session->setFlash('Erro ao excluir cidade');
			}
			$this->redirect(array('controller'=>'cidades', 'action'=>'index'));
		}
		
	
		
		
		
	}
	
?>
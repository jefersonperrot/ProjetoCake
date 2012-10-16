<?php
App::uses('AppController', 'Controller');

class Inscricao extends AppModel {
	
	// public $useTable = 'inscricoes';
	
	public $order = array('nome' => 'ASC');
	public $displayField = 'nome';
	//public $cacheQueries	= false;
	
	public $validate = array(
		//Validação nome
		'nome' => array(
			'rule' => 'notEmpty',
			'message'	=> 'O nome deve ser preenchido'
		),
		//Validação email
		'email' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'E-mail deve ser preenchido'
			),
			array(
				'rule' => array('email', true),
				'message' => 'Informe um email válido'
			),
			array(
				'rule' => 'isUnique',
				'message' => 'O email informado já está sendo utilizado'
			)
		),
		'telefone' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'O campo deve ser preenchido'
			), array(
				'rule' => array('naturalNumber', true),
				'message' => 'Informe apenas numeros'
			)
		),
		'endereco' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'O campo deve ser preenchido'
			), array(
				'rule' => array('minLength', 10),
				'message' => 'O campo deve conter no mínimo 10 caracteres'
			)
		),
		'cidade_id' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'O campo deve ser preenchido'
			)
		)
	);
}

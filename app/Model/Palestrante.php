<?php

class Palestrante extends AppModel {
	
	public $hasMany = array('Palestra');
	public $useTable = 'palestrantes';
	public $displayField = 'nome';
	
	
	public $validate = array(
		//Vaidação do nome
		'nome' => array (
			'rule' => 'notEmpty',
			'message' => 'O campo deve ser preenchido'
		),
		//Vaidação da descrição
		'descricao' => array(
			'rule' => 'notEmpty',
			'message' => 'O campo deve ser preenchido'
		),
		//Vaidação da url do site
		'endereco_site' => array(
			'rule' => array('url', true),
			'message' => 'Digite uma url válida',
			'allowEmpty' => true
		)
	);
	
}

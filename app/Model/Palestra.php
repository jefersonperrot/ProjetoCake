<?php

class Palestra extends AppModel {
	
	public $belongsTo = array('Palestrante');
	public $useTable = 'palestras';
	
	public $validate = array(
		//Validação do nome
		'nome' => array(
			'rule' => 'notEmpty',
			'message' => 'O campo deve ser preenchido'
		),
		'inicio' => array(
			'rule'    => array('datetime', 'dmy'),
			'message' => 'Preencha com uma data válida'
		),
		'fim' => array(
			'rule'    => array('datetime', 'dmy'),
			'message' => 'Preencha com uma data válida'
		)		
	);
	
}

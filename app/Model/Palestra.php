<?php

class Palestra extends AppModel {
	
	public $belongsTo = array('Palestrante');
	public $useTable = 'palestras';
	
	public $validate = array(
		'nome' => array(
			'rule' => 'notEmpty',
			'message' => 'O campo deve ser preenchido'
		),
		'inicio' => array(
			'rule'    => array('time', 'hh:mm'),
			'message' => 'Preencha com uma data válida'
		),
		'fim' => array(
			'rule'    => array('time'),
			'message' => 'Preencha com uma data válida'
		)		
				
	);
	
}

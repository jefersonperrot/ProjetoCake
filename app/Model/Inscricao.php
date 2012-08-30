<?php

class Inscricao extends AppModel {
	
	public $useTable = 'inscricoes';
	
	public $order 					= array('nome' => 'ASC');
	public $displayField 		= 'nome';
	//public $cacheQueries	= false;
	
}

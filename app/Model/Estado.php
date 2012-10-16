<?php

	class Estado extends AppModel {
	
		public $displayField = 'nome';
		public $hasMany = 'Cidade';
	}

?>
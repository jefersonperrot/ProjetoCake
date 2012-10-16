<?php

	class Cidade extends AppModel {
	
		var $displayField = 'nome';
		var $belongsTo = 'Estado';
	}

?>
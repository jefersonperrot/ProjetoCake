<?php

	class Estado extends AppModel {
	
		var $displayField = 'nome';
		var $hasMany = 'Cidade';
	}

?>
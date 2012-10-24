<?php

	class Admin extends AppModel {
	
		// var $displayField = 'nome';
		var $hasMany = 'Palestra';
		var $useTable = 'usuarios';
	}

?>
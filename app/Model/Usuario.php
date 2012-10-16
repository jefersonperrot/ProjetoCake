<?php

App::uses('AuthComponent', 'Controller/Component');

class Usuario extends AppModel {
	public function beforeSave($options = array()) {
		if (isset($this->data['Usuario']['senha'])) {
			$password = $this->data['Usuario']['senha'];
			$password = AuthComponent::password($password);
			$this->data['Usuario']['senha'] = $password;
		}
		return parent::beforeSave($options);
	}
}
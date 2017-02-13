<?php
namespace NoFw\Traits;

trait NotNullValidator{


	public function notNull(){
		$notNull = [];
		foreach ($this->notNullFields as $field) {
			if(strlen($this->bodyParams[$field]) == 0){
				$notNull[$field] = 'has-error';
			}
		}
		return $notNull;
	}
}
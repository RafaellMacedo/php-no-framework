<?php
namespace NoFw\Traits;

use NoFw\Lib\Renderer\HTMLRenderer;

trait ReturnIndex{

	public function returnIndex($params){
		return new HTMLRenderer($this->layout, $this->view, $params);
	}
}
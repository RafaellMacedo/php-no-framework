<?php
namespace NoFw\Lib\Renderer;

use NoFw\Lib\Renderable;

class JSONRenderer implements Renderable{

	public function __construct($parameters){
		$this->parameters = $parameters;
	}

	public function render(){
		$json = json_encode( $this->parameters);
		print $json;
	}

}
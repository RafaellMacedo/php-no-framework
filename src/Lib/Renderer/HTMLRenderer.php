<?php
namespace NoFw\Lib\Renderer;

use NoFw\Lib\Renderable;

class HTMLRenderer implements Renderable{

	public $layout;
	public $view;
	public $parameters;
	public function __construct($layout, $view, $parameters){
		if(!file_exists($layout)){
			throw new \Exception("Layout not found");
		}

		if(!file_exists($view)){
			throw new \Exception("View not found");
		}

		$this->layout = $layout;
		$this->view = $view;
		$this->parameters = $parameters;
	}

	public function render(){
		extract($this->parameters);
		require $this->layout . '/head_layout.php';
		require $this->view;
		require $this->layout . '/foot_layout.php';

	}
}
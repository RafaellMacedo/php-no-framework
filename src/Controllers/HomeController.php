<?php
namespace NoFw\Controllers;

use NoFw\Lib\Controller;
use NoFw\Lib\Renderer\HTMLRenderer;

class HomeController extends Controller{

	public function index(){
		$layout = __DIR__ . '/../layouts/home_layout';
		$view = __DIR__ . '/../views/home/index.php';

		return new HTMLRenderer($layout, $view, ['title'=>'HOME', 'texto'=>123]);
	}
}
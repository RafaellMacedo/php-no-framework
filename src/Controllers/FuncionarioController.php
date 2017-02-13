<?php
namespace NoFw\Controllers;

use NoFw\Lib\Controller;
use NoFw\Lib\Renderer\JSONRenderer;
use NoFw\Lib\Renderer\HTMLRenderer;
use NoFw\Db\Models\Funcionario;


class FuncionarioController extends Controller{
	use \NoFw\Traits\NotNullValidator;
	use \NoFw\Traits\ReturnIndex;
	use \NoFw\Traits\DateFormats;
	use \NoFw\Traits\NumberFormat;

	public $layout;
	public $view;

	public function __construct(){
		$this->layout = __DIR__ . '/../layouts/home_layout';
		$this->view = __DIR__ . '/../views/funcionario/index.php';
	}
	public $notNullFields = [
		'nome',
		'setor',
		'cargo',
		'data_admissao',
		'salario_atual'
	];
	public function index(){
		$funcionario = new Funcionario($this->application->container->get('dbDriver'));
		$funcionariosList = $funcionario->findAll();
		return new HTMLRenderer($this->layout, $this->view, ['title'=>'HOME', 'funcionariosList'=> $funcionariosList]);
	}

	public function editar($data){

		$funcionario = new Funcionario($this->application->container->get('dbDriver'));
		$funcionarioRow = $funcionario->findById($data['id']);

		$funcionarioRow['data_admissao'] = $this->dateToClient($funcionarioRow['data_admissao']);
		return new HTMLRenderer($this->layout, $this->view, ['postData'=> $funcionarioRow]);
	}

	public function post(){
		$notNull = $this->notNull();

		if(count($notNull) > 0){
			return $this->returnIndex(['errorMsg'=>'Campos Obrigatórios', 'notNull' => $notNull, 'postData' => $this->bodyParams]);
		}
		$data = $this->bodyParams;

		$data['data_admissao'] = $this->dateToServer($this->bodyParams['data_admissao']);
		$data['salario_atual'] = $this->format($this->bodyParams['salario_atual']);

		$funcionario = new Funcionario($this->application->container->get('dbDriver'));
		$funcionario->save($data);

		return $this->returnIndex(['funcionariosList'=>$funcionario->findAll()]);
	}

	public function delete($data){
		$funcionario = new Funcionario($this->application->container->get('dbDriver'));
		if(!array_key_exists('id', $data) ){
			return $this->returnIndex(['errorMsg'=>'Selecione um Funcionário para Excluir']);
		}
		$funcionario->delete($data);
		header('Location: /funcionario');
	}
}
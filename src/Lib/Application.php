<?php
namespace NoFw\Lib;

use \ReflectionClass;

class Application{

	private $config;
	private $routes;
	private $requestedRoute;
	private $requestMethod;

	public function __construct($config){
		if(!is_array($config)){
			throw new \Exception('Config must be an array');
		}
		$this->config = $config;
		$this->setRoutes();
	}

	public function getConfig(){
		return $this->config;
	}
	public function setRoutes($config = []){
		if(empty($config)){
			$this->routes = $this->config['routes'];
			return $this;
		}

		$this->routes = $config['routes'];
		return $this;
	}

	public function run(){
		$this->requestedRoute = $_SERVER['REQUEST_URI'];
		$actions = $this->matchRoute();

		$this->runActionByMethod($actions);

	}

	public function matchRoute(){
		$matches = [];
		$regexResult = [];

		foreach ($this->routes as $pattern => $actions) {
			$match = preg_match($pattern, $this->requestedRoute, $regexResult);
			if(!$match){
				continue;
			}
			break;
		}
		$parameters = $this->getParametersMatchedFromRoute($regexResult);
		
		return ['actions' => $actions, 'parameters'=>$parameters];
	}

	public function getParametersMatchedFromRoute($routeRegexResult){
		$parameters = [];
		$parameterNamePattern = '#[aA-zZ]+#';
		foreach ($routeRegexResult as $paramName => $value) {
			$match = preg_match($parameterNamePattern, $paramName, $paramResult);
			if(!$match){
				continue;
			}
			$parameters[$paramName] = $value;
		}

		return $parameters;


	}

	public function runActionByMethod($actions){
		$parameters = $actions['parameters'];
		$actions = $actions['actions'];

		$this->requestMethod = $_SERVER['REQUEST_METHOD'];
		if(!array_key_exists($this->requestMethod, $actions)){
			throw new \Exception('Method not allowed');
		}

		$action = $actions[$this->requestMethod];
		$this->dispatch($action, $parameters);
	}

	public function dispatch($action, $parameters){
		list($controller, $method) = explode('@', $action);
		
		if(!$method){
			$controllerResponse = $this->callInvokable($controller, $parameters);
		}else{
			$controllerResponse = $this->callControllerAction($controller, $method, $parameters);
		}

		$this->render($controllerResponse);
	}

	public function callInvokable($controller, $parameters){
		throw new Exception("Not Implemented yet", 1);
		
	}

	public function callControllerAction($controller, $method, $parameters){
		$reflectionController = new ReflectionClass($controller);

		if(!$reflectionController->hasMethod($method)){
			throw new \Exception("Method '{$method}' Not implemented", 1);			
		}

		$controllerInstance = $reflectionController->newInstance();
		$this->setControllerProperties($controllerInstance);

		$reflectionMethod = $reflectionController->getMethod($method);

		return $reflectionMethod->invoke($controllerInstance, $parameters);
	}

	public function setControllerProperties($controllerInstance){
		$controllerInstance->bodyParams = $_POST;
		$controllerInstance->queryParams = $_GET;
		$controllerInstance->application = $this;
	}

	public function render($controllerResponse){
		$controllerResponse->render();
	}
}
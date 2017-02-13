<?php
namespace NoFw\Lib;

class Container {

	private $application;
	private $services;

	public function __construct($application){

		$this->application = $application;
		$this->services = $application->config['services'];
	}

	public function get($serviceName){
		
		$serviceObj = new $this->services[$serviceName];
		return $serviceObj($this->application->config);

	}
}
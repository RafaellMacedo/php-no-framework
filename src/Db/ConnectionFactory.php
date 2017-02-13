<?php
namespace NoFw\Db;

class ConnectionFactory{

	private $dbConfig;
	public function __invoke($config){
		$this->dbConfig = $config['db'];
		$dsn = $this->makeDSN();
		return new \PDO($dsn, $this->dbConfig['username'], $this->dbConfig['password']);

	}

	public function makeDSN(){
		return $this->dbConfig['driver'] . ':' 
			. 'host=' . $this->dbConfig['host'] .';'
			. 'dbname=' . $this->dbConfig['dbname'].';';
	}
}
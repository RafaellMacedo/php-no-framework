<?php

namespace NoFw\Db\Models;

class Funcionario{

	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function save($data){
		if(isset($data['id']) && strlen($data['id']) > 0){
			return $this->update($data);
		}else{
			return $this->insert($data);
		}

	}

	public function insert($data){
		try{
			$insert = 'INSERT INTO 
				funcionario (nome, setor, cargo, data_admissao, salario_atual)
				values (
				:nome,
				:setor,
				:cargo,
				:data_admissao,
				:salario_atual
			)';

			$stmt = $this->pdo->prepare($insert);

			$stmt->bindParam(':nome', $data['nome']);
			$stmt->bindParam(':setor', $data['setor']);
			$stmt->bindParam(':cargo', $data['cargo']);
			$stmt->bindParam(':data_admissao', $data['data_admissao']);
			$stmt->bindParam(':salario_atual', $data['salario_atual']);
			
			$stmt->execute();
		}catch(\PDOException $ex){
			echo $ex->getMessage();
		}
	}

	public function update($data){
		try{
			$insert = 'UPDATE funcionario SET
				nome = :nome,
				setor = :setor,
				cargo = :cargo, 
				data_admissao = :data_admissao, 
				salario_atual = :salario_atual
				WHERE id = :id';

			$stmt = $this->pdo->prepare($insert);

			$stmt->bindParam(':id', $data['id']);
			$stmt->bindParam(':nome', $data['nome']);
			$stmt->bindParam(':setor', $data['setor']);
			$stmt->bindParam(':cargo', $data['cargo']);
			$stmt->bindParam(':data_admissao', $data['data_admissao']);
			$stmt->bindParam(':salario_atual', $data['salario_atual']);
			
			$stmt->execute();
		}catch(\PDOException $ex){
			echo $ex->getMessage();
		}
	}

	public function delete($data){
		try{
			$delete = 'DELETE FROM funcionario WHERE id = :id';

			$stmt = $this->pdo->prepare($delete);

			$stmt->bindParam(':id', $data['id']);
			
			$stmt->execute();
		}catch(\PDOException $ex){
			echo $ex->getMessage();
		}
	}
	public function findAll(){
		$query = 'SELECT * FROM funcionario';
		$stmt = $this->pdo->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
		
	}

	public function findById($id){
		$query = 'SELECT * FROM funcionario where id = :id';
		$stmt = $this->pdo->prepare($query);
		$stmt->execute(['id'=>$id]);
		return $stmt->fetch();
		
	}
}
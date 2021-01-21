<?php 


	// classe criada por Leonado Junio Brumer Pellegrino
	
	// Boot SQL para facilitar o uso de querys com MySQL

	class Sql{

		const DNS = 'mysql:dbname=chat_avanco;host=localhost'; #alterar nome do banco e host conforme banco de dados
		const USER = 'leonardo'; #alterar usuario conforme banco de dados
		const PASSWORD = 'Avanco@123'; #alterar senha conforme banco de dados

		private $conn;

		public function __construct(){

			$this->conn = new PDO(SQL::DNS,SQL::USER,SQL::PASSWORD); #conectando banco de dados PDO pelo construtor

		}

		public function getConn(){

			return $this->conn; #retornando variavel private

		}

		public function query($conn,$query,$param = array()){ #função com maior liberdade na escolha da query

			$sql = $this->conn->prepare($query);
			$sql->execute($param);

			return $sql;

		}

		public function select($conn,$tabela,$dado = '*'){ #função select basica

			$sql = $this->conn->prepare("SELECT $dado FROM $tabela");
			$sql->execute();

			return $sql;

		}	

		public function delete($conn,$tabela,$where = ''){ #função delete basica ***** deleta toda a tabela se não parametrizada corretamente *****

			$sql = $this->conn->prepare("DELETE FROM $tabela $where"); # ***** atentar no parametro $where *****
			$sql->execute();

			return $sql;

		}

		public function retornaDados($resultado){ #função para retornar dados com fatchAll()

			return $resultado->fetchAll();

		}	
		

	}
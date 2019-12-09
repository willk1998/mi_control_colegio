<?php

//Api.php

class API
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=colegio", "root", "");
	}

	function fetch_all()
	{
		$query = "SELECT * FROM paralelo ORDER BY id_paralelo;";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["codigo"]))
		{
			$form_data = array(
				':codigo'		    =>	$_POST["codigo"],
				':id_gestion'		        =>	$_POST["id_gestion"],
				':id_curso'		=>	$_POST["id_curso"],
				
				
			

			);
			$query = "
			INSERT INTO paralelo
			(codigo,id_gestion,id_curso) VALUES 
			(:codigo,:id_gestion,:id_curso);
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($id)
	{
		$query = "SELECT * FROM paralelo where id_paralelo='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_paralelo'] = $row['id_paralelo'];
				$data['codigo'] = $row['codigo'];
				$data['id_gestion'] = $row['id_gestion'];
				$data['id_curso'] = $row['id_curso'];
			
			


			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["codigo"]))
		{
			$form_data = array(
				':codigo'		    =>	$_POST["codigo"],
				':id_gestion'		        =>	$_POST["id_gestion"],
				':id_curso'		=>	$_POST["id_curso"],
			
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE paralelo
			SET codigo = :codigo 
				, id_gestion = :id_gestion
				, id_curso = :id_curso 
			   
			WHERE id_paralelo = :id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete($id)
	{
		$query = "DELETE FROM paralelo WHERE id_paralelo = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>
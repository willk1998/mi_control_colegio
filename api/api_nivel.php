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
		$query = "SELECT * FROM nivel ORDER BY id_nivel;";
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
		if(isset($_POST["nombre"]))
		{
			$form_data = array(
				':nombre'		    =>	$_POST["nombre"]
				
				
			

			);
			$query = "
			INSERT INTO nivel
			(nombre) VALUES 
			(:nombre);
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
		$query = "SELECT * FROM nivel where id_nivel='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_nivel'] = $row['id_nivel'];
				$data['nombre'] = $row['nombre'];
			
			


			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["nombre"]))
		{
			$form_data = array(
				':nombre'		    =>	$_POST["nombre"],
			
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE nivel
			SET nombre = :nombre 
			  
			WHERE id_nivel = :id
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
		$query = "DELETE FROM nivel WHERE id_nivel = '".$id."'";
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
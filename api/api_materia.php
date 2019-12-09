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
		$query = "SELECT * FROM materia ORDER BY id_materia;";
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
				':nombre'		        =>	$_POST["nombre"],
				':id_curso'		=>	$_POST["id_curso"],
				
				
			

			);
			$query = "
			INSERT INTO materia
			(codigo,nombre,id_curso) VALUES 
			(:codigo,:nombre,:id_curso);
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
		$query = "SELECT * FROM materia where id_materia='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_materia'] = $row['id_materia'];
				$data['codigo'] = $row['codigo'];
				$data['nombre'] = $row['nombre'];
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
				':nombre'		        =>	$_POST["nombre"],
				':id_curso'		=>	$_POST["id_curso"],
			
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE materia
			SET codigo = :codigo 
				, nombre = :nombre
				, id_curso = :id_curso 
			   
			WHERE id_materia = :id
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
		$query = "DELETE FROM materia WHERE id_materia = '".$id."'";
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
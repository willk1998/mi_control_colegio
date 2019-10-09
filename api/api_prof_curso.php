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
		$query = "SELECT * FROM prof_curso ORDER BY id;";
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
		if(isset($_POST["id_curso"]))
		{
			$form_data = array(
				':id_curso'		    =>	$_POST["id_curso"],
				':id_materia'		        =>	$_POST["id_materia"],
				':id_profesor'		=>	$_POST["id_profesor"],
				':id_paralelo'		=>	$_POST["id_paralelo"],
				':id_estudiante'	=>	$_POST["id_estudiante"],
				
			

			);
			$query = "
			INSERT INTO prof_curso
			(id_curso,id_materia,id_profesor,id_paralelo,id_estudiante) VALUES 
			(:id_curso,:id_materia,:id_profesor,:id_paralelo,:id_estudiante);
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
		$query = "SELECT * FROM prof_curso where id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id'] = $row['id'];
				$data['id_curso'] = $row['id_curso'];
				$data['id_materia'] = $row['id_materia'];
				$data['id_profesor'] = $row['id_profesor'];
				$data['id_paralelo'] = $row['id_paralelo'];
				$data['id_estudiante'] = $row['id_estudiante'];
			


			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["id_curso"]))
		{
			$form_data = array(
				':id_curso'		    =>	$_POST["id_curso"],
				':id_materia'		        =>	$_POST["id_materia"],
				':id_profesor'		=>	$_POST["id_profesor"],
				':id_paralelo'		=>	$_POST["id_paralelo"],
				':id_estudiante'	=>	$_POST["id_estudiante"],
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE prof_curso
			SET id_curso = :id_curso 
				, id_materia = :id_materia
				, id_profesor = :id_profesor 
				, id_paralelo = :id_paralelo 
				, id_estudiante = :id_estudiante   
			WHERE id = :id
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
		$query = "DELETE FROM prof_curso WHERE id = '".$id."'";
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
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
		$query = "SELECT * FROM asistencia ORDER BY id_asistencia;";
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
		if(isset($_POST["estado"]))
		{
			$form_data = array(
				':estado'		    =>	$_POST["estado"],
				':fecha'		        =>	$_POST["fecha"],
				':id_estudiante'		=>	$_POST["id_estudiante"],
				':id_curso'		=>	$_POST["id_curso"],
				':id_paralelo'		=>	$_POST["id_paralelo"],
				':id_materia'	=>	$_POST["id_materia"],
				
                ':id_profesor'	=>	$_POST["id_profesor"]
				
			

			);
			$query = "
			INSERT INTO asistencia
			(estado,fecha,id_estudiante,id_curso,id_paralelo,id_materia,id_profesor) VALUES 
			(:estado,:fecha,:id_estudiante,:id_curso,:id_paralelo,:id_materia,:id_profesor);
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
		$query = "SELECT * FROM asistencia where id_asistencia='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_asistencia'] = $row['id_asistencia'];
				$data['estado'] = $row['estado'];
				$data['fecha'] = $row['fecha'];
				$data['id_estudiante'] = $row['id_estudiante'];
				$data['id_curso'] = $row['id_curso'];
				$data['id_paralelo'] = $row['id_paralelo'];
				$data['id_materia'] = $row['id_materia'];
				
                $data['id_profesor'] = $row['id_profesor'];
			


			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["estado"]))
		{
			$form_data = array(
				':estado'		    =>	$_POST["estado"],
				':fecha'		        =>	$_POST["fecha"],
				':id_estudiante'		=>	$_POST["id_estudiante"],
				':id_curso'		=>	$_POST["id_curso"],
				':id_paralelo'		=>	$_POST["id_paralelo"],
				':id_materia'	=>	$_POST["id_materia"],
				
                ':id_profesor'	=>	$_POST["id_profesor"],
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE asistencia
			SET estado = :estado 
				, fecha = :fecha
				, id_estudiante = :id_estudiante 
				, id_curso = :id_curso 
				, id_paralelo = :id_paralelo 
				, id_materia = :id_materia
				
                , id_profesor = :id_profesor    
			WHERE id_asistencia = :id
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
		$query = "DELETE FROM asistencia WHERE id_asistencia = '".$id."'";
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
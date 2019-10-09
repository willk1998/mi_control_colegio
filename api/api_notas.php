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
		$query = "SELECT * FROM notas ORDER BY id_nota;";
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
		if(isset($_POST["nota"]))
		{
			$form_data = array(
				':nota'		    =>	$_POST["nota"],
				':id_bimestre'		        =>	$_POST["id_bimestre"],
				':id_materia'		=>	$_POST["id_materia"],
				':id_curso'		=>	$_POST["id_curso"],
				':id_paralelo'		=>	$_POST["id_paralelo"],
				':id_estudiante'	=>	$_POST["id_estudiante"],
				
                ':id_profesor'	=>	$_POST["id_profesor"]
				
			

			);
			$query = "
			INSERT INTO notas
			(nota,id_bimestre,id_materia,id_curso,id_paralelo,id_estudiante,id_profesor) VALUES 
			(:nota,:id_bimestre,:id_materia,:id_curso,:id_paralelo,:id_estudiante,:id_profesor);
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
		$query = "SELECT * FROM notas where id_nota='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_nota'] = $row['id_nota'];
				$data['nota'] = $row['nota'];
				$data['id_bimestre'] = $row['id_bimestre'];
				$data['id_materia'] = $row['id_materia'];
				$data['id_curso'] = $row['id_curso'];
				$data['id_paralelo'] = $row['id_paralelo'];
				$data['id_estudiante'] = $row['id_estudiante'];
				
                $data['id_profesor'] = $row['id_profesor'];
			


			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["nota"]))
		{
			$form_data = array(
				':nota'		    =>	$_POST["nota"],
				':id_bimestre'		        =>	$_POST["id_bimestre"],
				':id_materia'		=>	$_POST["id_materia"],
				':id_curso'		=>	$_POST["id_curso"],
				':id_paralelo'		=>	$_POST["id_paralelo"],
				':id_estudiante'	=>	$_POST["id_estudiante"],
				
                ':id_profesor'	=>	$_POST["id_profesor"],
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE notas
			SET nota = :nota 
				, id_bimestre = :id_bimestre
				, id_materia = :id_materia 
				, id_curso = :id_curso 
				, id_paralelo = :id_paralelo 
				, id_estudiante = :id_estudiante
				
                , id_profesor = :id_profesor    
			WHERE id_nota = :id
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
		$query = "DELETE FROM notas WHERE id_nota = '".$id."'";
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
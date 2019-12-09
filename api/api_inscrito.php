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
		$query = "SELECT * FROM inscrito ORDER BY id_persona;";
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
		if(isset($_POST["id_persona"]))
		{
			$form_data = array(
				':id_persona'		    =>	$_POST["id_persona"],
				':id_curso'		        =>	$_POST["id_curso"],
				':id_gestion'		=>	$_POST["id_gestion"],
				':fecha'		=>	$_POST["fecha"]
				
			

			);
			$query = "
			INSERT INTO inscrito
			(id_persona,id_curso,id_gestion,fecha) VALUES 
			(:id_persona,:id_curso,:id_gestion,:fecha);
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
		$query = "SELECT * FROM inscrito where id_persona='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_persona'] = $row['id_persona'];
				$data['id_curso'] = $row['id_curso'];
				$data['id_gestion'] = $row['id_gestion'];
                $data['fecha'] = $row['fecha'];
			


			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["id_persona"]))
		{
			$form_data = array(
				':id_persona'		    =>	$_POST["id_persona"],
				':id_curso'		        =>	$_POST["id_curso"],
				':id_gestion'		=>	$_POST["id_gestion"],
                ':fecha'		=>	$_POST["fecha"],
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE inscrito
			SET id_persona = :id_persona 
				, id_curso = :id_curso
				, id_gestion = :id_gestion 
                , fecha = :fecha 
			WHERE id_persona = :id
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
		$query = "DELETE FROM inscrito WHERE id_persona = '".$id."'";
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
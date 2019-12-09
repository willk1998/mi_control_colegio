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
		$query = "SELECT * FROM curso ORDER BY id_curso;";
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
		if(isset($_POST["id_nivel"]))
		{
			$form_data = array(
				':id_nivel'		    =>	$_POST["id_nivel"],
				':id_colegio'		    =>	$_POST["id_colegio"]
				
			

			);
			$query = "
			INSERT INTO curso
			(id_nivel,id_colegio) VALUES 
			(:id_nivel,:id_colegio);
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
		$query = "SELECT * FROM curso where id_curso='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_curso'] = $row['id_curso'];
				$data['id_nivel'] = $row['id_nivel'];
				$data['id_colegio'] = $row['id_colegio'];
			
			


			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["id_nivel"]))
		{
			$form_data = array(
				':id_nivel'		    =>	$_POST["id_nivel"],
				':id_colegio'		    =>	$_POST["id_colegio"],
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE curso
			SET id_nivel = :id_nivel 
				id_colegio = :id_colegio
			WHERE id_curso = :id
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
		$query = "DELETE FROM curso WHERE id_curso = '".$id."'";
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
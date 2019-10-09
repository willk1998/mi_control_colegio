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
		if(isset($_POST["paralelo"]))
		{
			$form_data = array(
				':paralelo'		    =>	$_POST["paralelo"]
				
				
			

			);
			$query = "
			INSERT INTO paralelo
			(paralelo) VALUES 
			(:paralelo);
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
				$data['paralelo'] = $row['paralelo'];
			
			


			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["paralelo"]))
		{
			$form_data = array(
				':paralelo'		    =>	$_POST["paralelo"],
			
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE paralelo
			SET paralelo = :paralelo 
			  
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
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
		$query = "SELECT * FROM cuenta ORDER BY id_persona;";
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
				':id_rol'		        =>	$_POST["id_rol"]
				
				
			

			);
			$query = "
			INSERT INTO cuenta
			(id_persona,id_rol) VALUES 
			(:id_persona,:id_rol);
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
		$query = "SELECT * FROM cuenta where id_persona='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_persona'] = $row['id_persona'];
				$data['id_rol'] = $row['id_rol'];
			
			


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
				':id_rol'		        =>	$_POST["id_rol"],
			
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE cuenta
			SET id_persona = :id_persona 
				,id_rol = :id_rol   
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
		$query = "DELETE FROM cuenta WHERE id_persona = '".$id."'";
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
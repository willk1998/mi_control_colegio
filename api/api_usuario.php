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
		$query = "SELECT * FROM usuario ORDER BY id_persona;";
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
				':usuario'		        =>	$_POST["usuario"],
				':password'		=>	$_POST["password"]
			
				
			

			);
			$query = "
			INSERT INTO usuario
			(id_persona,usuario,password) VALUES 
			(:id_persona,:usuario,:password);
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
		$query = "SELECT * FROM usuario where id_persona='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_persona'] = $row['id_persona'];
				$data['usuario'] = $row['usuario'];
				$data['password'] = $row['password'];
                
			


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
				':usuario'		        =>	$_POST["usuario"],
				':password'		=>	$_POST["password"],
               
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE usuario
			SET id_persona = :id_persona 
				, usuario = :usuario
				, password = :password 
              
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
		$query = "DELETE FROM usuario WHERE id_persona = '".$id."'";
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
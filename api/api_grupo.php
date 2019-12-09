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
		$query = "SELECT * FROM grupo ORDER BY id_grupo;";
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
				':id_paralelo'		        =>	$_POST["id_paralelo"],
				':id_materia'		=>	$_POST["id_materia"],
				
				
			

			);
			$query = "
			INSERT INTO grupo
			(codigo,id_paralelo,id_materia) VALUES 
			(:codigo,:id_paralelo,:id_materia);
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
		$query = "SELECT * FROM grupo where id_grupo='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_grupo'] = $row['id_grupo'];
				$data['codigo'] = $row['codigo'];
				$data['id_paralelo'] = $row['id_paralelo'];
				$data['id_materia'] = $row['id_materia'];
			
			


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
				':id_paralelo'		        =>	$_POST["id_paralelo"],
				':id_materia'		=>	$_POST["id_materia"],
			
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE grupo
			SET codigo = :codigo 
				, id_paralelo = :id_paralelo
				, id_materia = :id_materia 
			   
			WHERE id_grupo = :id
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
		$query = "DELETE FROM grupo WHERE id_grupo = '".$id."'";
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
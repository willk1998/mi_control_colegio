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
		$query = "SELECT * FROM nota ORDER BY id_persona;";
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
				':id_grupo'		=>	$_POST["id_grupo"],
				':nota_b1'		=>	$_POST["nota_b1"],
				':nota_b2'	=>	$_POST["nota_b2"],
				
                ':nota_b3'	=>	$_POST["nota_b3"]
				':nota_b4'	=>	$_POST["nota_b4"]
				':nota_final'	=>	$_POST["nota_final"]
			

			);
			$query = "
			INSERT INTO nota
			(id_persona,id_curso,id_gestion,id_grupo,nota_b1,nota_b2,nota_b3,nota_b4,nota_final) VALUES 
			(:id_persona,:id_curso,:id_gestion,:id_grupo,:nota_b1,:nota_b2,:nota_b3,:nota_b4,:nota_final);
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
		$query = "SELECT * FROM nota where id_persona='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_persona'] = $row['id_persona'];
				$data['id_persona'] = $row['id_persona'];
				$data['id_curso'] = $row['id_curso'];
				$data['id_gestion'] = $row['id_gestion'];
				$data['id_grupo'] = $row['id_grupo'];
				$data['nota_b1'] = $row['nota_b1'];
				$data['nota_b2'] = $row['nota_b2'];
				
                $data['nota_b3'] = $row['nota_b3'];
				$data['nota_b4'] = $row['nota_b4'];
				$data['nota_final'] = $row['nota_final'];


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
				':id_grupo'		=>	$_POST["id_grupo"],
				':nota_b1'		=>	$_POST["nota_b1"],
				':nota_b2'	=>	$_POST["nota_b2"],
				
				':nota_b3'	=>	$_POST["nota_b3"],
				':nota_b4'	=>	$_POST["nota_b4"],
				':nota_final'	=>	$_POST["nota_final"],
				':id'	            =>	$_POST["hidden_id"]
				
			);
			$query = "
			UPDATE nota
			SET id_persona = :id_persona 
				, id_curso = :id_curso
				, id_gestion = :id_gestion 
				, id_grupo = :id_grupo 
				, nota_b1 = :nota_b1 
				, nota_b2 = :nota_b2
				
				, nota_b3 = :nota_b3   
				, nota_b4 = :nota_b4 
				, nota_final = :nota_final  
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
		$query = "DELETE FROM nota WHERE id_persona = '".$id."'";
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
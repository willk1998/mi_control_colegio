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
		$query = "SELECT * FROM persona ORDER BY id_persona;";
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
		if(isset($_POST["nombre"]))
		{
			$form_data = array(
				':nombre'		    =>	$_POST["nombre"],
				':papellido'		        =>	$_POST["papellido"],
				':sapellido'		=>	$_POST["sapellido"],
				':direccion'		=>	$_POST["direccion"],
				':telefono'  => $_POST["telefono"],
				':celular'  => $_POST["celular"],
				':dni'  => $_POST["dni"],	
				':email'  => $_POST["email"]
				

			);
			$query = "
			INSERT INTO persona
			(nombre,papellido,sapellido,direccion,telefono,celular,dni,email) VALUES 
			(:nombre,:papellido,:sapellido,:direccion,:telefono,:celular,:dni,:email);
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
		$query = "SELECT * FROM persona where id_persona='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_persona'] = $row['id_persona'];
				$data['nombre'] = $row['nombre'];
				$data['papellido'] = $row['papellido'];
				$data['sapellido'] = $row['sapellido'];
				$data['direccion'] = $row['direccion'];
				$data['telefono'] = $row['telefono'];
				$data['celular'] = $row['celular'];
				$data['dni'] = $row['dni'];
				$data['email'] = $row['email'];
				

			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["nombre"]))
		{
			$form_data = array(
				':nombre'		    =>	$_POST["nombre"],
				':papellido'		        =>	$_POST["papellido"],
				':sapellido'		=>	$_POST["sapellido"],
				':direccion'		=>	$_POST["direccion"],
				':telefono'	=>	$_POST["telefono"],
				':celular'	=>	$_POST["celular"],
				':dni'	=>	$_POST["dni"],
				':email'	=>	$_POST["email"],
				':id'	            =>	$_POST["hidden_id"]
			);
			$query = "
			UPDATE persona 
			SET nombre = :nombre 
				, papellido = :papellido
				, sapellido = :sapellido 
				, direccion = :direccion 
				, telefono = :telefono
				, celular = :celular
				, dni = :dni
				, email = :email
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
		$query = "DELETE FROM persona WHERE id_persona = '".$id."'";
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
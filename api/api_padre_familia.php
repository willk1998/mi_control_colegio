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
		$query = "SELECT * FROM padre_familia ORDER BY id_padre;";
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
				':ap_pt'		        =>	$_POST["ap_pt"],
				':ap_mt'		=>	$_POST["ap_mt"],
				':cargo'		=>	$_POST["cargo"],
				':ci'	=>	$_POST["ci"],
				':password'  => $_POST["password"],
				':direccion'  => $_POST["direccion"],
				':celular'  => $_POST["celular"],
				':fecha'  => $_POST["fecha"],	
				':foto'  => $_POST["foto"]
				

			);
			$query = "
			INSERT INTO padre_familia
			(nombre,ap_pt,ap_mt,cargo,ci,password,direccion,celular,fecha,foto) VALUES 
			(:nombre,:ap_pt,:ap_mt,:cargo,:ci,:password,:direccion,:celular,:fecha,:foto);
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
		$query = "SELECT * FROM padre_familia where id_padre='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_padre'] = $row['id_padre'];
				$data['nombre'] = $row['nombre'];
				$data['ap_pt'] = $row['ap_pt'];
				$data['ap_mt'] = $row['ap_mt'];
				$data['cargo'] = $row['cargo'];
				$data['ci'] = $row['ci'];
				$data['password'] = $row['password'];
				$data['direccion'] = $row['direccion'];
				$data['celular'] = $row['celular'];
				$data['fecha'] = $row['fecha'];
				$data['foto'] = $row['foto'];
				

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
				':ap_pt'		        =>	$_POST["ap_pt"],
				':ap_mt'		=>	$_POST["ap_mt"],
				':cargo'		=>	$_POST["cargo"],
				':ci'	=>	$_POST["ci"],
				':password'	=>	$_POST["password"],
				':direccion'	=>	$_POST["direccion"],
				':celular'	=>	$_POST["celular"],
				':fecha'	=>	$_POST["fecha"],
				':foto'	=>	$_POST["foto"],
				':id'	            =>	$_POST["hidden_id"]
			);
			$query = "
			UPDATE padre_familia 
			SET nombre = :nombre 
				, ap_pt = :ap_pt
				, ap_mt = :ap_mt 
				, cargo = :cargo 
				, ci = :ci   
				, password = :password
				, direccion = :direccion
				, celular = :celular
				, fecha = :fecha
				, foto = :foto
			WHERE id_padre = :id
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
		$query = "DELETE FROM padre_familia WHERE id_padre = '".$id."'";
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
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
		$query = "SELECT * FROM estudiante ORDER BY id_estudiante;";
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
				
				':direccion'  => $_POST["direccion"],
                ':celular'  => $_POST["celular"],
                ':id_padre'  => $_POST["id_padre"],
                ':id_profesor'  => $_POST["id_profesor"],
				':fecha'  => $_POST["fecha"],	
				':foto'  => $_POST["foto"]
				

			);
			$query = "
			INSERT INTO estudiante
			(nombre,ap_pt,ap_mt,cargo,ci,direccion,celular,id_padre,id_profesor,fecha,foto) VALUES 
			(:nombre,:ap_pt,:ap_mt,:cargo,:ci,:direccion,:celular,:id_padre,:id_profesor,:fecha,:foto);
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
		$query = "SELECT * FROM estudiante where id_estudiante='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['id_estudiante'] = $row['id_estudiante'];
				$data['nombre'] = $row['nombre'];
				$data['ap_pt'] = $row['ap_pt'];
				$data['ap_mt'] = $row['ap_mt'];
				$data['cargo'] = $row['cargo'];
				$data['ci'] = $row['ci'];
				
				$data['direccion'] = $row['direccion'];
                $data['celular'] = $row['celular'];
                $data['id_padre'] = $row['id_padre'];
                $data['id_profesor'] = $row['id_profesor'];
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
				
				':direccion'	=>	$_POST["direccion"],
                ':celular'	=>	$_POST["celular"],
                ':id_padre'	=>	$_POST["id_padre"],
                ':id_profesor'	=>	$_POST["id_profesor"],
				':fecha'	=>	$_POST["fecha"],
				':foto'	=>	$_POST["foto"],
				':id'	            =>	$_POST["hidden_id"]
			);
			$query = "
			UPDATE estudiante 
			SET nombre = :nombre 
				, ap_pt = :ap_pt
				, ap_mt = :ap_mt 
				, cargo = :cargo 
				, ci = :ci   
				
				, direccion = :direccion
                , celular = :celular
                , id_padre = :id_padre
                , id_profesor = :id_profesor
				, fecha = :fecha
				, foto = :foto
			WHERE id_estudiante = :id
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
		$query = "DELETE FROM estudiante WHERE id_estudiante = '".$id."'";
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
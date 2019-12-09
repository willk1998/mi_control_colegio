<?php

//action.php

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		echo "insert"; 
		$form_data = array(
			'nombre'		    =>	$_POST['nombre'],
			'papellido'				=>	$_POST['papellido'],
			'sapellido'			=>	$_POST['sapellido'],
			'direccion'			=>	$_POST['direccion'],
            'telefono'	=>	$_POST['telefono'],
            'celular'	=>	$_POST['celular'],
            'dni'	=>	$_POST['dni'],
			'email'	=>	$_POST['email']
			
		);
		$api_url = "http://localhost/mi_control_colegio/api/test_api_estudiante.php?action=insert";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}

	if($_POST["action"] == 'fetch_single')
	{
		$id = $_POST["id"];
		$api_url = "http://localhost/mi_control_colegio/api/test_api_estudiante.php?action=fetch_single&id=".$id."";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
	if($_POST["action"] == 'update')
	{
		$form_data = array(
			'nombre'		=>	$_POST['nombre'],
			'papellido'				=>	$_POST['papellido'],
			'sapellido'			=>	$_POST['sapellido'],
			'direccion'			=>	$_POST['direccion'],
            'telefono'	=>	$_POST['telefono'],
            'celular'	=>	$_POST['celular'],
            'dni'	=>	$_POST['dni'],
			'email'	=>	$_POST['email'],
			'hidden_id'				=>	$_POST['hidden_id']
		);
		$api_url = "http://localhost/mi_control_colegio/api/test_api_estudiante.php?action=update";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'update';
			}
			else
			{
				echo 'error';
			}
		}
	}
	if($_POST["action"] == 'delete')
	{
		$id = $_POST['id'];
		$api_url = "http://localhost/mi_control_colegio/api/test_api_estudiante.php?action=delete&id=".$id.""; //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
}


?>
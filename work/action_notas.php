<?php

//action.php

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		echo "insert"; 
		$form_data = array(
			'nota'		    =>	$_POST['nota'],
			'id_bimestre'				=>	$_POST['id_bimestre'],
			'id_materia'			=>	$_POST['id_materia'],
            'id_curso'			=>	$_POST['id_curso'],
			'id_paralelo'			=>	$_POST['id_paralelo'],
			'id_estudiante'			=>	$_POST['id_estudiante'],
			'id_profesor'	=>	$_POST['id_profesor']
			
			
		);
		$api_url = "http://localhost/grupo2/api/test_api_notas.php?action=insert";  //change this url as per your folder path for api folder
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
		$api_url = "http://localhost/grupo2/api/test_api_notas.php?action=fetch_single&id=".$id."";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
	if($_POST["action"] == 'update')
	{
		$form_data = array(
			'nota'		    =>	$_POST['nota'],
			'id_bimestre'				=>	$_POST['id_bimestre'],
			'id_materia'			=>	$_POST['id_materia'],
            'id_curso'			=>	$_POST['id_curso'],
			'id_paralelo'			=>	$_POST['id_paralelo'],
			'id_estudiante'			=>	$_POST['id_estudiante'],
			'id_profesor'	=>	$_POST['id_profesor']
			'hidden_id'				=>	$_POST['hidden_id']
		);
		$api_url = "http://localhost/grupo2/api/test_api_notas.php?action=update";  //change this url as per your folder path for api folder
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
		$api_url = "http://localhost/grupo2/api/test_api_notas.php?action=delete&id=".$id.""; //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
}


?>
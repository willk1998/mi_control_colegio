<?php
require_once 'config.php';
$db = new Cl_DBclass();





if( isset( $_POST['password'] ) && !empty($_POST['password'])){
	$password = $_POST['password'] ;
	$usuario = $_POST['usuario'];
	
	if( !empty( $usuario) && !empty($password) ){
		$query = " SELECT count(usuario) cnt FROM users where password = '$password' and usuario = '$usuario' ";
		$result = mysqli_query($db->con, $query);
		$data = mysqli_fetch_assoc($result);
		if($data['cnt'] == 1){
			echo 'true';
		}else{
			echo 'false';
		}
	}else{
		echo 'false';
	}
	exit;
}


if( isset( $_POST['usuario'] ) && !empty($_POST['usuario'])){
	$usuario = $_POST['usuario'];
	$query = " SELECT count(usuario) cnt FROM users where usuario = '$usuario' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] > 0){
		echo 'false';
	}else{
		echo 'true';
	}
	exit;
}

if( isset( $_GET['usuario'] ) && !empty($_GET['usuario'])){
	$usuario = $_GET['usuario'];
	$query = " SELECT count(usuario) cnt FROM users where usuario = '$usuario' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] == 1){
		echo 'true';
	}else{
		echo 'false';
	}
	exit;
}
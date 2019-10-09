<?php
    session_start();
    if(isset($_SESSION['login_id'])){
        header('Location: /mi_control_colegio');
    }

    require 'api/config.php';
    if(!empty($_POST['ci']&&$_POST['password'])){

        $records = $conn->prepare("SELECT id_padre, ci, password  FROM padre_familia WHERE ci=:ci and password =:password" );
        $records->bindParam(':ci', $_POST['ci']);
        $records->execute();
        $results= $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){
            $_SESSION['login_id'] = $results['id_padre'];
            header('Location: mi_control_colegio/home.php');
        }
        else{
            $message = 'Datos incorrectos';
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
	<title>LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
</head>
<body class="cover" style="background-image: url(./assets/img/loginFont2.jpg);">
	<form id="form1" name="form1" action="index.php" method="post" autocomplete="off" class="full-box logInForm">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserEmail">CI</label>
		  <input class="form-control" id="ci" name="ci" type="text">
		  <p class="help-block">Escribe tú CI</p>
		</div>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserPass">Contraseña</label>
		  <input class="form-control" id="password" name="password" type="password">
		  <p class="help-block">Escribe tú contraseña</p>
		</div>
		<div class="form-group text-center">
			<input type="submit" name="guardar" id="guardar" value="Iniciar sesión" class="btn btn-raised btn-danger">
		</div>
	</form>
	
	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>

<?php


  require 'api/config.php';

  

	
    $records = $conn->prepare('SELECT COUNT(*) total FROM padre_familia	;');
    $records->execute();
	$total = $records->fetchColumn();
	

	$sql = $conn->prepare('SELECT COUNT(*) FROM estudiante	;');
    $sql->execute();
	$nombre = $sql->fetchColumn();

	$sql = $conn->prepare('SELECT COUNT(*) FROM profesor	;');
    $sql->execute();
	$nombrep = $sql->fetchColumn();

?>







<?php 
ob_start();
session_start();
require_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<link href="css/iconic-font.css" rel="stylesheet">
	<link href="fonta/css/all.css" rel="stylesheet">
<script src="fonta/js/all.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				S.A.P <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="assets/img/avatar.jpg" alt="UserIcon">
					<figcaption class="text-center text-titles">
						<?php if($_SESSION['logged_in']) { ?>
							<?php echo $_SESSION['usuario']; ?>
							<?php } ?>
						</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
						<li>
							<a href="account.php"><i class="zmdi zmdi-settings"></i></a>
						</li>
							<li class="divider"></li>
						<li>
							<a href="logout.php"><i class="zmdi zmdi-power"></i></a> 
						</li>	
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu ">
			<li>
					<a href="home.php">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-2x"></i> Inicio
					</a>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu ">
						<i class="zmdi zmdi-case zmdi-hc-2x"></i> Administracion <i class="zmdi zmdi-caret-down pull-right zmdi-hc-2x "></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="work/index_colegio.php"><i class="zmdi zmdi-timer zmdi-hc-2x"></i> Colegio</a>
						</li>
						<li>
							<a href="work/index_cuenta.php"><i class="zmdi zmdi-book zmdi-hc-2x"></i> Cuenta</a>
						</li>
						<li>
							<a href="work/index_curso.php"><i class="zmdi zmdi-graduation-cap zmdi-hc-2x"></i> Curso</a>
						</li>
						<li>
							<a href="work/index_notas.php"><i class="zmdi zmdi-label zmdi-hc-2x"></i> Notas</a>
						</li>
						<li>
							<a href="work/index_materia.php"><i class="zmdi zmdi-folder-outline  zmdi-hc-2x"></i> Materia</a>
						</li>
						<li>
							<a href="work/index_paralelo.php"><i class="zmdi zmdi-slideshare zmdi-hc-2x"></i> Paralelo</a>
						</li>
						<li>
							<a href="work/index_gestion.php"><i class="zmdi zmdi-slideshare zmdi-hc-2x"></i> Gestion</a>
						</li>
						<li>
							<a href="work/index_nivel.php"><i class="zmdi zmdi-slideshare zmdi-hc-2x"></i> Nivel</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-2x"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right zmdi-hc-2x "></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="work/index_profesor.php"><i class="zmdi zmdi-account zmdi-hc-2x"></i> Profesores</a>
						</li>
						<li>
							<a href="work/index_padre_familia.php"><i class="zmdi zmdi-male-alt zmdi-hc-2x"></i> Padre de Familia</a>
						</li>
						<li>
							<a href="work/index_estudiante.php"><i class="zmdi zmdi-face zmdi-hc-2x"></i> Estudiantes</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-card zmdi-hc-2x"></i> Registros <i class="zmdi zmdi-caret-down pull-right zmdi-hc-2x "></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="work/index_persona"><i class="zmdi zmdi-money-box zmdi-hc-2x"></i> Personas</a>
						</li>
						<li>
							<a href="work/index_grupo.php"><i class="zmdi zmdi-calendar-check zmdi-hc-2x"></i> Designacion de cursos</a>
						</li>
						<li>
							<a href="work/index_inscrito.php"><i class="zmdi zmdi-calendar-check zmdi-hc-2x"></i> inscritos</a>
						</li>
						<li>
							<a href="work/index_rol.php"><i class="zmdi zmdi-calendar-check zmdi-hc-2x"></i> Roles</a>
						</li>
						<li>
							<a href="work/index_usuario.php"><i class="zmdi zmdi-calendar-check zmdi-hc-2x"></i> Usuarios Cuenta</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-shield-security zmdi-hc-2x"></i> Informacion de Colegio <i class="zmdi zmdi-caret-down pull-right zmdi-hc-2x "></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="work/index_informacion_colegio.php"><i class="zmdi zmdi-balance zmdi-hc-2x"></i> Datos de Colegio</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<li>
					<a href="#!" class="btn-Notifications-area">
						<i class="zmdi zmdi-notifications-none"></i>
						<span class="badge">7</span>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles">U.E SAN ANTONIO DE PADUA<small>Informacion</small></h1>
			</div>
			
		</div>
		<div class="full-box text-center" style="padding: 30px 10px;">
		<a href="work/index_profesor.php">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Profesores
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-male-alt"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?php echo $nombrep?></p>
					<small>Registros</small>
				</div>
			</article></a>
			<a href="work/index_estudiante.php">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Estudiantes
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-face"></i>
				</div>
				<div class="full-box tile-number text-titles">

					<p class="full-box"><?php echo $nombre?></p>
					<small>Registros</small>
				</div>
			</article></a>
			<a href="work/index_padre_familia.php">
			<article class="full-box tile">
			
			
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Padres de Familia
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-male-female"></i>
				</div>
				<div class="full-box tile-number text-titles">
				
			
					<p class="full-box"><?php echo $total ?></p>
					
					<small>Registros</small>
					
				</div>
			</article></a>
		</div>
		</div>
		<div class="full-box text-center" style="padding: 30px 10px;">
		<a href="">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Notas
				</div>
				<div class="full-box tile-icon text-center">
				<i class="zmdi zmdi-file"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"></p>
					<small>Registros</small>
				</div>
			</article></a>
			<a href="">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Listas
				</div>
				<div class="full-box tile-icon text-center">
				<i class="zmdi zmdi-folder"></i>
				</div>
				<div class="full-box tile-number text-titles">

					<p class="full-box"></p>
					<small>Registros</small>
				</div>
			</article></a>
			<a href="">
			<article class="full-box tile">
			
			
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Asistencias
				</div>
				<div class="full-box tile-icon text-center">
				<i class="zmdi zmdi-border-color"></i>
				</div>
				<div class="full-box tile-number text-titles">
				
			
					<p class="full-box"></p>
					
					<small>Registros</small>
					
				</div>
			</article></a>
		</div>
	</section>

		
	</section>

	<!-- Notifications area -->
	<section class="full-box Notifications-area">
		<div class="full-box Notifications-bg btn-Notifications-area"></div>
		<div class="full-box Notifications-body">
			<div class="Notifications-body-title text-titles text-center">
				Notifications <i class="zmdi zmdi-close btn-Notifications-area"></i>
			</div>
			<div class="list-group">
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-triangle"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">17m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-octagon"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">15m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
				<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-help"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">10m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
				</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-info"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">8m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
			  	</div>
			</div>

		</div>
	</section>

	<!-- Dialog help -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Dialog-Help">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Help</h4>
			    </div>
			    <div class="modal-body">
			        <p>
			        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt beatae esse velit ipsa sunt incidunt aut voluptas, nihil reiciendis maiores eaque hic vitae saepe voluptatibus. Ratione veritatis a unde autem!
			        </p>
			    </div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
		      	</div>
		    </div>
	  	</div>
	</div>
	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>
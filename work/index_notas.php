<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/main.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
					<img src="../assets/img/avatar.jpg" alt="UserIcon">
					<figcaption class="text-center text-titles">Nombre de Usuario</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="#!">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
					<li>
						<a href="#!" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
			<li>
					<a href="../home.php">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Inicio
					</a>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administracion <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../work/index_colegio.php"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Colegio</a>
						</li>
						<li>
							<a href="../work/index_cuenta.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Cuenta</a>
						</li>
						<li>
							<a href="../work/index_curso.php"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Curso</a>
						</li>
						<li>
							<a href="../work/index_notas.php"><i class="zmdi zmdi-label zmdi-hc-fw"></i> Notas</a>
						</li>
						<li>
							<a href="../work/index_materia.php"><i class="zmdi zmdi-folder-outline  zmdi-hc-fw"></i> Materia</a>
						</li>
						<li>
							<a href="../work/index_paralelo.php"><i class="zmdi zmdi-slideshare zmdi-hc-fw"></i> Paralelo</a>
						</li>
						<li>
							<a href="../work/index_gestion.php"><i class="zmdi zmdi-slideshare zmdi-hc-fw"></i> Gestion</a>
						</li>
						<li>
							<a href="../work/index_nivel.php"><i class="zmdi zmdi-slideshare zmdi-hc-fw"></i> Nivel</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../work/index_profesor.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Profesores</a>
						</li>
						<li>
							<a href="../work/index_padre_familia.php"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Padre de Familia</a>
						</li>
						<li>
							<a href="../work/index_estudiante.php"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Estudiantes</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-card zmdi-hc-fw"></i> Registros <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../work/index_persona.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Personas</a>
						</li>
						<li>
							<a href="../work/index_grupo.php"><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i> Designacion de cursos</a>
						</li>
						<li>
							<a href="../work/index_inscrito.php"><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i> inscritos</a>
						</li>
						<li>
							<a href="../work/index_rol.php"><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i> Roles</a>
						</li>
						<li>
							<a href="../work/index_usuario.php"><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i> Usuarios Cuenta</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> Informacion de Colegio <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../work/index_informacion_colegio.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Datos de Colegio</a>
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
			  <h1 class="text-titles">Notas <small>Datos</small></h1>
			</div>
		</div>
		<!--menu de lista de index-->
		<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12">
							<ul class="nav nav-tabs" style="margin-bottom: 15px;">
								<li class="active"><a id="add_button" data-toggle="tab">New</a></li>
								<li class="active"><a href="grupo2/home.html" data-toggle="tab">List</a></li>
							</ul>
						</div>
					</div>
					<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Id Persona</th>
							<th>Id Curso</th>
							<th>Id Gestion</th>
							<th>Id Grupo</th>
							<th>Nota_B1</th>
							<th>Nota_B2</th>
							<th>Nota_B3</th>
							<th>Nota_B4</th>
							<th>Nota_Final</th>
							<th>MODIFICAR</th>
							<th>ELIMINAR</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>

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

	<!--INICIO MODAL 1-->
<div id="apicrudModal" class="modal fade bs-example-modal-lg" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Datos Nota</h4>
		      	</div>
		      	<div class="modal-body">
			<div class="panel-body">
	                    <div class="col-md-6">
	                        
	                        <label>Id Persona </label>
	                        <input type="text" name="id_persona" class="form-control" id="id_persona" placeholder="Ingrese Id Persona" maxlength="">
	                        <br>
	                    </div>
	                    <div class="col-md-6">
	                        <label>Id Curso </label>
	                         <input type="text" name="id_curso" class="form-control" id="id_curso" placeholder="Ingrese Id Curso" maxlength="">
	                       <br>
	                    </div>
	                    <div class="col-md-6">
	                        <label >Id Gestion </label>
	                        <input type="text" name="id_gestion" class="form-control" id="id_gestion" placeholder="Ingrese Id Gestion" maxlength="">
	                        <br>
	                    </div>       
	                    <div class="col-md-6">
	                        <label>Id Grupo </label>
	                        <input type="text" name="id_grupo" class="form-control" id="id_grupo" placeholder="Ingrese Id Grupo" maxlength="">
	                            <br>
	                    </div>
						<div class="col-md-6">
	                        <label>Nota_B1 </label>
	                        <input type="text" name="nota_b1" class="form-control" id="nota_b1" placeholder="Ingrese Nota_B1" maxlength="">
	                            <br>
	                    </div>  
	                    <div class="col-md-6">
	                        <label>Nota_B2</label>
	                        <input type="text" name="nota_b2" class="form-control" id="nota_b2" placeholder="Ingrese Nota_B2" maxlength=""> 
	                        <br>
	                    </div>
                        <div class="col-md-6">
	                        <label>Nota_B2 </label>
	                        <input type="text" name="nota_b3" class="form-control" id="nota_b3" placeholder="Ingrese Nota_B3" maxlength="">
	                            <br>
	                    </div>
						<div class="col-md-6">
	                        <label>Nota_B4 </label>
	                        <input type="text" name="nota_b4" class="form-control" id="nota_b4" placeholder="Ingrese Nota_B4" maxlength="">
	                            <br>
	                    </div>
						<div class="col-md-6">
	                        <label>Nota_Final </label>
	                        <input type="text" name="nota_final" class="form-control" id="nota_final" placeholder="Ingrese Nota_Final" maxlength="">
	                            <br>
	                    </div>   
	                  
	                   
			</div>         
        </div> 
        <div class="modal-footer">
		<input type="hidden" name="hidden_id" id="hidden_id" />
			    	<input type="hidden" name="action" id="action" value="insert" />
			    	<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
			    	
        </div> 
			</form>
		</div>
  	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){

	fetch_data();
	function fetch_data()
	{
		$.ajax({
			url:"fetch_notas.php",
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}

	$('#add_button').click(function(){
		$('#action').val('insert');
		$('#button_action').val('Insert');
		$('.modal-title').text('Datos de Notas');
		$('#apicrudModal').modal('show');
	});

	$('#api_crud_form').on('submit', function(event){
		event.preventDefault();
		if($('#id_persona').val() == '')
		{
			alert("Ingresar Id_persona");
		}
		else if($('#id_curso').val() == '')
		{
			alert("Ingrese Id Curso ");
		}
		else if($('#id_gestion').val() == '')
		{
			alert("Ingresar Id Gestion");
		}
		else if($('#id_grupo').val() == '')
		{
			alert("Ingresar id_grupo");
		}
		else if($('#nota_b1').val() == '')
		{
			alert("Ingresar nota_b1");
		}
		
		else if($('#nota_b2').val() == '')
		{
			alert("Ingresar nota_b2");
		}
		
        else if($('#nota_b3').val() == '')
		{
			alert("Ingresar nota_b3");
		}
        else if($('#nota_b4').val() == '')
		{
			alert("Ingresar nota_b4");
		}
		else if($('#nota_final').val() == '')
		{
			alert("Ingresar nota_final");
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"action_notas.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
					if(data == 'insert')
					{
						alert("Data Inserted using PHP API");
					}
					if(data == 'update')
					{
						alert("Data Updated using PHP API");
					}
				}
			});
			console.info("luego de ajax")
		}
	});

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"action_notas.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#hidden_id').val(data.id_persona);
				$('#id_persona').val(data.id_persona);
				$('#id_curso').val(data.id_curso);
				$('#id_gestion').val(data.id_gestion);
				$('#id_grupo').val(data.id_grupo);
				$('#nota_b1').val(data.nota_b1);
				$('#nota_b2').val(data.nota_b2);
                $('#nota_b3').val(data.nota_b3);
                $('#nota_b4').val(data.nota_b4);
				$('#nota_final').val(data.nota_final);
				$('#action').val('update');
				$('#button_action').val('Update');
				$('.modal-title').text('Modificar Datos Estudiante');
				$('#apicrudModal').modal('show');
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		var action = 'delete';
		if(confirm("Esta seguro de eliminar el Dato"))
		{
			$.ajax({
				url:"action_notas.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data)
				{
					fetch_data();
					alert("Data Deleted using PHP API");
				}
			});
		}
	});

});
</script>
	<!--====== Scripts -->
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/material.min.js"></script>
	<script src="../js/ripples.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>
























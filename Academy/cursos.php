<!DOCTYPE html>
<html lang="es-CL">
  <head>
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="bootstrap/datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <?php 
    	require_once("head.php");
    ?>
    <?php 
	  	require_once("nav.php");
	  ?>
  </head>
  <body>
  	
	<div class="container" style="margin-bottom: 500px;">
		<h2>Cursos</h2>
		
		<form  action="create_curso.php" method="post">
		  	<div class="form-group">
		    	<label >Nombre del Curso</label>
		    	
		      		<input type="text" name="txtCurso" id="txtCurso" class="form-control" placeholder="Nombre del Curso"/>
		    	
		  	</div>
		  	<div class="form-group">
		    	<label >Nombre del Docente</label>
		 
		      		<input type="text" name="txtDocente" id="txtDocente" class="form-control"  placeholder="Nombre del Docente"/>
		  
		  	</div>
		  	<div class="form-group" style="position: relative">
		    	<label >Horario</label>
		   		 <input type='text' class="form-control" name="datetimepicker4" id='datetimepicker4' placeholder="DD/MM/AAAA hh:mm" />
			       
			   
		  	</div>
		  
		  	<button type="submit" class="btn btn-medium btn-success"><i class="icon-book icon-white"></i> Guardar cambios</button>
		</form>
		<br><br><br>
		<h3>Todos los cursos</h3>
		
		<table class="table table-striped table-bordered">
			<thead>
			    <tr class="tr-head" style="background: #eaeaea !important">
			    	<th>Curso</th>
			    	<th>Docente</th>
			    	<th>Horario</th>
			    	<th>Modificar</th>
			    	<th>Eliminar</th>
			    </tr>
			</thead>
			<tbody>
				<?php
					require_once("lista_cursos.php");

					if (count($cursos)>0) {

						foreach ($cursos as $curso) {
				?>
				<tr>
					<td><?php echo $curso["nombre"]; ?></td>
					<td><?php echo $curso["docente"]; ?></td>
					<td><?php echo $curso["horario"]; ?></td>
					<td><a href="edit_curso.php?id=<?php echo $curso["_id"]; ?>" class="btn btn-small btn-warning"><i class="icon-pencil icon-white"></i> Modificar</a></td>
					<td><a href="delete_curso.php?id=<?php echo $curso["_id"]; ?>" class="btn btn-small btn-danger"><i class="icon-remove icon-white"></i> Eliminar</a></td>
				</tr>	
				<?php
						}
					}else{
				?>
				<tr>
					<td colspan="5"><i class="icon-info-sign"></i> No data Available</h4></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<footer>
		  <p></p>
		</footer>
	</div> <!-- /container -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="bootstrap/moment/min/moment.min.js"></script>
    <script src="bootstrap/datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

     <script type="text/javascript">
			            $(function () {
			                $('#datetimepicker4').datetimepicker();
			            });
			        </script>


  </body>
</html>
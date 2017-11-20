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
  	
	  

	<div class="container">
		<h2>Editar Curso</h2>

		<form  action="curso_update.php" method="post">
			<?php
				require_once("lista_cursos.php");

				$id = $_GET["id"];
				$selectCurso = array();
				foreach ($cursos as $curso){
					if($curso['_id'] == $id )
						$selectCurso = $curso;

				}
			?>
		  	<div class="form-group">
		    	<label >Nombre del Curso</label>
		    	
		      		<input type="text" name="txtCurso" id="txtCurso" class="form-control" placeholder="Nombre del Curso" required 
		      		value="<? echo $selectCurso['nombre'];?>" />
		    	
		  	</div>
		  	<div class="form-group">
		    	<label >Nombre del Docente</label>
		 
		      		<input type="text" name="txtDocente" id="txtDocente" class="form-control"  placeholder="Nombre del Docente"
		      		value="<? echo $selectCurso['docente'];?>" />
		  
		  	</div>
		  	<div class="form-group" style="position: relative">
		    	<label >Horario</label>
		   		 <input type='text' class="form-control" name="datetimepicker4" id='datetimepicker4' placeholder="DD/MM/AAAA hh:mm"
		   		 value="<? echo $selectCurso['horario'];?>"  />
			       
			   <input type="hidden" name="id" value="<?php echo $id ?>" />
		  	</div>
		  
		  	<button type="submit" class="btn btn-medium btn-success"><i class="icon-book icon-white"></i> Guardar cambios</button>
		</form>
		<footer>
		  
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
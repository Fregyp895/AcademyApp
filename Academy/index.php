<!DOCTYPE html>
<html lang="es-CL">
  <head>
    <?php 
    	require_once("head.php");
    ?>
  </head>
  <body>
  	<div class="navbar navbar navbar-inverse navbar-fixed-top">
	  <?php 
	  	require_once("nav.php");
	  ?>
	</div>
	<div class="container">
		<h2>Sistema de Matriculas en Mongo DB</h2>
		<br><br>
		<?php
			
			$mensaje = $_GET["mensaje"];
			if ($mensaje == 1) {
				echo "<p class='btn  btn-danger'><i class='icon-trash icon-white'></i> El libro fue eliminado con éxito.</p><br><br>";
			}
			if ($mensaje == 2) {
				echo "<p class='btn  btn-success'><i class='icon-ok icon-white'></i> El libro fue guardado con éxito.</p><br><br>";
			}
			if ($mensaje == 3) {
				echo "<p class='btn  btn-warning'><i class='icon-refresh icon-white'></i> El libro fue modificado con éxito.</p><br><br>";
			}
		?>
		<form class="form-horizontal" action="add_libro.php" method="post">
		  	<div class="control-group">
		    	<label class="control-label" for="inputNameLibro">Nombre del Alumno</label>
		    	<div class="controls">
		      		<input type="text" name="nameLibro" id="inputNameLibro" class="input-xlarge" placeholder="Nombre del Libro" required />
		    	</div>
		  	</div>
			
		  	<div class="control-group">
		    	<label class="control-label" for="inputAutor">Codigo</label>
		    	<div class="controls">
		      		<input type="text" name="descripcion" rows="6" class="input-xlarge" placeholder="Codigo del alumno" required/>
		    	</div>
		  	</div>
		  	<div class="control-group">
		    	<label class="control-label" for="inputAutor">Nombre del Curso</label>
		    	<div class="controls">
		      		<select name="autor" required>
		      			<option value="" disabled selected>Selecciona un curso</option>
		      			<?php
							require_once("connect_autores.php");

							if (count($c_autores)>0)
							{
								//$autores = $c_autores->find();
								foreach ($c_autores as $autor) {
						?>
						<option value="<?php echo $autor['nombre'] ?>"><?php echo $autor['nombre'] ?></option>
						<?php 
								}
							}else{
						?>
						<option value="Sin Autor">Sin Autor</option>
						<?php } ?>
		      			
		      		</select>
		    	</div>
		  	</div>
		  	<div class="control-group">
		    	<div class="controls">
		      		<button type="submit" class="btn btn-medium btn-success"><i class="icon-book icon-white"></i> Guardar cambios</button>
		    	</div>
		  	</div>
		</form>

		<h3>Lista de libro almacenados</h3>
		<table class="table table-striped table-bordered">
			<thead>
			    <tr class="tr-head" style="background: #eaeaea !important">
			    	<th>Codigo</th>
			    	<th>Nombre del alumno</th>
			    	<th>Curso</th>
			    	<th>Modificar</th>
			    	<th>Eliminar</th>
			    </tr>
			</thead>
			<tbody>
				<?php
					require_once("connect_libros.php");

					if (count($c_libros)>0)
					{
						
						foreach ($c_libros as $libro) {
						
				?>
				<tr>
					<td><?php echo $libro["nombre"]; ?></td>
					<td><?php echo $libro["autor"]; ?></td>
					<td><?php echo $libro["descripcion"]; ?></td>
					<td><a href="mod_libro.php?id=<?php echo $libro['_id'] ?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i> Modificar</a></td>
					<td><a href="eliminar_libro.php?id=<?php echo $libro['_id'] ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Eliminar</a></td>
				</tr>
				<?php
						}
					}else{
				?>
				<tr>
					<td colspan="4"><h4><i class="icon-info-sign"></i> Sin registros en la Base de Datos</h4></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<footer>
		  <p>Desarrollado por @JuanGarciaR</p>
		</footer>
	</div> <!-- /container -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
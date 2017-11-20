<?php
	$bulk = new MongoDB\Driver\BulkWrite();

	$nameCurso = $_POST["txtCurso"];
	$nameDocente = $_POST["txtDocente"];
	$nameHorario = $_POST["datetimepicker4"];
	$nuevoCurso = array("nombre"=>$nameCurso,
						"docente"=> $nameDocente,
						"horario" => $nameHorario );
	

	$bulk->insert($nuevoCurso);

	$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
	$result = $manager->executeBulkWrite('academy.cursos', $bulk, $writeConcern);

	header("Refresh: 0;url=cursos.php")
?>
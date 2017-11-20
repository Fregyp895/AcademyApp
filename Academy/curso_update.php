<?php
	
	$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$bulk = new MongoDB\Driver\BulkWrite();


	
	$id = $_POST["id"];
	$nameCurso = $_POST["txtCurso"];
	$nameDocente = $_POST["txtDocente"];
	$nameHorario = $_POST["datetimepicker4"];
	
	$editCurso = array("nombre"=>$nameCurso,
						"docente"=> $nameDocente,
						"horario" => $nameHorario );
	
	$condicion = array("_id" => new MongoDB\BSON\ObjectId($id));
	
	$bulk->update($condicion , ['$set' => $editCurso], ['multi' => false, 'upsert' => false]);

	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
	$result = $manager->executeBulkWrite('academy.cursos', $bulk, $writeConcern);

	header("Refresh: 0;url=cursos.php")
?>
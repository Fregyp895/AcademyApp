<?php
	
	$id = $_GET["id"];
	$condicion = array("_id" => new MongoDB\BSON\ObjectId($id));
	$bulk = new MongoDB\Driver\BulkWrite;
	$bulk->delete($condicion , ['limit' => 0]);
	


	$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
	$result = $manager->executeBulkWrite('academy.cursos', $bulk);
	header("Refresh: 0;url=cursos.php");
?>
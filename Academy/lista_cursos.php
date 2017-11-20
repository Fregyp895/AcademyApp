<?php 

	$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$query = new MongoDB\Driver\Query([],[]);
	$all = $manager->executeQuery('academy.cursos', $query);
	$cursos = array();
	foreach ($all as $document) {
    	array_push($cursos,['_id'=>$document->_id,
    						'nombre'=>$document->nombre,
    						'docente'=>$document->docente,
    						'horario'=>$document->horario]);
	}

?>
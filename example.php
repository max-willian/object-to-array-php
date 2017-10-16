<?php
	include_once 'example-class.php';
	include_once 'object-to-array.php';
	
	//instanciamos um objeto da classe Example e setamos seus atributos
	$example1 = new Example();
	$example1->setId(1);
	$example1->setName('Max');
	
	var_dump($example1); //dump object
	var_dump(toArray($example1)); //dump array, ready to convert to json
	
	$example2 = new Example();
	$example2->setId(2);
	$example2->setName('Willian');
	$array = [$example1, $example2];
	
	var_dump(toArray($array));
?>
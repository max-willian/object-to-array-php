<?php
	
	//Se for passado um array de objetos, esta função será responsável por transforma-los todos em arrays
	function toArray($class) {
		
		if(is_array($class)){
			$retorno = array();
			
			foreach($class as $c){
				$retorno[] = subToArray($c);
			}
		}
		else{
			$retorno = subToArray($class);
		}
		
		return $retorno;	
	}
	
	//transforma um objeto em array
	function subToArray($class){
		$arr = array();
		
		$reflexao = new \ReflectionClass($class);

		$propriedades  = $reflexao->getProperties(\ReflectionProperty::IS_PRIVATE);	

		//Para cada propriedade da classe, a transformaremos em um índice de array
		foreach ($propriedades as $propriedade) {
			$propriedade->setAccessible(true);
			$arr[$propriedade->getName()] = $propriedade->getValue($class);

			//Se for um objeto, vamos chamar esta função novamente p transformar em array
			if(is_object($arr[$propriedade->getName()]))
			{
				$arr[$propriedade->getName()] = subToArray($arr[$propriedade->getName()]);	
			}
		}
		
		return $arr;
	}

?>
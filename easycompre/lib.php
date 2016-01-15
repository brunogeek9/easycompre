<?php
 namespace Metodos;
	function PHPAlert($msg){
		echo '<script type="text/javascript"> alert('.$msg.');</script>';
	}

	function limparCPF($objeto){
		for($i = 0; $i<strlen($objeto);$i++){
			if(($objeto[$i] >= '0') && ($objeto[$i]<='9'))
			$objl = $objl.$objeto[$i]; 
		}
		return $objl;
	}

	function validarCPF($cpf){
		$soma1 = 0;
		$peso = 10;
		$peso2 = 11;
		for($i=0; $i<9; $i++){
			$soma1 += $cpf[$i]*$peso;
			$peso = $peso - 1;
		}
		$resto1 = $soma1%11;
		if(($resto1 < 2 && $cpf[9] == "0")||($resto1 >= 2 && $cpf[9] == (11-$resto1))){
			$soma1 = 0;
			for($i = 0; $i < 10; $i++){
				$soma1+= $cpf[$i]*$peso2;
				$peso2 = $peso2 - 1;
		}
		$resto1 = $soma1%11;
		if(($resto1<2 && $cpf[10] == "0")|| ($resto1 >= 2 && $cpf[10] )){
			return $cpf;
			} else {
			echo "cpf invalido";	
			}
			} else {
			}
}
?>
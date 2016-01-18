<?php
 namespace Metodos;
	function PHPAlert($msg){
		echo '<script type="text/javascript"> alert('.$msg.');</script>';
	}

	function validarNome($nome){
		if((strlen($nome)>8)&&($nome<40)){
			return true;
		}
		else
			return false;	
	}

	function limparDado($objeto){
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
	
	function validarTelefone($telefone){
		$telefone = str_replace("(", "", $telefone);
		$telefone = str_replace(")", "", $telefone);
		$telefone = str_replace(" ", "", $telefone);
		if((strlen($telefone)==11)&&(is_numeric($telefone))){
			return true;
		}
		else 
			return false;
	}
	
	function validarData($data){
		$dataL=limparDado($data);
		//echo $dataL;
		$hoje=date('Y-m-d');
		if(strlen($dataL)==8){
			
			$dia= $dataL[0].$dataL[1];
			$mes = $dataL[2].$dataL[3];
			$ano= $dataL[4].$dataL[5].$dataL[6].$dataL[7];
			if(checkdate($mes, $dia, $ano)){
				$ha=$hoje[0].$hoje[1].$hoje[2].$hoje[3];
				$hm=$hoje[5].$hoje[6];
				$hd=$hoje[8].$hoje[9];
				if ($ano+18<=$ha&&($mes<=$hm)&&($dia<=$hd)) {
					return true;
				}
				else 
					{return false;}
			}
			else {return false;}
		}
		else
			{return false;}
	}
	function validarEmail($email){
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	 		echo "E-mail inválido.";   
		}else{
	 		echo "Seu e-mail e ".$email;
		}
	}
	function validarSenha($senha,$confirmar){
		if(($senha==$confirmar)&&(strlen($senha)>=8)&&(strlen($senha)<=40)&&(strlen($confirmar)>=8)&&(strlen($confirmar)<=40)){
			return true;
		}
		else 
			return false;
	}
?>
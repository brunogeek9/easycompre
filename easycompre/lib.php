<?php
 namespace Metodos;
 	//include_once();
	function PHPAlert($msg){
		echo '<script type="text/javascript"> alert('.$msg.');</script>';
	}
	function confirmacao(){

		/*echo '<div class="alert alert-success fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Cadastro realizado com sucesso</strong> 
		</div>';*/
		echo "disi";
	}
	function retornarData($data){
		return date('d/m/Y', strtotime($data));
	}
	function validarNome($nome){
		if((strlen($nome)>8)&&($nome<40)){
			return $nome;
		}
		else
			return NULL;	
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
			return $telefone;
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
					return $ano.'-'.$mes.'-'.$dia;
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
	 		//echo "E-mail inválido.";
	 		return false;

		}else{
	 		//echo "Seu e-mail e ".$email;
	 		return $email;
		}
	}
	function validarSenha($senha,$confirmar){
		if(($senha==$confirmar)&&(strlen($senha)>=8)&&(strlen($senha)<=40)&&(strlen($confirmar)>=8)&&(strlen($confirmar)<=40)){
			return $senha;
		}
		else 
			return false;
	}
	
/*if(validarSenha("zangszangs","zangszangs")){
echo "aa";*/
//}
//}
?>
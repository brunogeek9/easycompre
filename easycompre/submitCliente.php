<?php
	include_once("Control/controladorSubmit.php");
	include_once("lib.php");
	$nome=$_POST['nome'];
	$cpf=$_POST['cpf'];
	//$cpfLimpo=\Metodos\limparCPF($cpf);
	//$cpfValido=\Metodos\validarCPF($cpfLimpo);
	//$cpf=$cpfValido;
	//echo $data=date('Y-m-d');
	
	//$telefone_residencial=
	$telefone_residencial=$_POST['telefone_residencial'];
	$telefone_celular=$_POST['telefone_celular'];
	$data_nascimento=$_POST['data_nascimento'];
	//echo \Metodos\validarData($data);
	/*echo $data[0].$data[1].'<br>';
	echo $data[3].$data[4].'<br>';
	echo $data[6].$data[7].$data[8].$data[9].'<br>';
	$h=date('Y-m-d');*/
	//echo $h;
	$email= $_POST['email'];
	//$email="brunogeek9@yahoo.com";
	$senha= $_POST['senha'];
	$confirmar= $_POST['confirmaSenha'];
	$pkNivel=1;
	//var_dump(\Metodos\validarSenha($senha,$confirmar));
	//var_dump(\Metodos\validarData($data));
	//var_dump(\Metodos\validarEmail($email));
	$idsexo=3;
	$idendereco=3;
	$c=new controladorSubmit;
	//$c->inserirNivel()
	$c->inserirCliente($cpf,$data_nascimento,$email,$nome,$telefone_celular,$telefone_residencial,$senha,$confirmar,$idsexo,$idendereco,$pkNivel);
?>
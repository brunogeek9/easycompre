<?php
	//include_once("beans/clienteBEAN.php");
	include_once("DAOs/clienteDAO.php");
	include_once("Control/controladorSubmit.php");
	include_once("lib.php");
	//$cli = new cliente;
	//use Metodos;
	$cpf=$_POST['cpf'];
	$cpfLimpo=\Metodos\limparCPF($cpf);
	$cpfValido=\Metodos\validarCPF($cpfLimpo);

	echo $cpfValido;
	$cpf=$cpfValido;
	$data=$_POST['data_nascimento'];
	$email=$_POST['email'];
	$nome=$_POST['nome'];
	$senha=$_POST['senha'];
	$telefone_celular=$_POST['telefone_celular'];
	$telefone_residencial=$_POST['telefone_residencial'];
	$idSexo="";
	$sexo="";
	$c=new controladorSubmit;
	$c->inserirCliente($cpf,$data_nascimento,$email,$nome,$telefone_celular,$telefone_residencial,$senha);
	
?>
<?php
	include_once("DAOs/clienteDAO.php");
	$email=$_GET['email'];
	$nivel=$_POST['nivel'];
	if($_POST['nivel']=='1'){
		$c=new clienteDAO;
		echo $email.' '.$nivel;
		$c->alterarNivel($nivel,$email);
		header("location :http://easycompre.esy.es/testeADM.php");
	}
	elseif($_POST['nivel']=='2'){
		$c=new clienteDAO;
		echo $nivel.' '.$email;
		$c->alterarNivel($nivel,$email);
		header("location :http://easycompre.esy.es/testeADM.php");
	}
?>
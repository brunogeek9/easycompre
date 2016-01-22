<?php
	include_once("Control/adm.php");
	include_once("Control/controladorSubmit.php");
	include_once("DAOs/clienteDAO.php");
	$a=new controladorSubmit;
	var_dump($a->consultaEmail("brunogeek9@gmail.com"));
	$adm=new adm;
	$adm->gerenciarNiveis();
?>
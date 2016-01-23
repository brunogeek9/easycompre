<?php
	include_once("Control/controladorPag.php");
	$Email=$_POST['email'];
	$senha=$_POST['senha'];
	$c = new controladorPag;
	$c->Login($Email,$senha);
?>
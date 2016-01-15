<?php
	include_once("DAOs/conexao.php");
	include_once("DAOs/categoriaDAO.php");
	include_once("DAOs/subcategoriaDAO.php");
	$cat = new categoriaDAO;
	$sub = new subcategoriaDAO;
	$vet=$cat->ListarCategorias();
	$num=count($vet);
	for ($i=0; $i < $num; $i++) { 
		echo $vet[$i]['nome'].'<br/>';
		$vet1=$sub->ListarSubcategorias($vet[$i]['id_categoria']);
		$num1=count($vet1);
		
	}

//	$vet1=$sub->ListarSubcategorias(1);
//	print_r($vet1); 
		
	


?>
<?php
	include_once("Control/controladorPag.php");
	class controladorCat{
		public	function insereMenu(){
			

			$pag=new controladorPag;

	    	if(($_SESSION['nivel']=="cliente") AND ($pag->isLogged()==true)){

	    		include_once("Pedacos/menu2.php");
	     	}
	      	elseif (($_SESSION['nivel']=="administrador") AND ($pag->isLogged()==true)) {

	      		include_once("Pedacos/menu3.php");
	      	}
	      	else {
	      		include_once("Pedacos/menu1.php");
	      	}
    	}
	}
?>
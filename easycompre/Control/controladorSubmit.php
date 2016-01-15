<?php
     include_once ("DAOs/clienteDAO.php");
     class controladorSubmit{
       
        public function inserirCliente($cpf,$data_nascimento,$email,$nome,$telefone_celular,$telefone_residencial,$senha){
        	$c= new clienteDAO;
        	$c->inserirCliente($cpf,$data_nascimento,$email,$nome,$telefone_celular,$telefone_residencial,$senha);
        }
        
     }
?>				
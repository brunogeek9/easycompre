<?php
     include_once ("DAOs/clienteDAO.php");
     include_once("lib.php");
     class controladorSubmit{
       
        public function inserirCliente($cpf,$data_nascimento,$email,$nome,$telefone_celular,$telefone_residencial,$senha,$confirmar,$idsexo,$idendereco,$pknivel){
        	$c= new clienteDAO;
        	/*if(empty($cpf) || empty($data_nascimento) || empty($email) || 
				empty($nome) || empty($telefone_celular) || 
				empty($telefone_residencial) || empty($senha) || empty($confirmar)){
        		$msg="Por favor preencha todos os campos".'<br>';*/
        		//.$email." ".$nome." ".$telefone_celular." ".$telefone_residencial." ".$senha." ".$confirmar." ".$idsexo." ".$idendereco;
        		$nomeValido=\Metodos\validarNome($nome);
        		$residencial=\Metodos\validarTelefone($telefone_residencial);
        		$celular=\Metodos\validarTelefone($telefone_celular);
        		$data=\Metodos\validarData($data_nascimento);
        		$e=\Metodos\validarEmail($email);
        		$pkNivel=1;
        		if($nomeValido){
        			
        			//$msg="Por favor digite um nome valido";
        			if($residencial){
        				
        				if($celular){


        					if($data){
        						echo $email;

        						if ($e){
        							echo $e;
        							if (Metodos\validarSenha($senha,$confirmar)) {
        								echo $e;
        								//if (($this->consultaCPF($cpf)==true)&&($this->consultaEmail($e)==true)) {
        									echo $e;
        									//$c->inserirNivel("cliente");
        									//pega o ultimo id
        									//$ultimoID=$c->ultimoID();
        									//echo $ultimoID;
        									$c->inserirCliente($cpf,$data,$e,$nomeValido,$celular,$residencial,$senha,$idsexo,$idendereco,$pkNivel);
        									
        								//}
        							}
        							else {$msg="Senha invalida";}
        						}
        						else {$msg="Email invalido";}
        					}
        					else {$msg="Data nascimento invalida";
        							echo $msg;
        					}
        				}
        				else {$msg="Telefone celular invalido";}
        			}
        			else {$msg="Telefone Residencial invalido";}
        		}
        		else 
        			$msg="Nome Invalido";
        			echo $msg;
        	//}

        	
        }

        public function consultaEmail($e){
        	$c=new clienteDAO;
        	$lista=$c->consultaCliente();
        	foreach ($lista as $cpf => $email) {
        		if($email['email']==$e){
        			return true;
        		}
        	}
        }
        
        public function consultaCPF($value){
      		$c=new clienteDAO;
      		$lista=$c->consultaCliente();
      		foreach ($lista as $cpf => $email) {
      			if($email['cpf']==$value){
      				return true;
      			}
      			else 
      				return false;
      		}
        }

        


     }
?>				
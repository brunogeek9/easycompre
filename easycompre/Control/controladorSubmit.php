<?php
    include_once ("DAOs/clienteDAO.php");
    include_once("lib.php");
    class controladorSubmit{
       
        public function inserirCliente($cpf,$data_nascimento,$email,$nome,$telefone_celular,$telefone_residencial,$senha,$confirmar,$idsexo,$idendereco,$pknivel){
            $c= new clienteDAO;
            
                $nomeValido=\Metodos\validarNome($nome);
                $residencial=\Metodos\validarTelefone($telefone_residencial);
                $celular=\Metodos\validarTelefone($telefone_celular);
                $data=\Metodos\validarData($data_nascimento);
                $e=\Metodos\validarEmail($email);
                $pkNivel=1;

                if($nomeValido){
                    
                    if($residencial){
                    
                        if($celular){

                            if($data){
                    
                                echo $email;

                                if ($e){
                                    \Metodos\PHPalert("Por favor informe um endereço de email valido");
                                    echo $e;
                                   if (Metodos\validarSenha($senha,$confirmar)) {
                                        \Metodos\PHPalert("chegou");
                                        $c->inserirCliente($cpf,$data,$e,$nomeValido,$celular,$residencial,$senha,$idsexo,$idendereco,$pkNivel);
                                        \Metodos\PHPalert("Usuario cadastrado com sucesso");
                                        include_once("home.php");
                                    }
                                }
                                else{
                                    $msg="email invalido";
                                } 
                                
                            }else{
                                $msg="Data invalida";
                            }
                        }else{
                            $msg="Telefone invalido";
                        }
                    }else{
                        $msg=" Telefone invalido";
                }

                }else{
                        $msg="nome Invalido ";
                }
                \Metodos\PHPalert($msg);
                include_once("home.php");
        }

    public function consultaEmail($e){
        $c=new clienteDAO;
        $lista=$c->consultaCliente();
        foreach ($lista as $cpf => $email) {
            if($email['email']==$e){
                return $e;
            }
        }
    }
        
    public function consultaCPF($value){
        $c=new clienteDAO;
        $lista=$c->consultaCliente();
        foreach ($lista as $cpf => $email){
            if($email['cpf']==$value){
                return true;
            }
            else 
                return false;
        }
    }

        


     }
?>              
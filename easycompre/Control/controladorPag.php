<?php
	include_once ("controladorProdutos.php");
	include_once ("carrinho.php");
	include_once("lib.php");
	include_once("controladorSubmit.php");
	include_once("DAOs/clienteDAO.php");
	include_once("Control/adm.php");
	class controladorPag{
		public function AbrePagina(){
					$acao=$_GET['acao'];
					//se logado pode comprar caso n nao pode
					//se logado topo1 se n topo2
					//se nivel for administrador pode acessar as telas de administrador
					if(isset($_GET['acao'])){
					$id=$_GET['id'];
					if($acao=="atualizarPagamento"){
						$status=$_GET['status'];
						$idpedido=$_GET['idpedido'];
						echo $status.'---'.$idpedido;
						$adm = new adm;
						$adm->gerenciarPedidos();
						$adm-> atualizarPagamento($status,$idpedido);
						
					}
					elseif ($acao="atualizarPedido") {
						$status=$_GET['status'];
						$idpedido=$_GET['idpedido'];
						echo $status.'---'.$idpedido;
						$adm = new adm;
						$adm->gerenciarPedidos();
						$adm-> atualizarPedido($status,$idpedido);		
					}	
					if($acao=="cadastroCliente"){
						include_once("submitCliente.php");
						//("easycompre.esy.es/index.php");
						//\Metodos\confirmacao();
					}
					elseif($acao=="logar"){
						include_once("submitLogin.php");
						header("location :http://easycompre.esy.es");
						echo "a";
					}
					
			        if($acao == 'telaProd'){
			          $ob = new controladorProdutos();
			          $ob-> GerarTela($id);
					}

					if($acao == 'frete'){
			  			$cep = $_POST['cep'];
			  			$peso = 1;
			  			//echo \Metodos\PHPAlert("a");
			  			header('location: http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=59200000&sCepDestino='.$cep.'&nVlPeso='.$peso.'&nCdFormato=1&nVlComprimento=20&nVlAltura=5&nVlLargura=15&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=41106&nVlDiametro=0&StrRetorno=http://easycompre.esy.es/paginas.php?acao=telacar'); 
					}
					if($acao=='FinalizarCompra'){
						//die("morrrreu");
						include_once("pedido.php");
					}
					if($acao=='add'){
			          $ob = new Carrinho;
			          $id=$_GET['id'];
			          $ob->AdicionarProduto($id);
			          $ob->TelaCarrinho();
					}
					if($acao=='rm'){
			          $dog=new Carrinho;
			          $id=$_GET['id'];
			          $dog->RemoverProduto($id);
					  $dog->TelaCarrinho();
					  //include_once("paginas?acao=telacar");
			        }
			        if($acao=='alterar'){
			          //if (isset($_SESSION['carrinho'][$id])){
						if (isset($_POST['decremento'])){		 
								echo "haha";
								$_SESSION['carrinho'][$id] -= 1;
								//$dog= new Carrinho;
								//$dog->TelaCarrinho();
								if ($_SESSION['carrinho'][$id] == 0){
									unset($_SESSION['carrinho'][$id]);
								}
					  	}
					    elseif (isset($_POST['incremento'])) {
							$_SESSION['carrinho'][$id] += 1;
							$dog->TelaCarrinho();
						}
					}	
					if($acao=='telacar'){	
						$dog=new Carrinho;
						$dog->TelaCarrinho();
					}
			        if($acao=='telaCats'){
        				$dog=new ControladorCat;
            			$dog->TelaCat;
		        }
			}
		}
		public function Login($Email,$senha){
			$c=new clienteDAO;
			$cli= new clienteDAO;
      		$lista=$c->consultaCliente();
      		//var_dump($lista);
      		$notLogged=true;
      		foreach ($lista as $cpf => $email) {
      			
      			if(($email['senha']==$senha)&&($email['email']==$Email)){
      				//echo $email['cpf'];
      				session_start();
      				$_SESSION['email']=$email['email'];
      				$_SESSION['senha']=$email['senha'];
      				$_SESSION['cpf']=$email['cpf'];
      				$_SESSION['nome']=$email['nome'];
      				$nivel= $cli->consultaNivel($_SESSION['cpf']);
      				$_SESSION['nivel']=$nivel[0][0];
      				$notLogged=false;
      				var_dump($_SESSION);
      				break;

      			}
      			
      			
      		}
      		if($notLogged){
      			echo"usuario ou senha invalidos";
      			var_dump($_SESSION);
      			header("Location: http://easycompre.esy.es");
      		}
      	}
	}
?>
		
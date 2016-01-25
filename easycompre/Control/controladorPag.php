<?php
	//include_once ("controladorProdutos.php");
	//include_once ("carrinho.php");
	include_once("lib.php");
	include_once("controladorSubmit.php");
	include_once("DAOs/clienteDAO.php");
	include_once("Control/adm.php");
	class controladorPag{

		public function AbrePagina(){
				$acao=$_GET['acao'];
				//se logado pode comprar caso n nao pode
				//se nivel for administrador pode acessar as telas de administrador
				if(!isset($acao)){
					include_once("home.php");	
				}
		        elseif(isset($_GET['acao'])){
		        	session_start();
					$id=$_GET['id'];
					$enviar=$_GET['enviar'];
					//ADM
					//
					if($acao=="adm"){
						$adm=new adm;
						$adm->telaADM();
						echo "<img id='root' src='imagens/root.png'>";
					}
					
					elseif (($acao=="homeadm") AND ($this->isLogged()==true) AND ($_SESSION['nivel']=="administrador")){
						var_dump($_SESSION);
						$adm=new adm;
						$adm->telaADM();
						echo '<form action=""><input type="hidden">';
						echo '<a href="javascript: submitform()"></a>';
						echo '</form>';
						echo "<img id='root' src='imagens/root.png'>";
						$adm=new adm;
						//var_dump($_SESSION);
					//	$adm->gerenciarNiveis();
					}
					//AND ($_SESSION['nivel']=="administrador") 
					session_start();
					if((($acao=="gerenciarPedidos") OR ($acao=="atualizarPagamento")) AND ($this->isLogged()==true) AND ($_SESSION['nivel']=="administrador")){
						session_start();
						$adm=new adm;
						$adm->telaADM();
						$adm->gerenciarPedidos();
						$status=$_GET['status'];
						$idpedido=$_GET['idpedido'];
						$adm = new adm;
						$adm-> atualizarPagamento($status,$idpedido);
					}

					session_start();
					if ((($acao=="gerenciarPedidos") OR ($acao=="atualizarPedido")) AND ($this->isLogged==true) ){
						session_start();
						$adm=new adm;
						$adm->telaADM();
						$adm->gerenciarPedidos();
						$status=$_GET['status'];
						$idpedido=$_GET['idpedido'];
						$adm = new adm;
						$adm-> atualizarPedido($status,$idpedido);		
					}
					
					if (($acao=="gerenciarNiveis") AND ($_SESSION['nivel']=="administrador")){
						$adm=new adm;
						var_dump($_SESSION);
						$adm->telaADM();
						$adm->gerenciarNiveis();
					}

					if(($acao=="alterarNivel") AND ($enviar=="linhaEmail")){// AND ($_SESSION['nivel']=="administrador")){
						session_start();
						include_once("submitAN.php");
						$adm=new adm;
						$adm->telaADM();
						$adm->gerenciarNiveis();
					}

					elseif ($acao=="alterarNivel") {//AND ($_SESSION['nivel']=="administrador")){
						session_start();
						$email=$_POST['emailNivel'];		
						if($email){
							echo $email;
							$con=new controladorSubmit;
							$adm=new adm;
							if($con->consultaEmail($email)){
								$adm->telaADM();
								$adm->linhaEmail($email);
							} 
						}
					}
					//
					//administrador
					elseif($acao=="cadastroCliente"){
						//include_once("submitCliente.php");
						session_start();
						include_once("Control/controladorSubmit.php");
						include_once("lib.php");
						$nome=$_POST['nome'];
						$cpf=$_POST['cpf'];
						$telefone_residencial=$_POST['telefone_residencial'];
						$telefone_celular=$_POST['telefone_celular'];
						$data_nascimento=$_POST['data_nascimento'];
						$email= $_POST['email'];
						$senha= $_POST['senha'];
						$confirmar= $_POST['confirmaSenha'];
						$pkNivel=1;
						$idsexo=3;
						$idendereco=3;
						$c=new controladorSubmit;

						$c->inserirCliente($cpf,$data_nascimento,$email,$nome,$telefone_celular,$telefone_residencial,$senha,$confirmar,$idsexo,$idendereco,$pkNivel);
						//include_once("home.php");
						
					}

					elseif($acao=="logar"){
						include_once("Control/controladorPag.php");
						$Email=$_POST['email'];
						$senha=$_POST['senha'];
						$c = new controladorPag;
						$c->Login($Email,$senha);
					}

					elseif($acao=="sair"){
						$this->Loggout();
						include_once("home.php");
						echo \Metodos\PHPalert('Você Saiu');
					}

					elseif($acao == 'frete'){
						include_once("Control/carrinho.php");
				  		$cep = $_POST['cep'];
				  		$peso = 1;
				  		header('location: http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=59200000&sCepDestino='.$cep.'&nVlPeso='.$peso.'&nCdFormato=1&nVlComprimento=20&nVlAltura=5&nVlLargura=15&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=41106&nVlDiametro=0&StrRetorno=http://easycompre.esy.es/paginas.php?acao=telacar'); 
					}
						
					
					//so se estiver logado
					if($acao=='FinalizarCompra'){
						if ($this->isLogged()==true) {
							include_once("pedido.php");
							echo \Metodos\PHPalert('Venda Efetuada');
							include_once("index.php");
							$car=new Carrinho;
							$car->limparCarrinho();
						}
						else {
							echo \Metodos\PHPalert('Logue para poder comprar');
						}
					}

				    if($acao == 'telaProd'){
				    	include_once("Control/controladorProdutos.php");
				    	$ob = new controladorProdutos();
				    	$ob-> GerarTela($id);
					}

					if($acao=='add'){
						include_once("Control/carrinho.php");
			        	$ob = new Carrinho;
			        	$id=$_GET['id'];
			        	$ob->AdicionarProduto($id);
			        	$ob->TelaCarrinho();
					}

					if($acao=='rm'){
		     			include_once("Control/carrinho.php");
			        	$dog=new Carrinho;
			        	$id=$_GET['id'];
			         	$dog->RemoverProduto($id);
					 	$dog->TelaCarrinho();
						//include_once("paginas?acao=telacar");
			       }
				   if($acao=='alterar'){
				      	include_once("Control/carrinho.php");
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
					    	include_once("Control/carrinho.php");
							$_SESSION['carrinho'][$id] += 1;
							$dog->TelaCarrinho();
						}
					}

					elseif($acao=='telacar'){	
						include_once("Control/carrinho.php");
						$dog=new Carrinho;
						$dog->TelaCarrinho();
					}

			        elseif($acao=='telaCats'){
				    	include_once("Control/carrinho.php");
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
      			//	var_dump($_SESSION);
      			//	if($_SESSION['nivel']=="cliente"){echo "noiado";}
      			//	var_dump($this->isLogged());
					if($acao!="ADM"){
						include_once("home.php");	
					}
					echo \Metodos\PHPalert('Bem vindo '.$_SESSION['nome']);
      				break;
      			}
      		}
      		if($notLogged){
      			//echo \Metodos\PHPalert('usuario ou senha invalidos');
      			include_once("home.php");
      			echo \Metodos\PHPalert('usuario ou senha invalidos');
      		}
      	}

      	public function isLogged(){
			session_start();
			if($_SESSION["senha"]!=""){
				return true;	
			}
			else{
				return false;
			}
		}

		public function Loggout(){
			session_start();
			session_destroy();
		}
	}
?>
		
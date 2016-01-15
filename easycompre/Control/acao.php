<?php
	include_once ("controladorProdutos.php");
	include_once ("carrinho.php");
	include_once("lib.php");
	class acao{
		public function AbrePagina(){
					$acao=$_GET['acao'];

					if(isset($_GET['acao'])){
					$id=$_GET['id'];	
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
	}
?>
		
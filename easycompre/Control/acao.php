<?php
	include_once ("controladorProdutos.php");
	include_once ("carrinho.php");
	class acao{
		//$cat = new Carrinho;
		//private $dog = $cat;
		
		//$this->dog;
		
		//$dog = new Carrinho;
		public function Controle(){
		$acao=$_GET['acao'];
		if(isset($_GET['acao'])){
			$id=$_GET['id'];
        if($acao == 'telaProd'){
          $ob = new controladorProdutos();
          $ob-> GerarTela($id);
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
	//	}
		if($acao=='telaCar'){
			$dog=new Carrinho;
			//$dog->MudaQtd();
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
	
<?php
    include_once("DAOs/produtoDAO.php");
	class Carrinho{
	//session_start();
	//private $_SESSION['carrinho'];
		public function CriarCarrinho(){
			session_start();
			if(!isset($_SESSION['carrinho'])){
				$_SESSION['carrinho'] = array();
			}
		}
		public function AdicionarProduto($id){
			session_start();
			if(!isset($_SESSION['carrinho'][$id])){
				$_SESSION['carrinho'][$id]+=1;
			}
			else{
				$_SESSION['carrinho'][$id]+=1;
			}

		}
		public function RemoverProduto($id){
			session_start();
			if(isset($_SESSION['carrinho'][$id])){
				unset($_SESSION['carrinho'][$id]);
			}
		}
		public function CalcularSub($id,$qtd){
			$ob = new produtoDAO;
            $lin=$ob->ColsultaProduto($id);
			return number_format($lin['preco']*$qtd, 2, ',', '.');	
		}
		public function MudaQTD($id){
			
		}
		
		public function TelaCarrinho(){
			session_start();
                echo '<html>';
					echo '<head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <link href="css/carrinho.css" type="text/css" rel="stylesheet" />
                        <link href="css/style1.css" rel="stylesheet">
                        <title>Carrinho</title>
                        <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
                        
                        <script src ="js/jquery.js"></script>
                    </head>';
				
                '<body>';
                
			require_once("Pedacos/menu.php");
			//include_once ("Pedacos/cadastro.php");
			//include_once ("Pedacos/login.php");
			
                echo '<table class="carrinho">
                <caption>Carrinho de Compras</caption>
                <thead>

                    <tr>
                        <!-- <th width="244">Produto</th> -->
                        <!-- <th width="79">Quantidade</th> -->
                        <!-- <th width="89">Pre&ccedil;o</th> -->
                        <!-- <th width="100">SubTotal</th> -->
                        <!-- <th width="64">Remover</th> -->
                    </tr>
                </thead>
                        
                <tfoot>
                   
                        <td colspan="5">
                        <form action="index.php">
<br>
                            <button type="submit" class="btn btn-danger">Continuar Comprando</button>

                        </form>

                        </td>

                </tfoot>

                <tbody>';


                
                    //<?php
                    if(count($_SESSION['carrinho'])==0){
						echo "<br>";
                        echo "<p id='nada'>Não a produtos no carrinho</p>";
                        $total=0;
                    }
                    else{
                        $total=number_format(000, 2, ',', '.');
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                            $ob = new produtoDAO;
                            $ln=$ob->ColsultaProduto($id);
                            $nome=$ln['nome'];
                            $preco= number_format($ln['preco'], 2, ',', '.');
                            //$sub=number_format($ln['preco']*$qtd, 2, ',', '.');
                            $total += $ln['preco'] * $qtd;

                            echo '<tr>
                                 <td>'.$nome.'</td>
                                 <form>
                                 <td>
									<form action="?acao=alterar&id='.$id_produto.'" method="POST" id = "BotaoQTD">
										<!--<input type="submit" name="decremento" value="-">-->
<button type="submit" class="btn btn-primary operacao" id="soma">+</button>
  
										'.(double)$qtd.'							
										<!--<input type="submit" name="incremento" value="+">-->
<button type="submit" class="btn btn-success operacao" id="subtrai">-</button>
									</form>
                                 </td>
                                 <td>R$ '.$preco.'</td>
                                 <td>Subtotal R$ '.$this->CalcularSub($id,$qtd).'</td>
                                 <td><a href="?acao=rm&id='.$id.'" id="remove">Remove</a></td>
<br>
                              </tr>';
                        }
                        $total = number_format($total, 2, ',', '.');
                        
                    }
                    //$total = number_format($total, 2, ',', '.');
                    echo '<tr>
                            <td>Total : R$ '.$total.'</td>
							<td colspan=4>
								
							</td>
                          </tr>
                          <tr>
							
                          </tr>
                          <tr>
							<td> 
							<form id="frete">
							<br/>
								<label>CEP</label>
								<input type="text" name="f"/>
								<input type="submit" value="CalcularFrete" name="calculaFrete">
							</form>
							</td>
                          </tr>'
                          ;
                          
                    echo
                    '</tbody>
                    <!--</form>-->
                    
                    </table>
                    </body>
                    </html>';
		}
	}

	//submitCarrinho.php
	//limpar carrinho
	//fechar carrinho
	//calcular frete

?>
			

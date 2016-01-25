<?php
	include_once ("DAOs/produtoDAO.php");
	include_once("DAOs/subcategoriaDAO.php");
	include_once("DAOs/categoriaDAO.php");
	include_once("lib.php");
	include_once("Control/controladorPag.php");
	class controladorProdutos{
		public function Listador($objeto){
			while($li=$objeto){
				$res[] = $li;
			}
			return $res;
		}
		public function GerarLista(){
			//$ob = new produtoDAO;
			//$list= $ob -> ListarProdutosMaisBuscados();
			//$n = count($list);
			
			$ob = new produtoDAO;
			$m= $ob -> ListarProdutosMaisBuscados();
			$num = count($m);
					//$ob = new produtoDAO();
					//$m= $ob -> ListarProdutosMaisBuscados();
					//$n = count($m);
					echo '<ul id="screen">';
					//criando setinhas esquerda
					echo '<li>';
					echo '<a id="left" class="seta" href="#">&lt;&lt</a>';
					echo '</li>';
					echo '<li id="view">';
					echo '<ul id="images">';
					//lista que tem as imagens
					for($i=0;$i<$num;$i++){
							//$m[$i]['id_produto'];
							//abrindo a tela
							
							echo '<li>';
							echo '<div class="jq-ss-crop" style="overflow: hidden; height: 300px; width: 212.5px;">';
							echo '<a target="_blank" class="jq-ss-link">'; 
							echo '<p class="preco"> R$' . number_format($m[$i]['preco'], 2, ',', '.'). '</p>';
							echo '<img src="miniaturas/'.$m[$i]['id_produto'].'" class="imgMiniatura"/>';
							echo '<a class="nome" href="paginas.php?acao=telaProd&id='.$m[$i]['id_produto'].'&nome='.$m[$i]['nome'].'">' .$m[$i]['nome']. '</a>';
							echo '</a>';
							echo '</div>';
							echo '</li>';
						}
					//fechando a tela
					//setinhas lado direito

					echo '</ul>';
					echo '</li>';
					echo '<li>';
					echo '<a id="right" class="seta" href="#">&gt;&gt</a>';
					echo '</li>';
					echo '</ul>';
		}
		public function GerarTela($id){
			$ob = new produtoDAO();
			$k=$ob->ColsultaProduto($id);
			//echo '<title>'.´$k['nome'].'</title>';
			echo '<meta charset="utf-8">';
			echo '<head>';
			echo '<link rel="stylesheet" type="text/css" href="css/telaProd.css">';
            echo '<link href="css/style1.css" rel="stylesheet">';
			echo '<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">';
			echo '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>';
			echo '<script type="text/javascript" src="https://sites.google.com/site/seututorial/seututorial/smoothmenu.js"></script>';
			echo '<link rel="stylesheet" type="text/css" href="css/menuCategorias.css">';
			echo "<script type='text/javascript'>
    })
	</script>
	<script type='text/javascript'>
	    ddsmoothmenu.init({

	        mainmenuid: 'smoothmenu2',
	        //Menu DIV id
	        orientation: 'v',
	        //Horizontal ou vertical menu: 'h' ou 'v'
	        classname: 'ddsmoothmenu-v',
	        //class added to menu's outer DIV

	        //customtheme: ['#804000', '#482400'],
	        contentsource: 'markup' //'markup' or ['container_id', 'path_to_menu_file']
	    })
	</script>";
			echo '</head>';
			echo '<div id="telaProd">';
			include_once("Control/controladorCategorias.php");
			$cat = new controladorCat;
            $cat->insereMenu();
			echo '<img src="produtos/'.$k['id_produto'].'" id="imgProduto"/>';
			echo '<p id="nomeTela">' . $k['nome'] . '</p>';
			//include_once("Pedacos/menuCategorias.php");
			echo '<p id="precoTela"> R$' . number_format($k['preco'], 2, ',', '.') . '</p>';
			echo '<a class="a" id="compTela" href="paginas.php?acao=add&id='.$k['id_produto'].'">Comprar</a>';
			echo '<p id="descricao">' . $k['descricao'] . '</p>';
			echo '<div>';
			
		}
		public function GaleriaSubcat1(){
			echo '<h6 style="text-indent: 3cm; color: gray;font-size:14px; font-family: Verdana, Arial;">Subcategorias Mais Vendidas</h6>';
			echo '<ul id="screen">';
			echo '<li id="viewS">';
			echo '<ul id="imagesS">';
			$ob0 = new subcategoriaDAO;
			$ob1 = new produtoDAO;
			$m= $ob0 -> ListarSubcategoriaMaisVendida();
			$num = count($m);
			for($i=0;$i<$num;$i++){
				//$ids[]=$m[$i][0];
				//$nomes[]=$m[$i][1];
                $prod[$m[$i][0]]=$m[$i][1];
			}
			foreach ($prod as $id=>$nome){
echo '<div class="subcategoriaMaisVendida">';			
echo '<h5 style="clear:both;text-indent: 3cm; color: red;font-size:16px; font-family: Verdana, Arial;">'.$nome.'</h5>';
				//$n=$ob1->ListaProdutoSub($id);
				$num1=count($n);
				for($i=0;$i<$num1;$i++){
					echo '<li id="'.$i.'">';
					echo '<div class="jq-ss-crop" style="overflow: hidden; height: 340px; width: 212.5px;">';
					echo '<a target="_blank" class="jq-ss-link">'; 

						echo '<br>';
						echo '<p class="preco"> R$' . number_format($n[$i]['preco'], 2, ',', '.'). '</p>';
						echo '<br>';
						echo '<img src="miniaturas/'.$n[$i]['id_produto'].'" class="imgMiniatura"/>';
						echo '<br>';
						//echo $n[$i]['nome'];
						echo '<a class="nome" href="paginas.php?acao=telaProd&id='.$n[$i]['id_produto'].'&nome='.$n[$i]['nome'].'">' .$n[$i]['nome']. '</a>';
					echo '</div>';
					echo '</li>';
					echo '</li>';
				}
			echo '</div>';
			}
			echo '</ul>';
			echo '</li>';
			echo '</ul>';
			
		}

		public function GaleriaSubcat2(){
			echo '<h6 id="titulos">Subcategorias Mais Buscadas</h6>';
			echo '<ul id="screen">';
			echo '<li id="viewS">';
			echo '<ul id="imagesS">';
			$ob0 = new subcategoriaDAO;
			$ob1 = new produtoDAO;
			$m= $ob0 -> ListarSubcategoriaMaisBuscada();
			$num = count($m);
			for($i=0;$i<$num;$i++){
				//$ids[]=$m[$i][0];
				//$nomes[]=$m[$i][1];
                $prod[$m[$i][0]]=$m[$i][1];
			}
			foreach ($prod as $id=>$nome){
				echo '<h5 style="clear:both;">'.$nome.'</h5>';
				$n=$ob1->ListaProdutoSub($id);
				$num1=count($n);
				for($i=0;$i<$num1;$i++){
					echo '<li id="'.$i.'">';
					echo '<div class="jq-ss-crop" style="overflow: hidden; height: 300px; width: 212.5px;">';
					echo '<a target="_blank" class="jq-ss-link">'; 

						echo '<br>';
						echo '<p class="preco"> R$' . number_format($n[$i]['preco'], 2, ',', '.'). '</p>';
						echo '<br>';
						echo '<img src="miniaturas/'.$n[$i]['id_produto'].'" class="imgMiniatura"/>';
						echo '<br>';
						echo $n[$i]['nome'];
					echo '</div>';
					echo '</li>';
					echo '</li>';
				}
			
			}
			echo '</ul>';
			echo '</li>';
			echo '</ul>';
			
		}
		public function galeriaCat1(){
			$cat = new categoriaDAO;
			$cat->ListarCategoriaMaisBuscada();
			print_r($cat->ListarCategoriaMaisVendida());
		}

		

		public function menuCategorias(){

		}
	}
?>

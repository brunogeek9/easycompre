<?php
	session_start();
?>
<?php
	include_once("Pedacos/cadastro.php");
	include_once("Control/controladorCategorias.php");
	include_once("Pedacos/login.php");
	$cat = new controladorCat;
	$cat->insereMenu();		
?>	
 		<div id="loja">
			<div id="propagandas">
				<h6 id="titulos">Produtos Mais Vendidos</h6>
				<br/>
				<?php
					require_once("wowslider/index.php");
				?>
			</div>
			<div id="produtos">
			<fieldset>
				<br>
				<h6 id="titulos">Produtos Mais Buscados</h6>
				<?php
					include ("Control/controladorProdutos.php");
					$ob = new controladorProdutos;
					$ob->GerarLista();	
								
				?>

				<?php
					include ("Control/carrinho.php");
					$cat=new Carrinho;
					$cat->CriarCarrinho();
				?>
			</fieldset>
			</div>
			<div id="departamentos">
			<fieldset>
				<?php
					//$ob = new controladorProdutos;
					$ob->GaleriaSubcat1();
					//$ob->GaleriaSubcat2();
					//$ob1=new controladorProdutos();
					print_r($ob->galeriaSubcat1());
				?>	
					
			</fieldset>
			</div>
			<div id="sobre">
				<fieldset>
					<p align="center">A EasyCompre foi desenvolvida para você Cliente economizar tempo e dinheiro, tornado-se a sua loja online..</p>
			</fieldset>
			</div>
			<br>
			
		</div>
		
		<?php
			require_once("Pedacos/rodape.php");
		?>

		<foot>
			<script type="text/javascript">

				//borrowed from jQuery easing plugin
				//http://gsgd.co.uk/sandbox/jquery.easing.php
				$.easing.backout = function(x, t, b, c, d){
					var s=1.70158;
					return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
				};
				
				$('#screen').scrollShow({
					view:'#view',
					content:'#images',
					easing:'backout',
					wrappers:'link,crop',
					navigators:'a[id]',
					navigationMode:'sr',
					circular:true,
					start:0
				});

			</script>
		</foot>
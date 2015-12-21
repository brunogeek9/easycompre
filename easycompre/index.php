<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width">
			<title>easyCompre</title>
			<link rel="stylesheet" type="text/css" href="css/cadastro.css">
			<link rel="stylesheet" type="text/css" href="css/login.css">

			<meta charset="utf-8">
			<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css' />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

			<!--<link rel="stylesheet" type="text/css" href="estilo.css">-->

			<meta name = "viewport" contens="width=device-width, initial-scale = 1.0">
				<!-- Bootstrap -->
				<link href ="css/bootstrap.min.css" rel="stylesheet">
				<link href="css/style1.css" rel="stylesheet">

				<script src ="js/jquery.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script src="js/exibir.js"></script>
				<link href='css/base.css' type='text/css' rel='stylesheet' />
				<link href='css/produtos.css' type='text/css' rel='stylesheet' />
				<link href='css/galeriaSubcat.css' type='text/css' rel='stylesheet' />
				<script type='text/javascript' src='js/jquery.scrollTo-min.js'></script>
				<script type='text/javascript' src='js/jquery.scrollShow-min.js'></script>
				<?php
					
				?>
	</head>
 <body>
		<?php
			require_once("Pedacos/menu.php");
			include_once("Pedacos/cadastro.php");
			include_once("Pedacos/login.php");
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
					$ob = new controladorProdutos;
					$ob->GaleriaSubcat1();
					$ob->GaleriaSubcat2();
					$ob1=new controladorProdutos();
					print_r($ob1->galeriaCat1());
				?>	
					
			</fieldset>
			</div>
			<div id="sobre">
				<fieldset>
					
				
					<p align="center">A sua loja de compras online ...</p>
					
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
	</body>
</html>

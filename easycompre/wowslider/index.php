<!DOCTYPE html>
<html>
<head>
	<title>Wowslider</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Made with WOW Slider - Create beautiful, responsive image sliders in a few clicks. Awesome skins and animations. Wowslider" />
	
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="wowslider/engine1/style.css" />
	<script type="text/javascript" src="wowslider/engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

</head>
<body style="background-color:white;margin:auto">
	
	<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
		<?php
			//listando os produtos mais vendidos
			include_once ("DAOs/produtoDAO.php");
			$ob = new produtoDAO;
			$m= $ob -> ListarProdutosMaisVendidos();
			$num = count($m);
			for($i=0;$i<$num;$i++){
				$preco= '<p class="preco"> R$' . number_format($m[$i]['preco'], 2, ',', '.'). '</p>';
				
				echo '<li id="imgPrincipal">';
				echo '<a href="paginas.php?acao=telaProd&id='.$m[$i]['id_produto'].'&nome='.$m[$i]['nome'].'"">';
				echo '<img src="principal/'.$m[$i]['id_produto'].'" alt="tn_10" title="R$' . number_format($m[$i]['preco'], 2, ',', '.').'<br>'.$m[$i]['nome'].'" id="wows1_'.$i.'" class="imgPrincipal"/>';
				echo '</a>';
				echo '</li>';
				
			}
		?>
		<!--
		<li><img src="wowslider/data1/images/tn_1.jpg" alt="tn_1" title="tn_1" id="wows1_0"/></li>
		<li><img src="wowslider/data1/images/tn_10.jpg" alt="tn_10" title="tn_10" id="wows1_1"/></li>
		<li><img src="wowslider/data1/images/tn_11.jpg" alt="tn_11" title="tn_11" id="wows1_2"/></li>
		<li><a href="http://wowslider.com"><img src="wowslider/data1/images/tn_12.jpg" alt="responsive slider" title="tn_12" id="wows1_3"/></a></li>
		<li><img src="wowslider/data1/images/tn_13.jpg" alt="tn_13" title="tn_13" id="wows1_4"/></li>
		-->
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="tn_1"><span><img src="wowslider/data1/tooltips/tn_1.jpg" alt="tn_1"/>1</span></a>
		<a href="#" title="tn_10"><span><img src="wowslider/data1/tooltips/tn_10.jpg" alt="tn_10"/>2</span></a>
		<a href="#" title="tn_11"><span><img src="wowslider/data1/tooltips/tn_11.jpg" alt="tn_11"/>3</span></a>
		<a href="#" title="tn_12"><span><img src="wowslider/data1/tooltips/tn_12.jpg" alt="tn_12"/>4</span></a>
		<a href="#" title="tn_13"><span><img src="wowslider/data1/tooltips/tn_13.jpg" alt="tn_13"/>5</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">wowslider</a> by WOWSlider.com v8.6</div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="wowslider/engine1/wowslider.js"></script>
	<script type="text/javascript" src="wowslider/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->

</body>
</html>

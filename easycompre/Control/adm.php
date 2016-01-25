<?php
	include_once("lib.php");
	include_once("DAOs/pedidoDAO.php");
	include_once("DAOs/clienteDAO.php");
	include_once("controladorSubmit.php");
	class adm{

		public function telaADM(){
			session_start();
			echo '<!DOCTYPE html>
			<html lang="en">
			<head>
			  <title>Administrador</title>
			  <meta charset="utf-8">
			  <link rel="stylesheet" type="text/css" href="css/adm.css">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
			  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
			</head>
			<body>

			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="index.php">Easycompre</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a id="homeADM" href="?acao=adm">Home</a></li>
			      <li><a id="pedidos" href="index.php?acao=gerenciarPedidos">Gerenciar Pedidos</a></li>
			      <li><a id="nivel" href="index.php?acao=gerenciarNiveis">Gerenciar Clientes</a></li>
			      <!-- index.php?acao=gerenciarNiveis -->
			      <li><a id="" href="#">Gerenciar Produtos</a></li>
			    </ul>
			  </div>
			</nav>
				
			</body>
			</html>';
		}

		public function gerenciarPedidos(){
			session_start();
			echo '<html>
			<head>
				<title>Administrador</title>
				<meta charset="UTF-8">
				<link rel="stylesheet" type="text/css" href="css/adm.css">
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
			  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
			  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
			  	<meta name="viewport" content="width=device-width, initial-scale=1">
  				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  				<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
			</head>';
			echo '
			<body>
			<h2 align="right">Bem-Vindo, Administrador(a)!</h2>
			<table>
				<tr>
					<td><b>CPF:</b></td>
					<td><b>Status de Pedido:</b></td>
					<td><b>Status de Pagamento:</b></td>
					<td><b>Previsão de Entrega:</b></td>
					<td><b>Frete de Pedido:</b></td>
					<td><b>Data de Pedido:</b></td>
					<td><b>Data de Pagamento:</b></td>
				</tr>';

				
				$pedido = new pedidoDAO;
				$lista=$pedido->listarPedidos();
				$num= count($lista);
				for ($i=0; $i < $num; $i++) { 
					//echo $lista[$i]['cpf'].'<br>';
					echo '<tr>';
						echo '<td>'.$lista[$i]['cpf'].'</td>';
						echo '<td>'.$lista[$i]['status_pedido'].'<br/><a href="index.php?acao=atualizarPedido&status='.$lista[$i]['status_pedido'].'&idpedido='.$lista[$i]['id_pedido'].'" class="myButton">'.$this->statusPedido($lista[$i]['status_pedido']).'</a></td>';
						echo '<td>'.$lista[$i]['status_pagamento'].'<br/><a href="index.php?acao=atualizarPagamento&status='.$lista[$i]['status_pagamento'].'&idpedido='.$lista[$i]['id_pedido'].'"
						 class="myButton">'.$this->statusPagamento($lista[$i]['status_pagamento']).'</a></td>';
						 //<a href="paginas.php?acao=atualizarPagamento&status='.$lista[$i]['status_pagamento'].'"" class="myButton"> Não Pago</a></td>';
						echo '<td>'.\Metodos\retornarData($lista[$i]['previsao_entrega']).'</td>';
						echo '<td>'.$lista[$i]['frete_pedido'].'</td>';
						echo '<td>'.\Metodos\retornarData($lista[$i]['data_pedido']).'</td>';
						echo '<td>'.\Metodos\retornarData($lista[$i]['data_pagamento']).'</td>';
					echo '</tr>';
				}
				
			echo '</table>
			</body>
			</html>';

		}
		public function statusPagamento($status){
			switch ($status) {
		    case "Pago":
		        return "Não Pago";
		        break;
		    case "Não Pago":
		        return "Pago";
		        break;
			}
		}

		public function statusPedido($status){
			session_start();
			switch ($status) {
		    case "Aguardando Pagamento":
		        return "Pagamento Realizado";
		        break;
		    case "Pagamento Realizado":
				return "Enviado a Transportadora";
				break;
		    case "Enviado a Transportadora":
		        return "Entregue";
		        break;
			
			case "Entregue":
				return "Enviado a Transportadora";
				break;

			}
		}

		public function atualizarPagamento($status,$idpedido){
			session_start();
			$pedido = new pedidoDAO;
			echo $status;
			switch ($status) {
		    case "Pago":
		        $pedido->atualizarPagamento("Não Pago",$idpedido);
		        //include_once("index.php?acao=gerenciarPedidos");
		        break;
		    case "Não Pago":
		        $pedido->atualizarPagamento("Pago",$idpedido);

		        break;
		   
		    default:
		    	echo "nofing";
			}
		}
		public function atualizarPedido($status,$idpedido){
			session_start();
			$pedido = new pedidoDAO;
			echo $status;
			switch ($status) {
		    case "Aguardando Pagamento":
		        $pedido->atualizarPedido("Pagamento Realizado",$idpedido);
		        break;
		    case "Pagamento Realizado":
		        $pedido->atualizarPedido("Enviado a Transportadora",$idpedido);
		        break;
		    case "Enviado a Transportadora":
		    	$pedido->atualizarPedido("Entregue",$idpedido);
		    	break;
		    default:
		    	echo "nofing";
			}
		}

		public function gerenciarNiveis(){
			session_start();
			echo '<div id="telaNivel">';
			echo '<h3>'.$_SESSION['nome']." deixe outro usuario Administrador o sistema,caso queira,basta informar seu Respectivo email".'<h3>';
			echo '<form action="index.php?acao=alterarNivel" method="POST">
					<input type="text" name="emailNivel">
					<input type="submit" name="envNivel">
				</form>';
			echo '<div>';
		}

		public function linhaEmail($e){
			session_start();
			$cli = new clienteDAO;
			$linha=$cli->consultaCliente();
			echo '<!DOCTYPE html>
			<html lang="en">
			<head>
			  <title>Nivel Clientes</title>
			  <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
			  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
			</head>
			<body>

			<div class="container">           
			  <table border="0" class="table table-striped">';
			      $num= count($linha);
				for ($i=0; $i < $num; $i++) {
				if($linha[$i]['email']==$e){ 
				    echo  '<tr>';
				        echo '<td>'.$linha[$i]['cpf'].'</td>';
				        echo '<td>'.\Metodos\retornarData($linha[$i]['data_nascimento']).'</td>';
				        echo '<td>'.$linha[$i]['email'].'</td>';
				        echo '<td>'.$linha[$i]['nome'].'</td>';
				        echo '<td>'.$linha[$i]['telefone_celular'].'</td>';
				        echo '<td>'.$linha[$i]['senha'].'</td>';
				        echo '<td rowspan="2">';
				        echo '<form action="index.php?acao=alterarNivel&enviar=linhaEmail&email='.$linha[$i]['email'].'" method="POST">';
					        
					        echo '<select size="1" name="nivel">
									<option selected value="">Nivel</option>
									<option value="1">1</option>
									<option value="2">2</option>
								</select>';
							
								echo '<input type="submit" name="Alterar"/>';
						echo '</form>';
				        echo '</td>';
				    echo '</tr>';
			    	}
				}
			  echo '</table>
			</div>

			</body>
			</html>';

		}


	}
?>
<?php
    session_start();
	$db_host="mysql.hostinger.com.br";
	$db_name="u232397571_easy";
	$db_user="u232397571_tedi";
	$db_senha="doritos";
	$dog = new PDO("mysql:host=$db_host;dbname=$db_name;
	charset=utf8",$db_user,$db_senha);
	$dog->beginTransaction();

	//$cod_referencia="14-14";
	$data_pagamento=date('Y-m-d');
	$data_pedido = date('Y-m-d');
	$frete_pedido = 12.5;//$_POST['frete'];
	$previsao_entrega;//date('Y-m-d');
	$status_pagamento = 'Aguardando Pagamento';
	$status_pedido = 'Pedido Realizado';
	$cpf = '01755644428';//$_SESSION['cpf'];
	//teste PDO
	$dog->exec("insert into pedido (data_pagamento,data_pedido,frete_pedido,previsao_entrega,status_pagamento,status_pedido,cpf) 
	values ('$data_pagamento','$data_pedido',$frete_pedido,'$previsao_entrega','$status_pagamento','$status_pedido','$cpf')");
	$ultimoID=$dog->lastInsertId(); 	
	foreach ($_SESSION['carrinho'] as $id=>$qtd) {
		
		$consulta=$dog->prepare("select preco from produto where id_produto=$id");
		$consulta->execute();
		$linha=$consulta->fetch();
		$preco_unit=$linha[0];
		
		$dog->exec("insert into pedido_produto (id_pedido,id_produto,preco_unit,quantidade) 
		values ($ultimoID,$id,$preco_unit,$qtd)");
		$dog->exec("update produto set unidades=unidades-$qtd where id_produto=$id");
		$consulta1 = $dog->prepare("select unidades from produto where id_produto = $id");
		$consulta1->execute();
		$linha1=$consulta1->fetch();
		echo $linha1[0].'<br/>';
		$numero=$linha1[0];
		if($numero<0){
			echo "numero de produtos insuficiente";
			$dog->rollBack ();
			die("aaaaaa");
		}
	}
	
	//$cop=$dog->commit();
	

	if($cop){
		echo "venda efetuada com sucesso";
	}


	//consultar se quantidade ficou negativa
?>
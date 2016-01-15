<?php
    session_start();
	$db_host="mysql.hostinger.com.br";
	$db_name="u232397571_easy";
	$db_user="u232397571_tedi";
	$db_senha="doritos";
	$dog = new PDO("mysql:host=$db_host;dbname=$db_name;
	charset=utf8",$db_user,$db_senha);
	$dog->beginTransaction();
	$data_pedido = date('Y-m-d');
	$frete_pedido = $_POST['frete'];
	$previsao_entrega="";
	$data_pagamento="";
	$status_pagamento = 'Aguardando Pagamento';
	$status_pedido = 'Pedido Realizado';
	$cpf = $_SESSION['cpf'];

	$dog->exec("insert into pedido (data_pagamento,data_pedido,frete_pedido,previsao_entrega,status_pagamento,status_pedido,cpf) 
	values ('$data_pagamento','$data_pedido',$frete_pedido,$previsao_entrega,'$status_pagamento','$status_pedido','$cpf')");
	foreach ($_SESSION['carrinho'] as $id=>$qtd) {
		$ultimo = $dog->insert_id;
		$consulta=$dog->prepare("select preco from produto where id_produto=$id");
		$consulta->execute();
		$linha=$consulta->fetch();
		$preco_unit=$linha[0];
		$dog->exec("insert into pedido_produto (id_pedido,id_produto,preco_unit,quantidade) 
	values ($ultimo,$id,$preco_unit,$qtd)");
		$dog->exec("update produto set unidades=unidades-$qtd where id=$id");
		$consulta1 = $dog->prepare ( "select unidades from produto 
	where id = $id" );
		$linha1=$consulta1->fetch();
		if($linha1[0]<0){
			$dog->rollBack ();
			exit();
		}
		
		
	}
$cop=$dog->commit();
if($cop){
			echo "venda efetuada com sucesso";
		}


	//consultar se quantidade ficou negativa
	
?>
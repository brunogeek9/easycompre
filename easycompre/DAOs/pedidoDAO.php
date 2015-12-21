<?php

require_once 'pedido_BEAN.php';

class pedido_DAO extends conexao
{
	//acho que esse metodo vai mudar sua funcionalidade
	public function incluir_pedido_produto($objeto)
	{
		$id_pedido = $objeto->get_id_pedido();
		$id_produto = $objeto->get_id_produto();
		$preco_unit = $objeto->get_preco_unit();
		$quantidade = $objeto->get_quantidade();
		
		$query = mysql_query(
			"INSERT INTO `pedido_produto`
			(`id_pedido`,
			`id_produto`,
			`preco_unit`,
			`quantidade`)
			VALUES
			('$id_pedido',
			'$id_produto',
			'$preco_unit',
			'$quantidade');"
		);

		if ($query) { return true; }
	}

	public function alterar_cod_referencia($objeto)
	{
		$id_pedido = $objeto->get_id_pedido();
		$cod_referencia = $objeto->get_cod_referencia();
		$cpf = $objeto->get_cpf();

		$query = mysql_query(
			"UPDATE `pedido` SET
			`cod_referencia` = '$cod_referencia'
			WHERE `id_pedido` = '$id_pedido'
			AND `cpf` = '$cpf';"
		);

		if ($query) { return true; }
	}

	public function incluir_pedido($objeto)
	{
		$data_pedido = $objeto->get_data_pedido();
		$frete_pedido = $objeto->get_frete_pedido();
		$status_pagamento = $objeto->get_status_pagamento();
		$status_pedido = $objeto->get_status_pedido();
		$cpf = $objeto->get_cpf();

		$query = mysql_query(
			"INSERT INTO `pedido`
			(`cod_entrega`,
			`cod_referencia`,
			`data_pagamento`,
			`data_pedido`,
			`frete_pedido`,
			`previsao_entrega`,
			`status_pagamento`,
			`status_pedido`,
			`cpf`)
			VALUES
			(null,
			'',
			null,
			'$data_pedido',
			'$frete_pedido',
			null,
			'$status_pagamento',
			'$status_pedido',
			'$cpf');"
		);

		if ($query) { return true; }
	}
	
}

?>

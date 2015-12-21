<?php

require_once 'endereco_BEAN.php';

class endereco_DAO extends conexao{
	
	public function alterar_endereco($objeto)
	{
		$id_endereco = $objeto->get_id_endereco();
		$bairro = $objeto->get_bairro();
		$cep = $objeto->get_cep();
		$cidade = $objeto->get_cidade();
		$complemento = $objeto->get_complemento();
		$estado = $objeto->get_estado();
		$logradouro = $objeto->get_logradouro();
		$numero = $objeto->get_numero();
		$titulo = $objeto->get_titulo();
		$cpf = $objeto->get_cpf();

		$query = mysql_query(
			"UPDATE `endereco` SET
			`bairro` = '$bairro',
			`cep` = '$cep',
			`cidade` = '$cidade',
			`complemento` = '$complemento',
			`estado` = '$estado',
			`logradouro` = '$logradouro',
			`numero` = '$numero',
			`titulo` = '$titulo'
			WHERE `id_endereco` = '$id_endereco'
			AND `cpf` = '$cpf';"
		);

		if ($query) { return true; }
	}

	public function excluir_endereco($objeto)
	{
		$id_endereco = $objeto->get_id_endereco();
		$cpf = $objeto->get_cpf();

		$query = mysql_query(
			"DELETE FROM `endereco`
			WHERE `id_endereco` = '$id_endereco'
			AND `cpf` = '$cpf';"
		);

		if ($query) { return true; }
	}

	public function incluir_endereco($objeto)
	{
		$bairro = $objeto->get_bairro();
		$cep = $objeto->get_cep();
		$cidade = $objeto->get_cidade();
		$complemento = $objeto->get_complemento();
		$estado = $objeto->get_estado();
		$logradouro = $objeto->get_logradouro();
		$numero = $objeto->get_numero();
		$titulo = $objeto->get_titulo();
		$cpf = $objeto->get_cpf();
		
		$query = mysql_query(
			"INSERT INTO `endereco`
			(`bairro`,
			`cep`,
			`cidade`,
			`complemento`,
			`estado`,
			`logradouro`,
			`numero`,
			`titulo`,
			`cpf`)
			VALUES
			('$bairro',
			'$cep',
			'$cidade',
			'$complemento',
			'$estado',
			'$logradouro',
			'$numero',
			'$titulo',
			'$cpf');"
		);

		if ($query) { return true; }
	}
}

?>

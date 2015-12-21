<?php

require_once 'clienteBEAN.php';

class clienteDAO extends conexao
{
	public function consulta_cliente($objeto){
		$cpf = $objeto->get_cpf();
		$data_nascimento = $objeto->get_data_nascimento();
		$nome_cliente = $objeto->get_nome_cliente();
		$telefone_celular = $objeto->get_telefone_celular();
		$telefone_residencial = $objeto->get_telefone_residencial();
		$id_sexo = $objeto->get_id_sexo();
		return mysql_query(
			" select * from cliente where email='$email' and senha='$senha' "
		);

	}
	public function alterar_dados($objeto)
	{
		$cpf = $objeto->get_cpf();
		$data_nascimento = $objeto->get_data_nascimento();
		$nome_cliente = $objeto->get_nome_cliente();
		$telefone_celular = $objeto->get_telefone_celular();
		$telefone_residencial = $objeto->get_telefone_residencial();
		$id_sexo = $objeto->get_id_sexo();

		$query = mysql_query(
			"UPDATE `cliente`
			SET
			`data_nascimento` = '$data_nascimento',
			`nome_cliente` = '$nome_cliente',
			`telefone_celular` = '$telefone_celular',
			`telefone_residencial` = '$telefone_residencial',
			`id_sexo` = '$id_sexo'
			WHERE `cpf` = '$cpf';"
		);

		if ($query) { return true; }
	}

	public function alterar_email($objeto)
	{
		$cpf = $objeto->get_cpf();
		$email = $objeto->get_email();
		
		$query = mysql_query(
			"UPDATE `cliente`
			SET `email` = '$email'
			WHERE `cpf` = '$cpf';"
		);

		if ($query) { return true; }
	}

	public function alterar_senha($objeto)
	{
		$cpf = $objeto->get_cpf();
		$senha = $objeto->get_senha();
		
		$query = mysql_query(
			"UPDATE `cliente`
			SET `senha` = '$senha'
			WHERE `cpf` = '$cpf';"
		);

		if ($query) { return true; }
	}

	public function incluir_cliente($objeto)
	{
		$cpf = $objeto->get_cpf();
		$data_nascimento = $objeto->get_data_nascimento();
		$email = $objeto->get_email();
		$nome_cliente = $objeto->get_nome_cliente();
		$telefone_celular = $objeto->get_telefone_celular();
		$telefone_residencial = $objeto->get_telefone_residencial();
		$senha = $objeto->get_senha();
		$id_sexo = $objeto->get_id_sexo();
		
		$query = mysql_query(
			"INSERT INTO `cliente`
			(`cpf`,
			`data_nascimento`,
			`email`,
			`nome_cliente`,
			`telefone_celular`,
			`telefone_residencial`,
			`senha`,
			`id_sexo`)
			VALUES
			('$cpf',
			'$data_nascimento',
			'$email',
			'$nome_cliente',
			'$telefone_celular',
			'$telefone_residencial',
			'$senha',
			'$id_sexo');"
		);

		if ($query) { return true; }
	}
}

?>

<?php
//include_once("../beans/clienteBEAN.php");
include_once("conexao.php");
class clienteDAO extends conexao{
/*	public function alterar_dados($objeto)
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

	*/
	public function inserirCliente($cpf,$data_nascimento,$email,$nome,$telefone_celular,$telefone_residencial,$senha,$idsexo,$idendereco,$pkNivel){
		$sql = "insert into cliente (cpf,data_nascimento,email,nome,telefone_celular,telefone_residencial,senha,id_sexo,id_endereco) 
		      values ('$cpf','$data_nascimento','$email','$nome_cliente','$telefone_celular','$telefone_residencial','$senha')";
	    //$this->con->query($sql);
		      
	    $sql1="INSERT INTO cliente(cpf, data_nascimento, email, nome, telefone_celular, telefone_residencial, senha, id_sexo, id_endereco,id_nivel) 
	    VALUES ('$cpf','$data_nascimento','$email','$nome','$telefone_celular','$telefone_residencial','$senha',$idsexo,$idendereco,$pkNivel)";
		$this->con->query($sql1);
	}
	public function consultaCliente(){
		$lista = $this->con->query(
				"SELECT * FROM cliente"
			);
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;
	}
	public function inserirNivel($nome){
		$sql="INSERT INTO nivel(nome) VALUES ('$nome')";
		$this->con->query($sql);
	}

	public function consultaNivel($cpf){
		$lista = $this->con->query(
				"SELECT nivel.nome FROM nivel,cliente WHERE cliente.id_nivel = nivel.id AND cliente.cpf = '$cpf'"
			);
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;
		
	}

}

?>

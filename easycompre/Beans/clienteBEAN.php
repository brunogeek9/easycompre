<?php
	
class cliente
{
	private $cpf;
	private $dataNascimento;
	private $email;
	private $nome;
	private $telefoneCelular;
	private $telefoneResidencial;
	private $senha;
	private $idSexo;

	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}

	public function getCpf()
	{
		return $this->cpf;
	}

	public function setDataNascimento($dataNascimento)
	{
		$this->dataNascimento = $dataNascimento;
	}

	public function getDataNascimento()
	{
		return $this->dataNascimento;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setNome($cliente)
	{
		$this->cliente = $cliente;
	}

	public function getNome()
	{
		return $this->cliente;
	}

	public function setTelefoneCelular($telefoneCelular)
	{
		$this->telefoneCelular = $telefoneCelular;
	}

	public function getTelefoneCelular()
	{
		return $this->telefoneCelular;
	}

	public function setTelefoneResidencial($telefone_residencial)
	{
		$this->telefoneResidencial = $telefoneResidencial;
	}

	public function getTelefoneResidencial()
	{
		return $this->telefoneResidencial;
	}

	public function setSenha($senha)
	{
		$this->senha = $senha;
	}

	public function getSenha()
	{
		return $this->senha;
	}

	public function setIdSexo($id_sexo)
	{
		$this->idSexo = $idSexo;
	}

	public function getIdSexo()
	{
		return $this->idSexo;
	}
}

?>

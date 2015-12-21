<?php

class endereco
{
	private $idEndereco;
	private $bairro;
	private $cep;
	private $cidade;
	private $complemento;
	private $estado;
	private $logradouro;
	private $numero;
	private $titulo;
	private $cpf;

	public function setIdEndereco($id_endereco)
	{
		$this->idEndereco = $idEndereco;
	}

	public function getIdEndereco()
	{
		return $this->idEndereco;
	}

	public function setBairro($bairro)
	{
		$this->bairro = $bairro;
	}

	public function getBairro()
	{
		return $this->bairro;
	}

	public function setCep($cep)
	{
		$this->cep = $cep;
	}

	public function getCep()
	{
		return $this->cep;
	}

	public function setCidade($cidade)
	{
		$this->cidade = $cidade;
	}

	public function getCidade()
	{
		return $this->cidade;
	}

	public function setComplemento($complemento)
	{
		$this->complemento = $complemento;
	}

	public function getComplemento()
	{
		return $this->complemento;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function setLogradouro($logradouro)
	{
		$this->logradouro = $logradouro;
	}

	public function getLogradouro()
	{
		return $this->logradouro;
	}

	public function setNumero($numero)
	{
		$this->numero = $numero;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function setTitulo($titulo)
	{
		$this->titulo = $titulo;
	}

	public function getTitulo()
	{
		return $this->titulo;
	}

	public function setCPF($cpf)
	{
		$this->cpf = $cpf;
	}

	public function getCPF()
	{
		return $this->cpf;
	}
}

?>

<?php
	
class cliente{
	private $cpf;
	private $dataNascimento;
	private $email;
	private $nome;
	private $telefoneCelular;
	private $telefoneResidencial;
	private $senha;
	private $idSexo;
	private $sexo;

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo=$sexo;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setDataNascimento($dataNascimento){
		$this->dataNascimento = $dataNascimento;
	}

	public function getDataNascimento(){
		return $this->dataNascimento;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setTelefoneCelular($telefoneCelular){
		$this->telefoneCelular = $telefoneCelular;
	}

	public function getTelefoneCelular(){
		return $this->telefoneCelular;
	}

	public function setTelefoneResidencial($telefone_residencial){
		$this->telefoneResidencial = $telefoneResidencial;
	}

	public function getTelefoneResidencial(){
		return $this->telefoneResidencial;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setIdSexo($id_sexo){
		$this->idSexo = $idSexo;
	}

	public function getIdSexo(){
		return $this->idSexo;
	}
}

?>

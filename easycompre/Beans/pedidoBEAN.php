<?php

class pedido
{
	private $idPedido;
	private $codEntrega;
	private $codReferencia;
	private $dataPagamento;
	private $dataPedido;
	private $fretePedido;
	private $previsaoEntrega;
	private $statusPagamento;
	private $statusPedido;
	private $cpf;

	public function setidPedido($idPedido)
	{
		$this->idPedido = $idPedido;
	}

	public function getidPedido()
	{
		return $this->idPedido;
	}

	public function setCodEntrega($codEntrega)
	{
		$this->codEntrega = $codEntrega;
	}

	public function getCodEntrega()
	{
		return $this->codEntrega;
	}

	public function setCodReferencia($codReferencia)
	{
		$this->codReferencia = $codReferencia;
	}

	public function getCodReferencia()
	{
		return $this->codReferencia;
	}

	public function setDataPagamento($dataPagamento)
	{
		$this->dataPagamento = $dataPagamento;
	}

	public function getDataPagamento()
	{
		return $this->dataPagamento;
	}

	public function setDataPedido($dataPedido)
	{
		$this->dataPedido = $dataPedido;
	}

	public function getDataPedido()
	{
		return $this->dataPedido;
	}

	public function setFretePedido($fretePedido)
	{
		$this->fretePedido = $fretePedido;
	}

	public function getFretePedido()
	{
		return $this->fretePedido;
	}

	public function setPrevisaoEntrega($previsaoEntrega)
	{
		$this->previsaoEntrega = $previsaoEntrega;
	}

	public function getPrevisaoEntrega()
	{
		return $this->previsaoEntrega;
	}

	public function setStatusPagamento($statusPagamento)
	{
		$this->statusPagamento = $statusPagamento;
	}

	public function getStatusPagamento()
	{
		return $this->statusPagamento;
	}

	public function setStatusPedido($statusPedido)
	{
		$this->statusPedido = $statusPedido;
	}

	public function getStatusPedido()
	{
		return $this->statusPedido;
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

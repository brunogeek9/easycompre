<?php
include_once("conexao.php");
class pedidoDAO extends conexao{
	public function listarPedidos(){
		$lista = $this->con->query(
				"SELECT * FROM pedido"
			);
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;
	}
	public function atualizarPagamento($status,$idpedido){
		$this->con->query("UPDATE pedido SET status_pagamento='$status' where id_pedido=$idpedido");
	}

	public function atualizarPedido($status,$idpedido){
		$this->con->query("UPDATE pedido SET status_pedido='$status' where id_pedido=$idpedido");
	}
	
}

?>

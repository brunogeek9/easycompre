<?php
	class produto{
		private $idProduto;
		private $precoUnit;
		private $quantidade;
		public function setidProduto($idProduto){
			$this->idProduto = $idProduto;
		}
		public function getidProduto(){
			return $this->idProduto;
		}
		public function setPrecoUnit($precoUnit){
			$this->precoUnit=$precoUnit;	
		}
		public function getPrecoUnit(){
			return $this->$precoUnit;
		}
		public function setQuantidade($quantidade){
			$this->$quantidade=$quantidade;
		}
		public function getQuantidade(){
			return $this->$quantidade;
		}
	}
?>

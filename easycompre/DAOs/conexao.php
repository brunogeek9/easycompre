<?php
	class conexao{
			private $host="mysql.hostinger.com.br";
			private $user="u843823210_tedi";
			private $senha="123456";
			private $bd="u843823210_easy";
			public $con;
			public function __construct(){
				$this -> con = mysqli_connect($this->host,$this->user,$this->senha,$this->bd);
			}
		}
?>

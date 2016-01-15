<?php
	class conexao{
			private $host="mysql.hostinger.com.br";
			private $user="u232397571_tedi";
			private $senha="doritos";
			private $bd="u232397571_easy";
			public $con;
			public function __construct(){
				$this -> con = mysqli_connect($this->host,$this->user,$this->senha,$this->bd);
			}
		}
?>

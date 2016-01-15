<?php
	//include_once ("DAOs/conexao.php");
	class subcategoriaDAO extends conexao{
		
		//consulta subcategoria de um produto
		public function ConsultaSubcategoria($id){
			$consulta=$this->con->query("SELECT subcategoria.nome 
			FROM subcategoria, produto 
			WHERE subcategoria.id_subcategoria = produto.id_subcategoria 
			AND produto.id_produto =$id");
			return mysqli_fetch_array($consulta);
		}
		
		//subcategorias mais buscadas do site
		public function ListarSubcategoriaMaisBuscada(){
			$lista = $this->con->query(
				"SELECT subcategoria.nome,subcategoria.id_subcategoria, SUM( produto.contador ) AS soma
				FROM subcategoria, produto
				WHERE subcategoria.id_subcategoria = produto.id_subcategoria
				GROUP BY nome
				ORDER BY soma DESC
				LIMIT 5"
			);
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;
		}
		
		//subcategorias mais vendidas do site
		public function ListarSubcategoriaMaisVendida(){
			$lista = $this->con->query(
				"SELECT subcategoria.id_subcategoria,subcategoria.nome,SUM(pedido_produto.quantidade) AS quantidade
				FROM subcategoria, produto ,pedido_produto
				WHERE subcategoria.id_subcategoria = produto.id_subcategoria AND
				pedido_produto.id_produto=produto.id_produto
				GROUP BY subcategoria.nome
				ORDER BY quantidade DESC
				LIMIT 2"
			);
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;
		}
		
		public function SubcategoriasDestaque(){
			$lista = $this->con->query(
				"SELECT subcategoria.id_subcategoria,subcategoria.nome,SUM(pedido_produto.quantidade) AS quantidade
				FROM subcategoria, produto ,pedido_produto
				WHERE subcategoria.id_subcategoria = produto.id_subcategoria AND
				pedido_produto.id_produto=produto.id_produto
				GROUP BY subcategoria.nome
				ORDER BY quantidade DESC
				LIMIT 4 union SELECT subcategoria.nome,subcategoria.id_subcategoria, SUM( produto.contador ) AS soma
				FROM subcategoria, produto
				WHERE subcategoria.id_subcategoria = produto.id_subcategoria
				GROUP BY nome
				ORDER BY soma DESC
				LIMIT 4"
			);
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;
		}


		public function ListarSubcategorias($id){
			$lista = $this->con->query(
				"SELECT subcategoria.id_subcategoria, subcategoria.nome
				FROM subcategoria, categoria
				WHERE subcategoria.id_categoria = categoria.id_categoria
				AND categoria.id_categoria=$id"
			);
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;
		}
		
	}
?>

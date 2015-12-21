<?php
	class categoriaDAO extends conexao{
		public function ListarCategoriaMaisBuscada(){
			$lista = $this->con->query(
				"SELECT categoria.nome, SUM( produto.contador ) AS soma
				FROM categoria, produto, subcategoria
				WHERE categoria.id_categoria = subcategoria.id_categoria
				AND subcategoria.id_subcategoria = produto.id_subcategoria
				GROUP BY nome
				ORDER BY soma DESC
				LIMIT 8"
			);
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;
		}
		public function ListarCategoriaMaisVendida(){
			$lista = $this->con->query(
				"SELECT categoria.nome, SUM(pedido_produto.quantidade) AS quantidade
				FROM categoria, produto ,pedido_produto,subcategoria
				WHERE categoria.id_categoria = subcategoria.id_categoria
				AND subcategoria.id_subcategoria = produto.id_subcategoria
				AND pedido_produto.id_produto=produto.id_produto
				GROUP BY categoria.nome
				ORDER BY quantidade DESC
				LIMIT 5"
			);
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;
		}
		public function ListarCategorias(){
			$lista=$this->con->query(
				"select nome from categoria"
			);
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;
		}
	}
?>
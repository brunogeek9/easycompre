e <?php
	include_once ("DAOs/conexao.php");
	class produtoDAO extends conexao{
		//consulta produto por id
		public function ColsultaProduto($id){
			$consulta=$this->con->query("SELECT * FROM produto WHERE id_produto = $id");
			return mysqli_fetch_array($consulta);
		}
		
		//produtos de uma subcategoria
		public function ListaProdutoSub($id){
			$lista=$this->con->query("SELECT produto.nome, produto.preco, produto.id_produto
			FROM produto, subcategoria
			WHERE subcategoria.id_subcategoria = produto.id_subcategoria 
			AND subcategoria.id_subcategoria ='$id'");
			while($li=mysqli_fetch_array($lista)){
				$res[]=$li;
			}
			return $res;
		}
		
		//produtos de uma categoria
		public function ListaProdutoCat($id){
			$lista=$this->con->query("SELECT produto.nome, produto.preco, produto.id_produto
			FROM produto, subcategoria, categoria
			WHERE subcategoria.id_subcategoria = produto.id_subcategoria
			AND categoria.id_categoria = subcategoria.id_categoria
			AND categoria.id_categoria ='$id'");
		}

		//Metodo listar produtos mais vendidos
		public function ListarProdutosMaisVendidos(){
			$lista=$this->con->query("SELECT * FROM pedido_produto,produto 
			where true 
			order by quantidade DESC
			limit 7");
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;

		}
		
		//metodo de listar produtos mais buscados
		public function ListarProdutosMaisBuscados(){
			$lista=$this->con->query("SELECT * FROM produto WHERE TRUE GROUP BY contador DESC");
			while($li=mysqli_fetch_array($lista)){
				$res[] = $li;
			}

			return $res;
		}
	}
?>

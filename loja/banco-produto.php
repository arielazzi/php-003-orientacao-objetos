<?php
require_once("conecta.php");
require_once("class/Categoria.php");
require_once("class/Produto.php");

function insereProduto($conexao, Produto $produto) {

	$query = "INSERT INTO 
			  	  produtos (nome,
			  	  			preco, 
			  	  			descricao, 
			  	  			categoria_id, 
			  	  			usado) 
			  	  	VALUES ('{$produto->getNome()}',
			  	  			 {$produto->getPreco()},
			  	  			'{$produto->getDescricao()}',
			  	  			 {$produto->getCategoria()->getId()},
			  	  			 {$produto->getUsado()})";

	return mysqli_query($conexao, $query);
}

function listaProdutos($conexao) {
	$produtos = array();

	$resultado = mysqli_query($conexao, "SELECT p.*,c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON p.categoria_id = c.id");

	while($produto_array = mysqli_fetch_assoc($resultado)) {
		
		$categoria = new Categoria();
		$categoria->setNome($produto_array['categoria_nome']);


		$nome      = $produto_array['nome'];
		$preco     = $produto_array['preco'];
		$descricao = $produto_array['descricao'];
		$usado     = $produto_array['usado'];

		$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
		$produto->setId($produto_array['id']);

		array_push($produtos, $produto);
	}

	return $produtos;
}

function busca_produto($conexao, $id) {

	$query = "SELECT * FROM produtos WHERE id={$id}";
	
	$resultado = mysqli_query($conexao, $query);
	$produto_buscado = mysqli_fetch_assoc($resultado);
	
	$categoria = new Categoria();
    $categoria->setId($produto_buscado['categoria_id']);

    $nome      = $produto_buscado['nome'];
	$preco     = $produto_buscado['preco'];
	$descricao = $produto_buscado['descricao'];
	$usado     = $produto_buscado['usado'];

	$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

	$produto->setId($produto_buscado['id']);

	return $produto;
}

function alteraProduto($conexao, Produto $produto) {
	$query = "UPDATE 
				  produtos 
			  SET 
			  	  nome         = '{$produto->getNome()}', 
			  	  preco        =  {$produto->getPreco()}, 
			  	  descricao    = '{$produto->getDescricao()}', 
			  	  categoria_id =  {$produto->getCategoria()->getId()}, 
			  	  usado        =  {$produto->getUsado()} 
			  WHERE 
			   	  id = {$produto->getId()}";

	return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id)
{
	$query = "DELETE FROM produtos WHERE id={$id}";
	return mysqli_query($conexao, $query);
}
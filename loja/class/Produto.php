<?php

/**
* 
*/
class Produto {

	public $id;
	public $nome;
	public $preco;
	public $descricao;
	public $categoria;
	public $usado;

 	public function precoComDesconto($desconto = 0.1) {
 		return $this->preco - ($this->preco * $desconto);
 	}

}
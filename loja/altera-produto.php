<?php 
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");

verificaUsuario();

$produto = new Produto();

$produto->setId($_POST['id']);
$produto->setNome($_POST["nome"]);
$produto->setPreco($_POST["preco"]);
$produto->setDescricao($_POST["descricao"]);

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$produto->setCategoria($categoria);

if (array_key_exists('usado', $_POST)) {
	$produto->setUsado("true");
} else {
	$produto->setUsado("false");
}

	if(alteraProduto($conexao, $produto)){
?>
<p class="text-success">Produto <?= $produto->getNome(); ?>, <?= $produto->getPreco(); ?> alterado com sucesso!</p>
<?php 
	}else{
		$msg = mysqli_error($conexao);
?>
<p class="text-danger">Produto <?= $produto->getNome(); ?>, não foi alterado: <?= $msg; ?></p>
<?php 
	}
?>

<?php require_once("rodape.php"); ?>

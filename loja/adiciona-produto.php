<?php 
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");

verificaUsuario();

$produto = new Produto();

$produto->nome         = $_POST["nome"];
$produto->preco        = $_POST["preco"];
$produto->descricao    = $_POST["descricao"];

$categoria 			   = new Categoria();
$categoria->id         = $_POST['categoria_id'];

$produto->categoria    = $categoria;

if (array_key_exists('usado', $_POST)) {
	$produto->usado = "true";
} else {
	$produto->usado = "false";
}
	if(insereProduto($conexao, $produto)){
?>
<p class="text-success">Produto <?= $produto->nome; ?>, <?= $produto->preco; ?> adicionado com sucesso!</p>
<?php 
	}else{
		$msg = mysqli_error($conexao);
?>
<p class="text-danger">Produto <?= $produto->nome; ?>, não foi adicionado: <?= $msg; ?></p>
<?php 
	}
?>

<?php require_once("rodape.php"); ?>

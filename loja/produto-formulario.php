<?php
require_once("cabecalho.php");
require_once("banco-categoria.php");
require_once("logica-usuario.php");
require_once("class/Produto.php");

verificaUsuario();

$categoria = new Categoria("","","");
$categoria->setId(1);

$produto = new Produto("", "", "", $categoria, "");

$categorias = listaCategorias($conexao);
?>
	<h1>Adiciona Produto</h1>
    <form action="adiciona-produto.php" method="post">
    	<table class="table">
			<?php require_once("produto-formulario-base.php"); ?>
			<tr>
				<td>
        			<input class="btn btn-primary" type="submit" value="Cadastrar" />
				</td>
			</tr>
    	</table>

    </form>
</html>
<?php require_once("rodape.php"); ?>

<tr>
	<td>Nome</td>
	<td><input class="form-control" type="text" name="nome" value="<?=$produto->getNome()?>" /></td>
</tr>
<tr>
	<td>Preço</td>
	<td><input class="form-control" type="number" name="preco" value="<?=$produto->getPreco()?>" /></td>
</tr>
<tr>
	<td>Descrição</td>
	<td><textarea class="form-control" name="descricao"><?=$produto->getDescricao()?></textarea></td>
</tr>
<tr>
	<td></td>
	<td>
		<input type="checkbox" name="usado" value="true" <?=$usado?> >Usado
	</td>
</tr>
<tr>
	<td>Categorias</td>
	<td>
		<select name="categoria_id" class="form-control">
		<?php
		foreach($categorias as $categoria):
			$essaCategoria = $categoria->getId() == $produto->getCategoria()->getId();
			$selecao = $essaCategoria ? "selected='selected'" : "";
		?>
			<option  value="<?=$categoria->getId()?>" <?=$selecao?> ><?=$categoria->getNome()?></option>
		<?php endforeach ?>
		</select>
	</td>
</tr>
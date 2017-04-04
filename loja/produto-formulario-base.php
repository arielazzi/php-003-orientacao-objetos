<tr>
	<td>Nome</td>
	<td><input class="form-control" type="text" name="nome" value="<?=$produto->nome?>" /></td>
</tr>
<tr>
	<td>Preço</td>
	<td><input class="form-control" type="number" name="preco" value="<?=$produto->preco?>" /></td>
</tr>
<tr>
	<td>Descrição</td>
	<td><textarea class="form-control" name="descricao"><?=$produto->descricao?></textarea></td>
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
			$essaCategoria = $categoria->id == $produto->categoria_id;
			$selecao = $essaCategoria ? "selected='selected'" : "";
		?>
			<option  value="<?=$categoria->id?>" <?=$selecao?> ><?=$categoria->nome?></option>
		<?php endforeach ?>
		</select>
	</td>
</tr>
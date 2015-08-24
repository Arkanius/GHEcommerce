<div class="produtos view">
<h2><?php echo __('Produto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao Curta'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['descricao_curta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao Longa'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['descricao_longa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qtd'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['qtd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Desconto'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['valor_desconto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Destaque'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['destaque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vendas'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['vendas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Peso'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['peso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Title'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['seo_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Desc'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['seo_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($produto['ParentProduto']['id'], array('controller' => 'produtos', 'action' => 'view', $produto['ParentProduto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($produto['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $produto['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($produto['Produto']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Produto'), array('action' => 'edit', $produto['Produto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Produto'), array('action' => 'delete', $produto['Produto']['id']), null, __('Are you sure you want to delete # %s?', $produto['Produto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comentarios'), array('controller' => 'comentarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comentario'), array('controller' => 'comentarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fotos'), array('controller' => 'fotos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Foto'), array('controller' => 'fotos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Comentarios'); ?></h3>
	<?php if (!empty($produto['Comentario'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Comentario'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produto['Comentario'] as $comentario): ?>
		<tr>
			<td><?php echo $comentario['id']; ?></td>
			<td><?php echo $comentario['nome']; ?></td>
			<td><?php echo $comentario['email']; ?></td>
			<td><?php echo $comentario['comentario']; ?></td>
			<td><?php echo $comentario['produto_id']; ?></td>
			<td><?php echo $comentario['created']; ?></td>
			<td><?php echo $comentario['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comentarios', 'action' => 'view', $comentario['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comentarios', 'action' => 'edit', $comentario['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comentarios', 'action' => 'delete', $comentario['id']), null, __('Are you sure you want to delete # %s?', $comentario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comentario'), array('controller' => 'comentarios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Fotos'); ?></h3>
	<?php if (!empty($produto['Foto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produto['Foto'] as $foto): ?>
		<tr>
			<td><?php echo $foto['id']; ?></td>
			<td><?php echo $foto['url']; ?></td>
			<td><?php echo $foto['parent_id']; ?></td>
			<td><?php echo $foto['lft']; ?></td>
			<td><?php echo $foto['rght']; ?></td>
			<td><?php echo $foto['produto_id']; ?></td>
			<td><?php echo $foto['created']; ?></td>
			<td><?php echo $foto['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'fotos', 'action' => 'view', $foto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'fotos', 'action' => 'edit', $foto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'fotos', 'action' => 'delete', $foto['id']), null, __('Are you sure you want to delete # %s?', $foto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Foto'), array('controller' => 'fotos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Produtos'); ?></h3>
	<?php if (!empty($produto['ChildProduto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Descricao Curta'); ?></th>
		<th><?php echo __('Descricao Longa'); ?></th>
		<th><?php echo __('Qtd'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Valor Desconto'); ?></th>
		<th><?php echo __('Destaque'); ?></th>
		<th><?php echo __('Vendas'); ?></th>
		<th><?php echo __('Peso'); ?></th>
		<th><?php echo __('Seo Title'); ?></th>
		<th><?php echo __('Seo Desc'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produto['ChildProduto'] as $childProduto): ?>
		<tr>
			<td><?php echo $childProduto['id']; ?></td>
			<td><?php echo $childProduto['titulo']; ?></td>
			<td><?php echo $childProduto['slug']; ?></td>
			<td><?php echo $childProduto['descricao_curta']; ?></td>
			<td><?php echo $childProduto['descricao_longa']; ?></td>
			<td><?php echo $childProduto['qtd']; ?></td>
			<td><?php echo $childProduto['valor']; ?></td>
			<td><?php echo $childProduto['valor_desconto']; ?></td>
			<td><?php echo $childProduto['destaque']; ?></td>
			<td><?php echo $childProduto['vendas']; ?></td>
			<td><?php echo $childProduto['peso']; ?></td>
			<td><?php echo $childProduto['seo_title']; ?></td>
			<td><?php echo $childProduto['seo_desc']; ?></td>
			<td><?php echo $childProduto['parent_id']; ?></td>
			<td><?php echo $childProduto['lft']; ?></td>
			<td><?php echo $childProduto['rght']; ?></td>
			<td><?php echo $childProduto['usuario_id']; ?></td>
			<td><?php echo $childProduto['created']; ?></td>
			<td><?php echo $childProduto['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'produtos', 'action' => 'view', $childProduto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'produtos', 'action' => 'edit', $childProduto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'produtos', 'action' => 'delete', $childProduto['id']), null, __('Are you sure you want to delete # %s?', $childProduto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Categorias'); ?></h3>
	<?php if (!empty($produto['Categoria'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produto['Categoria'] as $categoria): ?>
		<tr>
			<td><?php echo $categoria['id']; ?></td>
			<td><?php echo $categoria['titulo']; ?></td>
			<td><?php echo $categoria['slug']; ?></td>
			<td><?php echo $categoria['title']; ?></td>
			<td><?php echo $categoria['descricao']; ?></td>
			<td><?php echo $categoria['parent_id']; ?></td>
			<td><?php echo $categoria['lft']; ?></td>
			<td><?php echo $categoria['rght']; ?></td>
			<td><?php echo $categoria['created']; ?></td>
			<td><?php echo $categoria['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categorias', 'action' => 'view', $categoria['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categorias', 'action' => 'edit', $categoria['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categorias', 'action' => 'delete', $categoria['id']), null, __('Are you sure you want to delete # %s?', $categoria['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Compras'); ?></h3>
	<?php if (!empty($produto['Compra'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produto['Compra'] as $compra): ?>
		<tr>
			<td><?php echo $compra['id']; ?></td>
			<td><?php echo $compra['created']; ?></td>
			<td><?php echo $compra['modified']; ?></td>
			<td><?php echo $compra['cep']; ?></td>
			<td><?php echo $compra['endereco']; ?></td>
			<td><?php echo $compra['bairro']; ?></td>
			<td><?php echo $compra['cidade']; ?></td>
			<td><?php echo $compra['estado']; ?></td>
			<td><?php echo $compra['usuario_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'compras', 'action' => 'view', $compra['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'compras', 'action' => 'edit', $compra['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'compras', 'action' => 'delete', $compra['id']), null, __('Are you sure you want to delete # %s?', $compra['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

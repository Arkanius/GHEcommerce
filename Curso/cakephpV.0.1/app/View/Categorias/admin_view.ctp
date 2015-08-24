<div class="categorias view">
<h2><?php echo __('Categoria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoria['ParentCategoria']['title'], array('controller' => 'categorias', 'action' => 'view', $categoria['ParentCategoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categoria'), array('action' => 'edit', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoria'), array('action' => 'delete', $categoria['Categoria']['id']), null, __('Are you sure you want to delete # %s?', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Categorias'); ?></h3>
	<?php if (!empty($categoria['ChildCategoria'])): ?>
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
	<?php foreach ($categoria['ChildCategoria'] as $childCategoria): ?>
		<tr>
			<td><?php echo $childCategoria['id']; ?></td>
			<td><?php echo $childCategoria['titulo']; ?></td>
			<td><?php echo $childCategoria['slug']; ?></td>
			<td><?php echo $childCategoria['title']; ?></td>
			<td><?php echo $childCategoria['descricao']; ?></td>
			<td><?php echo $childCategoria['parent_id']; ?></td>
			<td><?php echo $childCategoria['lft']; ?></td>
			<td><?php echo $childCategoria['rght']; ?></td>
			<td><?php echo $childCategoria['created']; ?></td>
			<td><?php echo $childCategoria['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categorias', 'action' => 'view', $childCategoria['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categorias', 'action' => 'edit', $childCategoria['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categorias', 'action' => 'delete', $childCategoria['id']), null, __('Are you sure you want to delete # %s?', $childCategoria['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Produtos'); ?></h3>
	<?php if (!empty($categoria['Produto'])): ?>
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
	<?php foreach ($categoria['Produto'] as $produto): ?>
		<tr>
			<td><?php echo $produto['id']; ?></td>
			<td><?php echo $produto['titulo']; ?></td>
			<td><?php echo $produto['slug']; ?></td>
			<td><?php echo $produto['descricao_curta']; ?></td>
			<td><?php echo $produto['descricao_longa']; ?></td>
			<td><?php echo $produto['qtd']; ?></td>
			<td><?php echo $produto['valor']; ?></td>
			<td><?php echo $produto['valor_desconto']; ?></td>
			<td><?php echo $produto['destaque']; ?></td>
			<td><?php echo $produto['vendas']; ?></td>
			<td><?php echo $produto['peso']; ?></td>
			<td><?php echo $produto['seo_title']; ?></td>
			<td><?php echo $produto['seo_desc']; ?></td>
			<td><?php echo $produto['parent_id']; ?></td>
			<td><?php echo $produto['lft']; ?></td>
			<td><?php echo $produto['rght']; ?></td>
			<td><?php echo $produto['usuario_id']; ?></td>
			<td><?php echo $produto['created']; ?></td>
			<td><?php echo $produto['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'produtos', 'action' => 'view', $produto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'produtos', 'action' => 'edit', $produto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'produtos', 'action' => 'delete', $produto['id']), null, __('Are you sure you want to delete # %s?', $produto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

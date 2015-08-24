<div class="produtos index">
	<h2><?php echo __('Produtos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao_curta'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao_longa'); ?></th>
			<th><?php echo $this->Paginator->sort('qtd'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_desconto'); ?></th>
			<th><?php echo $this->Paginator->sort('destaque'); ?></th>
			<th><?php echo $this->Paginator->sort('vendas'); ?></th>
			<th><?php echo $this->Paginator->sort('peso'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_title'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_desc'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produtos as $produto): ?>
	<tr>
		<td><?php echo h($produto['Produto']['id']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['slug']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['descricao_curta']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['descricao_longa']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['qtd']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['valor']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['valor_desconto']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['destaque']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['vendas']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['peso']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['seo_title']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['seo_desc']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($produto['ParentProduto']['id'], array('controller' => 'produtos', 'action' => 'view', $produto['ParentProduto']['id'])); ?>
		</td>
		<td><?php echo h($produto['Produto']['lft']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['rght']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($produto['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $produto['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($produto['Produto']['created']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $produto['Produto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $produto['Produto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $produto['Produto']['id']), null, __('Are you sure you want to delete # %s?', $produto['Produto']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Produto'), array('action' => 'add')); ?></li>
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

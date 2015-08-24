<div class="compras index">
	<h2><?php echo __('Compras'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('cep'); ?></th>
			<th><?php echo $this->Paginator->sort('endereco'); ?></th>
			<th><?php echo $this->Paginator->sort('bairro'); ?></th>
			<th><?php echo $this->Paginator->sort('cidade'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($compras as $compra): ?>
	<tr>
		<td><?php echo h($compra['Compra']['id']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['created']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['modified']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['cep']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['bairro']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['cidade']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['estado']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($compra['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $compra['Usuario']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $compra['Compra']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $compra['Compra']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $compra['Compra']['id']), null, __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Compra'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notificacoes'), array('controller' => 'notificacoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notificacao'), array('controller' => 'notificacoes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>

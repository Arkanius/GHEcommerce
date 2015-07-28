<div class="fotos index">
	<h2><?php echo __('Fotos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($fotos as $foto): ?>
	<tr>
		<td><?php echo h($foto['Foto']['id']); ?>&nbsp;</td>
		<td><?php echo h($foto['Foto']['url']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($foto['ParentFoto']['id'], array('controller' => 'fotos', 'action' => 'view', $foto['ParentFoto']['id'])); ?>
		</td>
		<td><?php echo h($foto['Foto']['lft']); ?>&nbsp;</td>
		<td><?php echo h($foto['Foto']['rght']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($foto['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $foto['Produto']['id'])); ?>
		</td>
		<td><?php echo h($foto['Foto']['created']); ?>&nbsp;</td>
		<td><?php echo h($foto['Foto']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $foto['Foto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $foto['Foto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $foto['Foto']['id']), array(), __('Are you sure you want to delete # %s?', $foto['Foto']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Foto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Fotos'), array('controller' => 'fotos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Foto'), array('controller' => 'fotos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>

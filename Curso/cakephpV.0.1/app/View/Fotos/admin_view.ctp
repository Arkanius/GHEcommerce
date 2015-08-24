<div class="fotos view">
<h2><?php echo __('Foto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($foto['Foto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($foto['Foto']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Foto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($foto['ParentFoto']['id'], array('controller' => 'fotos', 'action' => 'view', $foto['ParentFoto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($foto['Foto']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($foto['Foto']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($foto['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $foto['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($foto['Foto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($foto['Foto']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Foto'), array('action' => 'edit', $foto['Foto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Foto'), array('action' => 'delete', $foto['Foto']['id']), null, __('Are you sure you want to delete # %s?', $foto['Foto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fotos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Foto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fotos'), array('controller' => 'fotos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Foto'), array('controller' => 'fotos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Fotos'); ?></h3>
	<?php if (!empty($foto['ChildFoto'])): ?>
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
	<?php foreach ($foto['ChildFoto'] as $childFoto): ?>
		<tr>
			<td><?php echo $childFoto['id']; ?></td>
			<td><?php echo $childFoto['url']; ?></td>
			<td><?php echo $childFoto['parent_id']; ?></td>
			<td><?php echo $childFoto['lft']; ?></td>
			<td><?php echo $childFoto['rght']; ?></td>
			<td><?php echo $childFoto['produto_id']; ?></td>
			<td><?php echo $childFoto['created']; ?></td>
			<td><?php echo $childFoto['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'fotos', 'action' => 'view', $childFoto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'fotos', 'action' => 'edit', $childFoto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'fotos', 'action' => 'delete', $childFoto['id']), null, __('Are you sure you want to delete # %s?', $childFoto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Foto'), array('controller' => 'fotos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

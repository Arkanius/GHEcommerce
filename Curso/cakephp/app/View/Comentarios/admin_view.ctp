<div class="comentarios view">
<h2><?php echo __('Comentario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comentario'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['comentario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comentario['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $comentario['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comentario'), array('action' => 'edit', $comentario['Comentario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comentario'), array('action' => 'delete', $comentario['Comentario']['id']), null, __('Are you sure you want to delete # %s?', $comentario['Comentario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comentarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comentario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>

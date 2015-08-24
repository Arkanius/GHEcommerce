<div class="comentarios form">
<?php echo $this->Form->create('Comentario'); ?>
	<fieldset>
		<legend><?php echo __('Add Comentario'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('email');
		echo $this->Form->input('comentario');
		echo $this->Form->input('produto_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Comentarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="compras form">
<?php echo $this->Form->create('Compra'); ?>
	<fieldset>
		<legend><?php echo __('Edit Compra'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cep');
		echo $this->Form->input('endereco');
		echo $this->Form->input('bairro');
		echo $this->Form->input('cidade');
		echo $this->Form->input('estado');
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('Produto');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Compra.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Compra.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Compras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notificacoes'), array('controller' => 'notificacoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notificacao'), array('controller' => 'notificacoes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>

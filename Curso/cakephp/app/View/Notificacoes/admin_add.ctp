<div class="notificacoes form">
<?php echo $this->Form->create('Notificacao'); ?>
	<fieldset>
		<legend><?php echo __('Add Notificacao'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('code');
		echo $this->Form->input('reference');
		echo $this->Form->input('type');
		echo $this->Form->input('status');
		echo $this->Form->input('lastEventDate');
		echo $this->Form->input('paymentMethodType');
		echo $this->Form->input('paymentMethodCode');
		echo $this->Form->input('grossAmount');
		echo $this->Form->input('discountAmount');
		echo $this->Form->input('feeAmount');
		echo $this->Form->input('netAmount');
		echo $this->Form->input('extraAmount');
		echo $this->Form->input('installmentCount');
		echo $this->Form->input('senderName');
		echo $this->Form->input('senderEmail');
		echo $this->Form->input('senderPhone');
		echo $this->Form->input('compra_id');
		echo $this->Form->input('notificationCode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Notificacoes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
	</ul>
</div>

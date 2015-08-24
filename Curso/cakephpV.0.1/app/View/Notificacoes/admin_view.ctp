<div class="notificacoes view">
<h2><?php echo __('Notificacao'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reference'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['reference']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LastEventDate'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['lastEventDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PaymentMethodType'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['paymentMethodType']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PaymentMethodCode'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['paymentMethodCode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('GrossAmount'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['grossAmount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DiscountAmount'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['discountAmount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FeeAmount'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['feeAmount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NetAmount'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['netAmount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ExtraAmount'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['extraAmount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('InstallmentCount'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['installmentCount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SenderName'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['senderName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SenderEmail'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['senderEmail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SenderPhone'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['senderPhone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Compra'); ?></dt>
		<dd>
			<?php echo $this->Html->link($notificacao['Compra']['id'], array('controller' => 'compras', 'action' => 'view', $notificacao['Compra']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NotificationCode'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['notificationCode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Notificacao'), array('action' => 'edit', $notificacao['Notificacao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Notificacao'), array('action' => 'delete', $notificacao['Notificacao']['id']), null, __('Are you sure you want to delete # %s?', $notificacao['Notificacao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notificacoes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notificacao'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
	</ul>
</div>

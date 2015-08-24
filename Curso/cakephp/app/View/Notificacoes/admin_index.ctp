<div class="notificacoes index">
	<h2><?php echo __('Notificacoes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('reference'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('lastEventDate'); ?></th>
			<th><?php echo $this->Paginator->sort('paymentMethodType'); ?></th>
			<th><?php echo $this->Paginator->sort('paymentMethodCode'); ?></th>
			<th><?php echo $this->Paginator->sort('grossAmount'); ?></th>
			<th><?php echo $this->Paginator->sort('discountAmount'); ?></th>
			<th><?php echo $this->Paginator->sort('feeAmount'); ?></th>
			<th><?php echo $this->Paginator->sort('netAmount'); ?></th>
			<th><?php echo $this->Paginator->sort('extraAmount'); ?></th>
			<th><?php echo $this->Paginator->sort('installmentCount'); ?></th>
			<th><?php echo $this->Paginator->sort('senderName'); ?></th>
			<th><?php echo $this->Paginator->sort('senderEmail'); ?></th>
			<th><?php echo $this->Paginator->sort('senderPhone'); ?></th>
			<th><?php echo $this->Paginator->sort('compra_id'); ?></th>
			<th><?php echo $this->Paginator->sort('notificationCode'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($notificacoes as $notificacao): ?>
	<tr>
		<td><?php echo h($notificacao['Notificacao']['id']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['date']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['code']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['reference']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['type']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['status']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['lastEventDate']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['paymentMethodType']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['paymentMethodCode']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['grossAmount']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['discountAmount']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['feeAmount']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['netAmount']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['extraAmount']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['installmentCount']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['senderName']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['senderEmail']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['senderPhone']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($notificacao['Compra']['id'], array('controller' => 'compras', 'action' => 'view', $notificacao['Compra']['id'])); ?>
		</td>
		<td><?php echo h($notificacao['Notificacao']['notificationCode']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['created']); ?>&nbsp;</td>
		<td><?php echo h($notificacao['Notificacao']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $notificacao['Notificacao']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $notificacao['Notificacao']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $notificacao['Notificacao']['id']), null, __('Are you sure you want to delete # %s?', $notificacao['Notificacao']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Notificacao'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
	</ul>
</div>

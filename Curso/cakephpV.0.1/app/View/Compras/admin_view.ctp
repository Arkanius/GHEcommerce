<div class="compras view">
<h2><?php echo __('Compra'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cep'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['cep']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['endereco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bairro'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['bairro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['cidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($compra['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $compra['Usuario']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Compra'), array('action' => 'edit', $compra['Compra']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Compra'), array('action' => 'delete', $compra['Compra']['id']), null, __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notificacoes'), array('controller' => 'notificacoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notificacao'), array('controller' => 'notificacoes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Notificacoes'); ?></h3>
	<?php if (!empty($compra['Notificacao'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Reference'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('LastEventDate'); ?></th>
		<th><?php echo __('PaymentMethodType'); ?></th>
		<th><?php echo __('PaymentMethodCode'); ?></th>
		<th><?php echo __('GrossAmount'); ?></th>
		<th><?php echo __('DiscountAmount'); ?></th>
		<th><?php echo __('FeeAmount'); ?></th>
		<th><?php echo __('NetAmount'); ?></th>
		<th><?php echo __('ExtraAmount'); ?></th>
		<th><?php echo __('InstallmentCount'); ?></th>
		<th><?php echo __('SenderName'); ?></th>
		<th><?php echo __('SenderEmail'); ?></th>
		<th><?php echo __('SenderPhone'); ?></th>
		<th><?php echo __('Compra Id'); ?></th>
		<th><?php echo __('NotificationCode'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($compra['Notificacao'] as $notificacao): ?>
		<tr>
			<td><?php echo $notificacao['id']; ?></td>
			<td><?php echo $notificacao['date']; ?></td>
			<td><?php echo $notificacao['code']; ?></td>
			<td><?php echo $notificacao['reference']; ?></td>
			<td><?php echo $notificacao['type']; ?></td>
			<td><?php echo $notificacao['status']; ?></td>
			<td><?php echo $notificacao['lastEventDate']; ?></td>
			<td><?php echo $notificacao['paymentMethodType']; ?></td>
			<td><?php echo $notificacao['paymentMethodCode']; ?></td>
			<td><?php echo $notificacao['grossAmount']; ?></td>
			<td><?php echo $notificacao['discountAmount']; ?></td>
			<td><?php echo $notificacao['feeAmount']; ?></td>
			<td><?php echo $notificacao['netAmount']; ?></td>
			<td><?php echo $notificacao['extraAmount']; ?></td>
			<td><?php echo $notificacao['installmentCount']; ?></td>
			<td><?php echo $notificacao['senderName']; ?></td>
			<td><?php echo $notificacao['senderEmail']; ?></td>
			<td><?php echo $notificacao['senderPhone']; ?></td>
			<td><?php echo $notificacao['compra_id']; ?></td>
			<td><?php echo $notificacao['notificationCode']; ?></td>
			<td><?php echo $notificacao['created']; ?></td>
			<td><?php echo $notificacao['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'notificacoes', 'action' => 'view', $notificacao['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'notificacoes', 'action' => 'edit', $notificacao['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'notificacoes', 'action' => 'delete', $notificacao['id']), null, __('Are you sure you want to delete # %s?', $notificacao['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Notificacao'), array('controller' => 'notificacoes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Produtos'); ?></h3>
	<?php if (!empty($compra['Produto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Descricao Curta'); ?></th>
		<th><?php echo __('Descricao Longa'); ?></th>
		<th><?php echo __('Qtd'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Valor Desconto'); ?></th>
		<th><?php echo __('Destaque'); ?></th>
		<th><?php echo __('Vendas'); ?></th>
		<th><?php echo __('Peso'); ?></th>
		<th><?php echo __('Seo Title'); ?></th>
		<th><?php echo __('Seo Desc'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($compra['Produto'] as $produto): ?>
		<tr>
			<td><?php echo $produto['id']; ?></td>
			<td><?php echo $produto['titulo']; ?></td>
			<td><?php echo $produto['slug']; ?></td>
			<td><?php echo $produto['descricao_curta']; ?></td>
			<td><?php echo $produto['descricao_longa']; ?></td>
			<td><?php echo $produto['qtd']; ?></td>
			<td><?php echo $produto['valor']; ?></td>
			<td><?php echo $produto['valor_desconto']; ?></td>
			<td><?php echo $produto['destaque']; ?></td>
			<td><?php echo $produto['vendas']; ?></td>
			<td><?php echo $produto['peso']; ?></td>
			<td><?php echo $produto['seo_title']; ?></td>
			<td><?php echo $produto['seo_desc']; ?></td>
			<td><?php echo $produto['parent_id']; ?></td>
			<td><?php echo $produto['lft']; ?></td>
			<td><?php echo $produto['rght']; ?></td>
			<td><?php echo $produto['usuario_id']; ?></td>
			<td><?php echo $produto['created']; ?></td>
			<td><?php echo $produto['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'produtos', 'action' => 'view', $produto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'produtos', 'action' => 'edit', $produto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'produtos', 'action' => 'delete', $produto['id']), null, __('Are you sure you want to delete # %s?', $produto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

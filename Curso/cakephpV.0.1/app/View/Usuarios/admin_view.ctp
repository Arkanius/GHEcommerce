<div class="usuarios view">
<h2><?php echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['usuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cep'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['cep']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['endereco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bairro'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['bairro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['cidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Faceid'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['faceid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Senha'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['senha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['admin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Compras'); ?></h3>
	<?php if (!empty($usuario['Compra'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($usuario['Compra'] as $compra): ?>
		<tr>
			<td><?php echo $compra['id']; ?></td>
			<td><?php echo $compra['created']; ?></td>
			<td><?php echo $compra['modified']; ?></td>
			<td><?php echo $compra['cep']; ?></td>
			<td><?php echo $compra['endereco']; ?></td>
			<td><?php echo $compra['bairro']; ?></td>
			<td><?php echo $compra['cidade']; ?></td>
			<td><?php echo $compra['estado']; ?></td>
			<td><?php echo $compra['usuario_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'compras', 'action' => 'view', $compra['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'compras', 'action' => 'edit', $compra['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'compras', 'action' => 'delete', $compra['id']), null, __('Are you sure you want to delete # %s?', $compra['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Produtos'); ?></h3>
	<?php if (!empty($usuario['Produto'])): ?>
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
	<?php foreach ($usuario['Produto'] as $produto): ?>
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

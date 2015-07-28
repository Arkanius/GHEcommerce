<?php

if (!isset($produtos)) {
	if (!isset($action)) $action = 'maisvendidos';
	if (!isset($action)) $qtd = 6;

	$produtos = $this->requestAction('produtos/'.$action.'/'.$qtd);
}

?>

<div class="container-fluid produtos-container">
<?php foreach ($produtos as $value) : ?>
	<?php if (isset($value['Produto'])) $value = $value['Produto'];?>
	<div class="col-lg-4">
		<div class="produto-box" data-id="<?php echo $value['id'];?>">
			<?php
				$img = $this->Html->image('tmp/produto.jpg');
				echo $this->Html->link(
					$img,
					'/produto/'.$value['slug'],
					array(
						'escape'=>false
					)
				);
			?>
			<h4><?php echo $this->Html->link($value['titulo'],'/produto/'.$value['slug']);?></h4>
			<?php
				echo $this->Html->link(
					'R$ '.number_format($value['valor'], 2, ',', '.'),
					'/produto/'.$value['slug'],
					array(
						'class'=>'btn-preco'
					)
				);
			?>
		</div>
	</div>
<?php endforeach; ?>
</div>
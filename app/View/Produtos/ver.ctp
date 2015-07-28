<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<?php echo $this->Html->image(
				'http://placehold.it/350x350/CCCCCC/000000/&text=Sem%20imagem',
				array(
					'class'=>'img-responsive'
				)
			);?>
		</div>
		<div class="col-md-8 text-right">
			<h3 class="text-left"><?php echo $produto['Produto']['titulo'];?></h3>
			<p class="text-left">Descrição: <?php echo $produto['Produto']['descricao_curta'];?></p>
			<p class="text-left"><strong>Monte sua camisa</strong></p>
			<hr>
			<p><strong>Valor: R$ <?php echo number_format($produto['Produto']['valor'], 2, ',', '.');?></strong></p>
			<p>Valor original: R$ <?php echo number_format($produto['Produto']['valor'], 2, ',', '.');?></p>
			<p><?php
				echo $this->Html->link(
					'Comprar',
					'/produtos/addcarrinho/'.$produto['Produto']['id'],
					array(
						'class'=>'btn btn-primary btn-lg'
					)
				);
			?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<hr />
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p><strong>Mais detalhes</strong></p>
			<p><?php echo $produto['Produto']['descricao_longa'];?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<hr />
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->element('produtos/grid',array('action'=>'destaque','qtd'=>3), array('cache'=>'curto'));?>
		</div>
	</div>
</div>
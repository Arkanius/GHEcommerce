
<h3>Acesse sua conta</h3>

<hr>

<?php

	echo $this->Form->create(
		'Usuario',
		array(
			'role'=>'form',
			'class'=>'form-horizontal',
			'inputDefaults'=>array(
				'before'=>'<div class="form-group">',
				'between'=>'<div class="col-sm-10">',
				'after'=>'</div></div>',
				'class'=>'form-control',
				'label'=>array(
					'class'=>'col-sm-2 control-label',
				)
			)
		)
	);
	echo $this->Form->input('usuario',array(
		'label'=>array(
			'class'=>'col-sm-2 control-label',
			'text'=>'Usuário'
			)
		)
	);
	echo $this->Form->input('senha', array('type'=>'password'));
	echo $this->Form->input('Logar', array(
		'type'=>'submit',
		'class'=>'btn btn-default',
		'between'=>'<div class="col-sm-offset-2 col-sm-10">',
		'label'=>false
	));
	echo $this->Form->end();
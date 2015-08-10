<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>Formulário de contato</h3>
			<?php
				echo $this->Form->create(
					'Page',
					array(
						'action'=>'/enviaremail',
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

				echo $this->Form->input('nome', array('placeholder'=>'Seu nome...'));
				echo $this->Form->input('email', array('placeholder'=>'Seu email...'));
				echo $this->Form->input('telefone', array('placeholder'=>'Telefone...'));
				echo $this->Form->input('mensagem', array('placeholder'=>'Mensagem...','type'=>'textarea'));
				echo $this->Form->input(
					'enviar',
					array(
						'type'=>'submit',
						'class'=>'btn btn-info',
						'before'=>'<div class="form-group">',
						'between'=>'<div class="col-sm-offset-2 col-sm-10">',
						'after'=>'</div></div>',
						'label'=>false,
					)
				);
				echo $this->Form->end();
			?>
		</div>
	</div>
</div>
<?php

	echo $this->Form->create('Usuario');
	echo $this->Form->input('usuario');
	echo $this->Form->input('senha', array('type'=>'password'));
	echo $this->Form->end('Logar');
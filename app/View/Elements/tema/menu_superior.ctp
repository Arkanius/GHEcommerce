<ul>
    <li><a href="<?php echo $this->Html->url('/');?>">Home</a></li>
    <li><a href="<?php echo $this->Html->url('/');?>pages/sobrenos">Sobre nós</a></li>
    <?php if (empty($user)) :?>
	    <li><a href="<?php echo $this->Html->url('/');?>cliente/login">Login</a></li>
	    <li><a href="<?php echo $this->Html->url('/');?>cliente/cadastra">Cadastra</a></li>
	<?php elseif($user['admin']==1): ?>
		<li><a href="<?php echo $this->Html->url('/');?>admin">Administração</a></li>
		<li><a href="<?php echo $this->Html->url('/');?>cliente/compras">Minhas compras</a></li>
		<li><a href="<?php echo $this->Html->url('/');?>cliente/logout">Logout</a></li>
	<?php else: ?>
		<li><a href="<?php echo $this->Html->url('/');?>cliente/compras">Minhas compras</a></li>
		<li><a href="<?php echo $this->Html->url('/');?>cliente/logout">Logout</a></li>
	<?php endif; ?>
    <li><a href="<?php echo $this->Html->url('/');?>pages/suporte">Suporte</a></li>
    <li><a href="<?php echo $this->Html->url('/');?>pages/contato">Contato</a></li>
</ul> 
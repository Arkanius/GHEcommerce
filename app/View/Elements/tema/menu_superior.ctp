<ul>
    <li><a href="/loja/">Home</a></li>
    <li><a href="/loja/pages/sobrenos">Sobre nós</a></li>
    <?php 
        if(empty($user)){
            echo '<li><a href="/loja/cliente/login">Login</a></li>
                  <li><a href="/loja/cliente/cadastra">Cadastro</a></li>';
        }elseif($user['admin']==1){
            echo '<li><a href="/admin">Administração</a></li>
                  <li><a href="/loja/cliente/logout">Logout</a></li>';
        }else {
            echo '<li><a href="/loja/cliente/compras">Minhas Compras</a></li>
                  <li><a href="/loja/cliente/logout">Logout</a></li>';
        }
    ?>
    <li><a href="/loja/pages/suporte">Suporte</a></li>
    <li><a href="/loja/pages/contato">Contato</a></li>
</ul>
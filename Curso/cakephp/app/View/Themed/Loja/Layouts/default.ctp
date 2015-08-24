<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Como criar uma Loja Virtual com CakePHP</title>

    <!-- Bootstrap -->

    <?php
        echo $this->Html->css(array(
            'bootstrap.min',
            'http://fonts.googleapis.com/css?family=Roboto+Condensed:400italic,700italic,400,700',
            'style'
        ));
    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header>
        <section class="container">
            <div class="row linha-1">
                <div class="col-lg-4">
                    <?php
                        $img = $this->Html->image(
                            'logo.png',
                            array(
                                'alt'=>'Como criar uma Loja Virtual com CakePHP',
                            )
                        );
                        echo $this->Html->link(
                            $img,
                            '/',
                            array(
                                'escape'=>false,'class'=>'img-anima'
                            )
                        );
                    ?>
                </div>
                <div class="col-lg-8 text-right">
                    <nav class="horizontal">
                        <ul>
                            <li><a href="/loja/">Home</a></li>
                            <li><a href="/loja/pages/sobrenos">Sobre nós</a></li>
                                <li><a href="/loja/cliente/login">Login</a></li>
                            <li><a href="/loja/cliente/cadastra">Cadastra</a></li>
                                <li><a href="/loja/pages/suporte">Suporte</a></li>
                            <li><a href="/loja/pages/contato">Contato</a></li>
                        </ul> 
                    </nav>
                </div>
            </div>
        </section>
        <div class="linha-2">
            <div class="container-borda">
                <section class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                $img = $this->Html->image(
                                    'slide.jpg'
                                );
                                echo $this->Html->link(
                                    $img,
                                    'http://blog.erikfigueiredo.com.br/treinamento-como-criar-uma-loja-virtual-com-cakephp/',
                                    array(
                                        'escape'=>false
                                    )
                                );
                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </header>
    
    <main>
        <div id="conteudo" class="container-borda">
            <section class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h3>DEPARTAMENTOS</h3>
                            <nav class="vertical">
                                <ul>
                                            <li>
                                        <a href="/loja/camisetas-masculinas">Camisetas masculinas</a>        </li>
                                            <li>
                                        <a href="/loja/camisetas-femininas">Camisetas femininas</a>        </li>
                                            <li>
                                        <a href="/loja/camisetas-comemorativas">Camisetas comemorativas</a>        </li>
                                            <li>
                                        <a href="/loja/camisetas-engracada">Camisetas engraçada</a>        </li>
                                            <li>
                                        <a href="/loja/bermudas">Bermudas</a>        </li>
                                        </ul>
                            </nav>
                            <p style="margin-top:20px;">
                                <?php
                                    $img = $this->Html->image(
                                        'banner-entrega.jpg'
                                    );
                                    echo $this->Html->link(
                                        $img,
                                        'http://blog.erikfigueiredo.com.br/treinamento-como-criar-uma-loja-virtual-com-cakephp/',
                                        array(
                                            'escape'=>false
                                        )
                                    );
                                ?>
                            </p>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $this->fetch('content'); ?>
                        <?php
                            echo $this->Html->image(
                                'banner-aviso.jpg'
                            );
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </main>
    
    <footer>
        <section class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <small>Criado com CakePHP por <a href="http://blog.erikfigueiredo.com.br" target="_blank">Erik Figueiredo</a> - Use a vontade</small>
                </div>
            </div>
        </section>
    </footer>
    
    <?php //echo $this->element('lojas/carrinho'); ?>

    <?php
        echo $this->Html->scriptBlock('
            base_url = "'.$this->webroot.'";
        ');
        echo $this->Html->script(array(
            'https://code.jquery.com/jquery.js',
            'bootstrap.min',
            'jquery.easyui.min',
            'style'
        ));
    ?>

  </body>
</html>
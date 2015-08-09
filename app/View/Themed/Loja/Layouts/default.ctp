<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja virtual CakePhp</title>

    <!-- Bootstrap -->
    
    <?php echo $this->Html->css(array(
        'bootstrap.min.css',
        'style.css',
        'http://fonts.googleapis.com/css?family=Roboto+Condensed:400italic,700italic,400,700'
    )); ?>

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
                    $img = $this->Html->image('logo.png', array('alt'=>'Como criar uma loja virtual com CakePhp'));
                    echo $this->Html->link($img, '/', array('escape'=>false, 'class'=>'img-anima'));
                    ?>
                </div>
                <div class="col-lg-8 text-right">
                    <nav class="horizontal">
                          <?php echo $this->element('tema/menu_superior'); ?>
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
                                    '',
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
                        <h3>Departamentos</h3>
                            <?php echo $this->element('categorias/menu',array(),array('cache' => 'curto')); ?>
                            <p style="margin-top:20px;">
                            <?php 
                                $img = $this->Html->image(
                                    'banner-entrega.jpg'
                                );
                                echo $this->Html->link(
                                    $img,
                                    '',
                                    array(
                                        'escape'=>false
                                    )
                                );
                            ?>
                            </p>

                    </div>
                    <div class="col-lg-9">
                    <?php 
                    echo $this->fetch('content');
                        $img = $this->Html->image(
                            'banner-aviso.jpg'
                        );
                        echo $this->Html->link(
                            $img,
                            '',
                            array(
                                'escape'=>false
                            )
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
                    <small>Copyright  @Victor Gazotti</small>
                </div>
            </div>
        </section>
    </footer>
    

    <?php 
    echo $this->Html->scriptBlock('base_url = "'.$this->webroot.'";');
    echo $this->Html->script(array(
        'https://code.jquery.com/jquery.js',
        'bootstrap.min',
        'jquery.easyui.min', 
        'style'
    ));
    ?>
    
  </body>
</html>
<?php 
    $menu = $this->requestAction('categorias/menu');
?>
<nav class="vertical">
    <ul>
        <?php
            foreach($menu as $slug => $titulo){
                echo '<li>'. $this->Html->link($titulo,'/categoria/'.$slug).
                     '</li>';
            }
        
        ?>        
    </ul>
</nav>
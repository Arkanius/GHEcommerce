<?php 
echo '<h3>Em destaque</h3>';
    echo $this->element('produtos/grid', array('action' => 'destaque', 'qtd' => 6)/*, array('cache' => 'curto')*/);
echo '<h3>Mais vendidos</h3>';
    echo $this->element('produtos/grid', array('action' => 'maisVendidos', 'qtd' => 6)/*, array('cache' => 'curto')*/);
echo '<h3>Lançamentos</h3>';
    echo $this->element('produtos/grid', array('action' => 'novos', 'qtd' => 6)/*, array('cache' => 'curto')*/);

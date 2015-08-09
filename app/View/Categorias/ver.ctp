
<?php 
echo '<h3>'.$categoria['Categoria']['titulo'].'</h3><hr>';
echo $this->element('produtos/grid', array('produtos' => $categoria['Produto']));
?>


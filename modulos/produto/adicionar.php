<?php
if(isset($_POST['botao']) && $_POST['botao'] == "Salvar"){
    include("classes/Produto.class.php");
    include("classes/DB.class.php");

    $produto = new Produto();
    $produto->setDescricao($_POST['descricao']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->adicionar();   

}
?>

<h1>ADICIONAR Produto</h1>

<form method="post" action="">
Descrição do Produto: <input type='text' name='descricao'> <br/>
Preço do Produto: <input type='text' name='preco'><br/>
Quantidade do Produto: <input type='text' name='quantidade'><br/>
<input type='submit' name='botao' value="Salvar">
</form>


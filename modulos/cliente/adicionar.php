<?php

include("classes/Cliente.class.php");
include("classes/DB.class.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $cliente = new Cliente($id);

}else {
    $cliente = new Cliente();
}

if (isset($_POST['botao'])) {

    if (!isset($_GET['id'])) {
        $cliente->setNome($_POST['nome']);
        $cliente->setEmail($_POST['email']);
        $cliente->adicionar();
    } else{

    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);
    $cliente->atualizar();
    }
}
?>


<h1>ADICIONAR CLIENTE</h1>

<form method="post" action="">
    Nome do Cliente: <input type='text' name='nome' value="<?php echo $cliente->getNome() ?? '';?>"> <br/>
    Email do Cliente: <input type='text' name='email'  value="<?php echo $cliente->getEmail() ?? '';?>"><br/>
    <input type='submit' name='botao' value="Salvar">
</form>

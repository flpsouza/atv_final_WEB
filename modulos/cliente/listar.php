<?php
include("classes/Cliente.class.php");
include("classes/DB.class.php");
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    (new Cliente($id))->excluir();

}
?>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
    </tr>

    <?php
    $clientes = Cliente::listar();
    if ($clientes) {
        foreach ($clientes as $cliente) {
            ?>
            <tr>
                <td><?php echo $cliente->getId(); ?></td>
                <td><?php echo $cliente->getNome(); ?></td>
                <td><?php echo $cliente->getEmail(); ?></td>
                <td><a href="<?php echo "?modulo=cliente&acao=listar&id=" . $cliente->getId(); ?>"
                       class="btn btn-primary"> Apagar </a></td>
                <td><a href="<?php echo "?modulo=cliente&acao=adicionar&id=" . $cliente->getId(); ?>"
                       class="btn btn-primary"> Editar </a></td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='3'> Nenhum Registro Encontrado.</td></tr>";
    }
    ?>
</table>
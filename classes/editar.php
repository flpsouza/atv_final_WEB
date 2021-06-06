<?php
$idgrupo = $_GET['id_grupo'];
$modulos = Modulo::listar();
if ($modulos) {
    foreach ($modulos as $modulo) {
        echo "<h3>" . $modulo->getDescricao() . "</h3>";
    }
}

class Editar
{
    public static function listar()
    {
        $sql = "SELECT * FROM tabela_permissao";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();
        if ($registros) {
            $itens = array();
            foreach ($registros as $objeto) {
                $temporario = new Permissao();
                $temporario->setid($objeto['$id_permisao']);
                $temporario->setDescricao($objeto['descricao']);
                $temporario->setAcao($objeto['acao']);
                $itens[] = $temporario;
            }
            return $itens;
        }
        return false;

    }
}

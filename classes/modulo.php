<?php

class Modulo
{
    public static function listar()
    {
        $sql = "SELECT * FROM tabela_modulos";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();
        if ($registros) {
            foreach ($registros as $objeto) {
                $temporario = new Modulo();
                $temporario->setid($objeto['$id_modulo']);
                $temporario->setDescricao($objeto['descricao']);
                $temporario->setDiretorio($objeto['diretorio']);
                $itens[] = $temporario;
            }
            return $itens;
        }
        return false;
        foreach ($modulos as $modulo) {
            $permissao=Permissao::listar();
            if ($permissao){
                foreach ($permissoes as $permissao){
                }
            }
        }
    }
}
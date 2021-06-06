<?php

class Permissao
{
    public function verificarPermissao($id_grupo, $id_modulo, $id_acao)
    {
        $sql = "SELECT * FROM tabela_operacao INNER JOIN tabela_modulos 
    ON tablela_modulos.id_modulos=tabela_operacao.fk_id_permissao WHERE tabela_modulos.diretorio = '$id_modulo'
    AND tabela_permissao.acao = '$id_acao' AND tebela_operacao.fk_id_grupo = '$id_grupo' ";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $rg = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($rg) {
            return true;
        }
        return false;
        foreach ($modulos as $modulo) {
            $permissao = Permissao::listar();
            if ($permissao) {
                foreach ($permissoes as $permissao) {

                }
            }
        }
        if (isset($_POST['atualizarPermissao']) && $_POST['atualizarPermissao'] == 'salvar') {
            $listarPermissao = $_POST['listarPermissao'];
            foreach ($listarPermissao as $itemPermissao) {
                $item = explode('-', $itemPermissao);
                $id_grupo = $item[0];
                $modulo = $item[1];
                $permissao = $item[2];

                $add = new Operacao();
                $add->setfk_id_grupo($grupo);
                $add->setfk_id_modulo($modulo);
                $add->setfk_id_permissao($permissao);
                $add->adicinar();
            }
        }
    }
}



<?php

class adicionar
{
    public function adicionar()
    {
        $sql = "INSERT INTO tabela_operacao(fk_id_grupo, fk_id_modulo, fk_id_permissao) 
        values (:fk_id_grupo, :fk_id_modulo, :fk_id_permissao)";

        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':fk_id_grupo', $this->fk_id_grupo);
        $stmt->bindParam(':fk_id_modulo', $this->fk_id_modulo);
        $stmt->bindParam(':fk_id_permissao', $this->fk_id_permisao);
        $stmt->execute();
        return $conexao->lastInsertId();
    }
}
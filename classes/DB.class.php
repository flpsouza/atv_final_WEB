<?php

class DB
{
    public static $conexao;

    public static function conexao(): PDO
    {
        if (!isset(self::$conexao)) {
            try {
                self::$conexao = new PDO('sqlite:database.sqlite');
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Atenção' . $e->getMessage();
            }
        }

        return self::$conexao;
    }
}
<?php

class Cliente
{
    private $nome;
    private $email;
    private $id;

    public function __construct($id = false)
    {
        if ($id) {
            $sql = "SELECT * FROM cliente where id = :id";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            foreach ($stmt as $registro) {
                $this->setId($registro['id']);
                $this->setNome($registro['nome']);
                $this->setEmail($registro['email']);
            }
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function listar()
    {
        $sql = "SELECT * FROM cliente";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();
        if ($registros) {
            $itens = array();
            foreach ($registros as $registro) {
                $temporario = new Cliente();
                $temporario->setId($registro['id']);
                $temporario->setNome($registro['nome']);
                $temporario->setEmail($registro['email']);
                $itens[] = $temporario;
            }
            return $itens;
        }
        return false;
    }

    public function adicionar()
    {


        $sql = "INSERT INTO cliente(nome, email) VALUES (:nome, :email)";

        try {
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function excluir()
    {
        if (isset($this->id)) {
            $sql = "DELETE FROM cliente WHERE id = $this->id";

            try {
                $stmt = DB::conexao()->prepare($sql);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }

    public function atualizar()
    {
        $sql = "UPDATE cliente SET nome ='". $this->nome."', email = '". $this->email. "' WHERE id = ".$this->id;

        try {
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

}

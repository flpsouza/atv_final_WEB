<?php

    class Produto{
        private $id;
        private $descricao;
        private $preco;
        private $quantidade;

        public function __construct($id = false){
            if($id){
                $sql = "SELECT * FROM produto where id_produto = :id";
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();
                
                foreach($stmt as $registro){
                    $this->setId($registro['id_produto']);
                    $this->setDescricao($registro['descricao']);
                    $this->setPreco($registro['preco']);
                    $this->setQuantidade($registro['quantidade']);
                }
            }
        }

        public function setId($id){
            $this->id =  $id;
        }

        public function setDescricao($descricao){
            $this->descricao =  $descricao;
        }

        public function setPreco($preco){
            $this->preco =  $preco;
        }

        public function setQuantidade($qnt){
            $this->quantidade =  $qnt;
        }

        public function getId(){
            return $this->id;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getPreco(){
            return $this->preco;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }

        public static function listar(){
            $sql = "SELECT * FROM produto";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();       
            $registros = $stmt->fetchAll();
            
            if($registros){
                $itens = array();
                foreach($registros as $registro){
                
                    $temporario = new Produto();
		            $temporario->setId($registro['id']);
                    $temporario->setDescricao($registro['descricao']);  
		            $temporario->setPreco($registro['preco']);            
		            $temporario->setQuantidade($registro['quantidade']);               
                		
                    $itens[] = $temporario;
                }    
	            return $itens;
            }
            return false;
        }

        public function adicionar(){
            
            $sql = "INSERT INTO produto(descricao, preco, quantidade) VALUES (:descricao, :preco, :quantidade)";
            
            try{
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':descricao', $this->descricao);
                $stmt->bindParam(':preco', $this->preco);
                $stmt->bindParam(':quantidade', $this->quantidade);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

    }
?>
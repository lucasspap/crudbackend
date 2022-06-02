<?php
 abstract class BancodeDados{

    const host = 'localhost';
    const dbname = 'crud';
    const user = 'root';
    const password = '';

    static function conectar(){  
        try {
           $pdo = new PDO("mysql:
           host=".self::host.";
           dbname=".self::dbname.";
           charset=utf8",
           self::user,
           self::password);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           return $pdo;


        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
        }
     }

 }

abstract class Cadastrar{           //cadastrar dados no sql
    static function Cliente($nome, $email, $celular){
        try {
            $conexao = BancodeDados::conectar();
            $incluir = $conexao->prepare('INSERT INTO cliente (nome,email,celular) VALUES (:nome,:email,:celular)');
            $incluir->bindValue(':nome',$nome);
            $incluir->bindValue(':email',$email);
            $incluir->bindValue(':celular',$celular);
            $incluir->execute();
            
            return $incluir;

        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
        }
    }
 }

abstract class Lista{
    static function Clientes(){
        try {
            $conexao= BancodeDados::conectar();
            $lista = $conexao->prepare('SELECT * FROM cliente');
            $lista->execute();
            $lista = $lista->fetchAll(PDO::FETCH_OBJ);

            return $lista;

        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
        }
    }

    static function UmCliente($id){
        try {
            $conexao= BancodeDados::conectar();
            $lista = $conexao->prepare('SELECT * FROM cliente WHERE id = :id');
            $lista->bindValue(':id',$id);
            $lista->execute();
            $lista = $lista->fetch(PDO::FETCH_OBJ);

            return $lista;

        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
        }
     }
}

abstract class Edicao{
    static function Cliente($id,$nome,$email,$celular){
        try {
            $conexao= BancodeDados::conectar();
            $alterar = $conexao->prepare("UPDATE cliente SET nome = :nome, email = :email, celular = :celular WHERE id = :id;");
            $alterar->bindValue(':id',$id);
            $alterar->bindValue(':nome',$nome);
            $alterar->bindValue(':email',$email);
            $alterar->bindValue(':celular',$celular);
            $alterar->execute();

            return $alterar;
            

        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
        }
    }
}

abstract class Deletar{
    static function Cliente($id){
        try {
            $conexao= BancodeDados::conectar();
            $lista = $conexao->prepare('DELETE FROM cliente WHERE id = :id');
            $lista->bindValue(':id',$id);
            $lista->execute();

        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
        }
    }
}

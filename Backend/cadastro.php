<?php 

    require 'classe.php';
    
    if(isset($_POST['nome'],$_POST['email'],$_POST['celular'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $cadastro = Cadastrar::Cliente($nome,$email,$celular);
        if ($cadastro){
            header("Location: clientes.php");
        }else{
            header("Location: index.php");
        }
    }
    else{
        header("Location: index.php");
    }
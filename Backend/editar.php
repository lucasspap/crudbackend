<?php 

    require 'classe.php';
    
    if(isset($_POST['id'],$_POST['nome'],$_POST['email'],$_POST['celular'])){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $cadastro = Edicao::Cliente($id,$nome,$email,$celular);
        if ($cadastro){
            header("Location: clientes.php");
        }else{
            header("Location: index.php");
        }
    }
    else{
        header("Location: index.php");
    }
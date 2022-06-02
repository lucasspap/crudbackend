<?php 

    require 'classe.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $deleta = Deletar::Cliente($id);
        if ($deleta){
            header("Location: clientes.php");
        }else{
            header("Location: clientes.php");
        }
    }
    else{
        header("Location: clientes.php");
    }
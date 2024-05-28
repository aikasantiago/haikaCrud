<?php
if(isset($_POST['submit'])){
if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    $usuario = $_POST['usuario']; 
    $senha = $_POST['senha']; 


    require '../conexao.php';  
    $sql = "INSERT INTO cadastro(usuario,senha) VALUES(:usuario,:senha)";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue("usuario",$usuario);
    $resultado->bindValue("senha",$senha);
    $resultado->execute();
    header('location:../formEntrar.php?success=ok');
    }
}
<?php
if(isset($_POST['submit'])){
    if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){
        $usuario = $_POST['usuario']; 
        $senha = $_POST['senha']; 

        session_start();
        require '../conexao.php';  
        $sql = "SELECT * FROM cadastro WHERE usuario = :usuario && senha = :senha";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue("usuario",$usuario);
        $resultado->bindValue("senha",$senha);
        $resultado->execute();


        if($resultado->rowCount() > 0){
            $recebeDado = $resultado ->fetch();
            $_SESSION["id"] = $recebeDado["id"];
            header('location:../inicio.php');
        } else {
            header('location:../formEntrar.php?error=error');
        } 
    } else {
        header('location:../formEntrar.php?error=emBranco');
    }
}

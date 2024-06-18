<?php
if(isset($_POST['submit'])){
    if(isset($_POST['nome_categoria']) && !empty($_POST['nome_categoria'])){

        require '../conexao.php';

        $nome_categoria = $_POST['nome_categoria'];

        $sql = "INSERT INTO table_categoria(nome_categoria) VALUES (:nome_categoria)";
        $resultado = $conn->prepare($sql);

        
        $resultado->bindValue(":nome_categoria", $nome_categoria);
        $resultado->execute();

        header("Location: ../categorias.php?nome_categoria=$nome_categoria&sucesso=ok");
        exit(); 
    }
}
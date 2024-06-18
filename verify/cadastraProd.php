<?php
if(isset($_POST['submit'])){
    if(isset($_POST['nome_produto']) && !empty($_POST['nome_produto']) && isset($_POST['quantidade']) && !empty($_POST['quantidade']) && isset($_POST['valor']) && !empty($_POST['valor']) && isset($_POST['categoria']) && !empty($_POST['categoria'])){

        require '../conexao.php';

        $nome_produto = $_POST['nome_produto'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $categoria = $_POST['categoria'];


        $sql = "INSERT INTO table_estoque(nome_produto, quantidade, valor, categoria) VALUES (:nome_produto, :quantidade, :valor, :categoria)";
        $resultado = $conn->prepare($sql);

        
        $resultado->bindValue(":nome_produto", $nome_produto);
        $resultado->bindValue(":quantidade", $quantidade);
        $resultado->bindValue(":valor", $valor);
        $resultado->bindValue(":categoria", $categoria);
        $resultado->execute();

        header("Location: ../meuEstoque.php?nome_produto=$nome_produto&sucesso=ok");
        exit(); 
    }
}
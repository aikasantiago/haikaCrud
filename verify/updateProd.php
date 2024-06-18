<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['nome_produto']) && isset($_POST['id_produto']) && !empty($_POST['nome_produto']) && isset($_POST['quantidade']) && !empty($_POST['quantidade']) && isset($_POST['valor']) && !empty($_POST['valor']) && isset($_POST['categoria']) && !empty($_POST['categoria'])) {

        require '../conexao.php';

        $id_produto = $_POST['id_produto'];
        $nome_produto = $_POST['nome_produto'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $categoria = $_POST['categoria'];


        $sql = "UPDATE table_estoque SET nome_produto=:nome_produto, quantidade=:quantidade, valor=:valor, categoria=:categoria WHERE id_produto=:id_produto";
        $resultado = $conn->prepare($sql);


        $resultado->bindValue(":nome_produto", $nome_produto);
        $resultado->bindValue(":id_produto", $id_produto);
        $resultado->bindValue(":quantidade", $quantidade);
        $resultado->bindValue(":valor", $valor);
        $resultado->bindValue(":categoria", $categoria);
        $resultado->execute();

        header("Location: ../meuEstoque.php?nome_produto=$nome_produto&editado");
        exit();
    }
}

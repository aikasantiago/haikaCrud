<?php
if(isset($_POST['excluir'])){
    if(isset($_POST['id_produto']) && isset($_POST['nome_produto'])){
        require '../conexao.php';

        $id_produto = $_POST['id_produto'];
        $nome_produto = $_POST['nome_produto'];


        $sql = "DELETE FROM table_estoque WHERE id_produto = :id_produto";
        $resultado = $conn -> prepare($sql);
        $resultado -> bindValue(":id_produto", $id_produto);
        $resultado -> execute();
        header("Location: ../meuEstoque.php?sucess=ok");
    }
}

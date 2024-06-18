<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['nome_categoria']) && isset($_POST['id_categoria']) && !empty($_POST['nome_categoria'])) {

        require '../conexao.php';

        $id_categoria = $_POST['id_categoria'];
        $nome_categoria = $_POST['nome_categoria'];


        $sql = "UPDATE table_categoria SET nome_categoria=:nome_categoria WHERE id_categoria=:id_categoria";
        $resultado = $conn->prepare($sql);


        $resultado->bindValue(":nome_categoria", $nome_categoria);
        $resultado->bindValue(":id_categoria", $id_categoria);
        $resultado->execute();

        header("Location: ../categorias.php?nome_categoria=$nome_categoria&editado");
        exit();
    }
}

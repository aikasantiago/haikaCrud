<?php
if(isset($_POST['excluir'])){
    if(isset($_POST['id_categoria']) && isset($_POST['nome_categoria'])){
        require '../conexao.php';

        $id_categoria = $_POST['id_categoria'];
        $nome_categoria = $_POST['nome_categoria'];


        $sql = "DELETE FROM table_categoria WHERE id_categoria = :id_categoria";
        $resultado = $conn -> prepare($sql);
        $resultado -> bindValue(":id_categoria", $id_categoria);
        $resultado -> execute();
        header("Location: ../categorias.php?sucess=ok");
    }
}

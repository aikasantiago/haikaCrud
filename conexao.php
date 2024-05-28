<?php
    // conexão
    $servername = "localhost";
    $user = "root";
    $password = "";
    try{
        $conn = new PDO("mysql:host=$servername; dbname=moveis_crud", $user, $password);
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    
    }catch(PDOException $erro){
        echo "Não deu certo" . $erro->getMessage();
    }

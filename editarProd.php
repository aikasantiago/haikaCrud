<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['id'])) {
    header('location:formEntrar.php');
    exit();
}


$sql = "SELECT * FROM table_estoque";
$resultado = $conn->prepare($sql);
$resultado->execute();
$table_estoque = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="alterations.css">
</head>

<body class="bg-indigo-950 flex items-center justify-center min-h-screen">
    <section class="bg-white dark:bg-indigo-900 shadow-lg rounded-lg p-8 w-full max-w-2xl">
        <h2 class="mb-6 text-2xl font-bold text-indigo-900 dark:text-indigo-50 text-center">Editar produto</h2>




        <?php
            if(!isset($_POST["id_produto"])) {
                header("Location: ../meuEstoque.php");
            }
            $id_produto = $_POST['id_produto'];
        
            $sql = "SELECT * FROM table_estoque WHERE id_produto = :id_produto";
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":id_produto", $id_produto);
            $resultado->execute();
            $produto = $resultado->fetch(PDO:: FETCH_ASSOC);
        ?>
        <form action="verify/updateProd.php" method="POST">
            
            <div class="grid gap-6 sm:grid-cols-2">
            <input type="hidden" value="<?php echo $produto['id_produto'];?>" name="id_produto" id="id_produto">
            
                <div class="sm:col-span-2">
                    
                    <label for="nome_produto" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-indigo-50">Nome do produto</label>
                    <input type="text" value="<?php echo $produto['nome_produto'];?>" name="nome_produto" id="nome_produto" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-indigo-700 dark:border-indigo-600 dark:placeholder-indigo-400 dark:text-indigo-50 dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Digite o nome do produto" required="">
                </div>

                <div class="w-full">
                    <label for="valor" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-indigo-50">Valor (em Reais)</label>
                    <input type="number" name="valor" value="<?php echo $produto['valor'];?>" id="valor" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-indigo-700 dark:border-indigo-600 dark:placeholder-indigo-400 dark:text-indigo-50 dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Ex: R$2999" required="">
                </div>
                <div class="w-full">
                    <label for="categoria" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-indigo-50">Categoria</label>
                    <select id="categoria" name="categoria" value="<?php echo $produto['categoria'];?>" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-indigo-700 dark:border-indigo-600 dark:placeholder-indigo-400 dark:text-indigo-50 dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                        <option selected="">Selecione a categoria</option>
                        <option>Sofás</option>
                        <option>Eletrônicos</option>
                        <option>Eletrodomésticos</option>
                        <option>Cama</option>
                        <option>Guarda-roupas</option>
                        <option>Armários</option>
                        <option>Mesas</option>
                        <option>Penteadeiras</option>
                    </select>
                </div>

                <div class="w-full">
                    <label for="quantidade"  class="block mb-2 text-sm font-medium text-indigo-900 dark:text-indigo-50">Quantidade</label>
                    <input type="number" value="<?php echo $produto['quantidade'];?>" name="quantidade" id="quantidade" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-indigo-700 dark:border-indigo-600 dark:placeholder-indigo-400 dark:text-indigo-50 dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Ex: 2" required="">
                </div>

                <div class="w-full flex items-end">
                    <button type="submit" id="submit" name="submit" class="w-full inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-center text-white bg-indigo-600 rounded-lg focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-900 hover:bg-indigo-500 mr-4">
                        Concluir
                    </button>
                    <button type="submit" id="submit" name="submit" class="w-full inline-flex border border-indigo-700 items-center justify-center px-5 py-2.5 text-sm font-medium text-center text-indigo-300 bg-indigo-800 rounded-lg focus:ring-4 focus:ring-indigo-200  dark:focus:ring-indigo-800 dark:hover:bg-indigo-600 dark:hover:text-white dark:focus:ring-indigo-800">
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </section>
</body>

</html>
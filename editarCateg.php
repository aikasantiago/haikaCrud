<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['id'])) {
    header('location:formEntrar.php');
    exit();
}

$sql = "SELECT * FROM table_categoria";
$resultado = $conn->prepare($sql);
$resultado->execute();
$table_categoria = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="alterations.css">
</head>

<body class="bg-indigo-950 flex items-center justify-center min-h-screen">
    <section class="bg-white dark:bg-indigo-900 shadow-lg rounded-lg p-8 w-full max-w-2xl">
        <h2 class="mb-6 text-2xl font-bold text-indigo-900 dark:text-indigo-50 text-center">Editar Categoria</h2>

        <?php
        if (!isset($_POST["id_categoria"])) {
            header("Location: ../categorias.php");
            exit();
        }
        $id_categoria = $_POST['id_categoria'];

        $sql = "SELECT * FROM table_categoria WHERE id_categoria = :id_categoria";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":id_categoria", $id_categoria);
        $resultado->execute();
        $categoria = $resultado->fetch(PDO::FETCH_ASSOC);
        ?>
        <form action="verify/updateCateg.php" method="POST">
            <div class="grid gap-6 sm:grid-cols-1">
                <input type="hidden" value="<?php echo $categoria['id_categoria']; ?>" name="id_categoria" id="id_categoria">

                <div class="mb-2">
                    <label id="nome_categoria" for="nome_categoria" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-indigo-300">Categoria</label>
                    <select id="nome_categoria" name="nome_categoria" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3.5 dark:bg-indigo-800 dark:border-indigo-600 dark:placeholder-indigo-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                        <?php
                        $sql = "SELECT * FROM table_categoria;";
                        $resultado = $conn->prepare($sql);
                        $resultado->execute();
                        $table_categoria = $resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($table_categoria as $categoria) {
                            echo "<option value=" . $categoria["id_categoria"] . ">" .  $categoria["nome_categoria"] . "</option>";
                        }
                        ?>
                    </select>

                </div>

                <div class="w-full flex justify-between">
                    <button type="submit" id="submit" name="submit" class="w-1/2 inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-center text-white bg-indigo-600 rounded-lg focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-900 hover:bg-indigo-500 mr-2">
                        Concluir
                    </button>
                    
                        <a href="categorias.php" id="cancel" name="cancel" class="w-1/2 inline-flex border border-indigo-700 items-center justify-center px-5 py-2.5 text-sm font-medium text-center text-indigo-600 bg-white rounded-lg focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-900 hover:bg-indigo-50 dark:bg-indigo-800 dark:hover:bg-indigo-600 dark:text-white dark:hover:text-white">
                            Cancelar
                        </a>
                    
                </div>
            </div>
        </form>
    </section>
</body>

</html>
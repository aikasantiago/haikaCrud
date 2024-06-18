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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque de Móveis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="alterations.css">
</head>

<body class="bg-indigo-950 rounded-lg">



    <!-- NAVBAR -->
    <nav class="relative bg-indigo-50 border-indigo-200 dark:bg-indigo-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-1 py-4">
            <div id="logo" class="">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="images/trabalhador-carregando-caixas.png" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-indigo-50">CDEM</span>
                </a>
            </div>
            <div class=" hidden md:flex md:items-center md:w-auto mx-auto" id="navbar-user">
                <ul class="flex flex-col font-medium text-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-indigo-50 dark:bg-indigo-800 md:dark:bg-indigo-900">
                    <li>
                        <a href="index.php" class="block py-2 px-3 text-indigo-900 rounded hover:bg-indigo-100 md:hover:bg-transparent md:hover:text-indigo-700 md:p-0 dark:text-indigo-50 md:dark:hover:text-indigo-400 dark:hover:bg-indigo-700 dark:hover:text-indigo-50 md:dark:hover:bg-transparent">Home</a>
                    </li>
                    <li>
                        <a href="meuEstoque.php" class="block py-2 px-3 text-indigo-50 bg-indigo-700 rounded md:bg-transparent md:text-indigo-700 md:p-0 md:dark:text-indigo-400" aria-current="page">Meu estoque</a>
                    </li>
                    <li>
                        <a href="categorias.php" class="block py-2 px-3 text-indigo-900 rounded hover:bg-indigo-100 md:hover:bg-transparent md:hover:text-indigo-700 md:p-0 dark:text-indigo-50 md:dark:hover:text-indigo-400 dark:hover:bg-indigo-700 dark:hover:text-indigo-50 md:dark:hover:bg-transparent">Categorias</a>
                    </li>
                    <li>
                        <a href="sobre.php" class="block py-2 px-3 text-indigo-900 rounded hover:bg-indigo-100 md:hover:bg-transparent md:hover:text-indigo-700 md:p-0 dark:text-indigo-50 md:dark:hover:text-indigo-400 dark:hover:bg-indigo-700 dark:hover:text-indigo-50 md:dark:hover:bg-transparent">Sobre</a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                <button type="button" class="flex text-sm bg-indigo-800 rounded-full focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="images/avatar.png" alt="User avatar">
                </button>
                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-indigo-500 rounded-lg md:hidden hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-200 dark:text-indigo-400 dark:hover:bg-indigo-700 dark:focus:ring-indigo-600" aria-controls="navbar-user" aria-expanded="false" id="hamburger-menu-button">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <!-- Hamburger menu -->
            <div class="absolute right-0 mt-2 mr-4  top-full z-50 hidden w-48 text-base list-none bg-indigo-50 divide-y divide-indigo-100 rounded-lg shadow dark:bg-indigo-800 dark:divide-indigo-700" id="hamburger-menu">
                <ul class="py-2">
                    <li>
                        <a href="index.php" class="block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100 dark:hover:bg-indigo-700 dark:text-indigo-200 dark:hover:text-indigo-50">Home</a>
                    </li>
                    <li>
                        <a href="meuEstoque.php" class="block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100 dark:hover:bg-indigo-700 dark:text-indigo-200 dark:hover:text-indigo-50">Meu estoque
                        </a>
                    </li>
                    <li>
                        <a href="categorias.php" class="block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100 dark:hover:bg-indigo-700 dark:text-indigo-200 dark:hover:text-indigo-50">Categorias</a>
                    </li>
                    <li>
                        <a href="sobre.php" class="block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100 dark:hover:bg-indigo-700 dark:text-indigo-200 dark:hover:text-indigo-50">Sobre</a>
                    </li>
                </ul>
            </div>
            <!-- Dropdown menu -->
            <div class="absolute right-0 mt-2 mr-4  top-full z-50 hidden w-48 text-base list-none bg-indigo-50 divide-y divide-indigo-100 rounded-lg shadow dark:bg-indigo-800 dark:divide-indigo-700" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-indigo-900 dark:text-indigo-50" id="usuario">
                        <?php echo $_SESSION["usuario"]; ?>
                    </span>
                    <span class="block text-sm text-indigo-500 truncate dark:text-indigo-400">Administrador</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="verify/logout.php" class="block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100 dark:hover:bg-indigo-700 dark:text-indigo-200 dark:hover:text-indigo-50">Sair da conta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>






    <!-- TABELA -->
    <div id="tabelaEstoque" class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">


        <?php
        if (count($table_estoque) > 0) {
        ?>
            <div class="flex flex-col sm:flex-row md:justify-between mb-4">
                <h2 class="text-3xl font-medium leading-none tracking-tight text-indigo-900 md:text-4xl dark:text-indigo-200 mb-2 md:mb-0 sm:mb-4 sm:mr-4">Seu estoque</h2>
                <a href="#" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="flex items-center justify-center focus:outline-none text-indigo-50 bg-indigo-700 hover:bg-indigo-800 font-medium rounded-lg text-xs md:text-lg px-2 py-2 md:px-4 md:py-3 dark:bg-indigo-600 dark:hover:bg-indigo-500 dark:focus:ring-indigo-800 mt-4 sm:mt-0">
                    Adicionar
                </a>
            </div>



            <table class="w-full text-lg text-left rtl:text-right text-indigo-200 dark:text-indigo-200">
                <thead class="text-indigo-100 dark:bg-indigo-900">
                    <tr>
                        <th class="px-6 py-3">
                            ID do Produto
                        </th>
                        <th class="px-6 py-3">
                            Nome do Produto
                        </th>
                        <th class="px-6 py-3">
                            Quantidade
                        </th>
                        <th class="px-6 py-3">
                            Valor (em Reais)
                        </th>

                        <th class="px-6 py-3">
                            Categoria
                        </th>
                        <th class="px-6 py-3">
                            Ações
                        </th>
                    </tr>
                </thead>




                <tbody>
                    <?php
                    foreach ($table_estoque as $produto) {
                        echo '<tr class="bg-indigo-50 font-normal border-b dark:bg-indigo-950 dark:border-indigo-900">';
                        echo '<td scope="row" class="px-6 py-4 font-normal indigospace-nowrap dark:text-indigo-200">' . $produto['id_produto'] . '</td>';
                        echo '<td class="px-6 py-3">' . $produto['nome_produto'] . '</td>';
                        echo '<td class="px-6 py-3">' . $produto['quantidade'] . '</td>';
                        echo '<td class="px-6 py-3">' . $produto['valor'] . '</td>';
                        echo '<td class="px-6 py-3">' . $produto['categoria'] . '</td>';
                        echo '<td class="px-6 py-3">

                            <form action="editarProd.php" method="POST">
                                <input type="hidden" name="id_produto" id="id_produto" value="' . $produto['id_produto'] . '">
                                <button type="submit" class="focus:outline-none rounded-lg px-5 py-2.5 mb-2 dark:bg-indigo-950 transition ease-in-out delay-150 bg-indigo-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-950 duration-300">Editar</button>
                            </form>


                            <form action="verify/deleteProd.php" method="POST">
                                <input type="hidden" name="nome_produto" id="nome_produto" value="' . $produto['nome_produto'] . '">
                                <input type="hidden" name="id_produto" id="id_produto" value="' . $produto['id_produto'] . '">
                            <button  type="submit" name="excluir" id="excluir" class="focus:outline-none rounded-lg px-5 py-2.5 mb-2 dark:bg-indigo-950 transition ease-in-out delay-150 bg-indigo-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-950 duration-300">Excluir</button>
                            </form>
                            </td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
            echo '
            <div class="flex flex-col sm:flex-row md:justify-between mb-4">
            <h2 class="text-3xl font-medium leading-none tracking-tight text-indigo-900 md:text-4xl dark:text-indigo-200 mb-2 md:mb-0 sm:mb-4 sm:mr-4">Seu estoque</h2>
            <a href="#" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="flex items-center justify-center focus:outline-none text-indigo-50 bg-indigo-700 hover:bg-indigo-800 font-medium rounded-lg text-xs md:text-lg px-2 py-2 md:px-4 md:py-3 dark:bg-indigo-600 dark:hover:bg-indigo-500 dark:focus:ring-indigo-800 mt-4 sm:mt-0">
                    Adicionar
            </a>
        </div>
        <h1 class="flex justify-center mb-4 text-sm font-normal leading-none tracking-tight text-indigo-900 md:text-sm lg:text-2xl dark:text-indigo-100">Você ainda não possui nada cadastrado.';
        }
        ?>
    </div>













    <!-- MODAL ADICIONAR -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 hidden justify-center items-center bg-black bg-opacity-50">
        <div class="relative w-full max-w-2xl max-h-full">

            <div class="relative bg-indigo-50 rounded-lg shadow dark:bg-indigo-900">

                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-indigo-800">
                    <h3 class="text-xl font-semibold text-indigo-900 dark:text-indigo-50">
                        Adicionar produto
                    </h3>
                    <button type="button" class="text-indigo-400 bg-transparent hover:bg-indigo-200 hover:text-indigo-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-indigo-800 dark:hover:text-indigo-50" data-modal-hide="crud-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <form id="crud-form" method="POST" action="verify/cadastraProd.php">
                        <div class="mb-4">
                            <label id="nome_produto" for="nome" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-indigo-300">Nome do produto</label>
                            <input type="text" id="nome" name="nome_produto" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-indigo-800 dark:border-indigo-600 dark:placeholder-indigo-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Ex: Sofá Tailândia" required>
                        </div>
                        <div class="mb-4">
                            <label id="quantidade" for="quantidade" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-indigo-300">Quantidade</label>
                            <input type="number" id="quantidade" name="quantidade" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-indigo-800 dark:border-indigo-600 dark:placeholder-indigo-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Ex: 9"  required>
                        </div>
                        <div class="mb-4">
                            <label id="valor" for="valor" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-indigo-300">Valor (em Reais)</label>
                            <input type="number" id="valor" name="valor" step="0.01" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-indigo-800 dark:border-indigo-600 dark:placeholder-indigo-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Ex: R$2999" required>
                        </div>
                        <div class="mb-4">
                            <label id="categoria" for="categoria" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-indigo-300">Categoria</label>
                            <select id="categoria" name="categoria" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-indigo-800 dark:border-indigo-600 dark:placeholder-indigo-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                <option selected="">Selecione a categoria</option>
                                <?php
                                    $sql = "SELECT * FROM table_categoria;";
                                    $resultado = $conn->prepare($sql);
                                    $resultado->execute();
                                    $table_categoria = $resultado->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($table_categoria as $categoria) {
                                        echo "<option value=". $categoria["id_categoria"] . ">" .  $categoria["nome_categoria"] . "</option>";
                                    }
                                ?>
                            </select>
                            
                        </div>

                        <div class="flex justify-end">
                            <button name="submit" id="submit" type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800">Adicionar</button>
                            <button type="button" class="text-indigo-700 bg-white border border-indigo-300 hover:bg-indigo-100 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none dark:text-indigo-300 dark:bg-indigo-700 dark:border-indigo-600 dark:hover:bg-indigo-600 dark:hover:text-white dark:focus:ring-indigo-800" data-modal-hide="crud-modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>







            <script>
                const userMenuButton = document.getElementById('user-menu-button');
                const userDropdown = document.getElementById('user-dropdown');
                const hamburgerMenuButton = document.getElementById('hamburger-menu-button');
                const hamburgerMenu = document.getElementById('hamburger-menu');

                userMenuButton.addEventListener('click', () => {
                    userDropdown.classList.toggle('hidden');
                });

                hamburgerMenuButton.addEventListener('click', () => {
                    hamburgerMenu.classList.toggle('hidden');
                });


                
                document.addEventListener("DOMContentLoaded", function() {
                    const modal = document.getElementById("crud-modal");
                    const openModalButton = document.querySelector("[data-modal-target='crud-modal']");
                    const closeModalButtons = document.querySelectorAll("[data-modal-hide='crud-modal']");

                    openModalButton.addEventListener("click", function() {
                        modal.classList.remove("hidden");
                        modal.classList.add("flex");
                    });

                    closeModalButtons.forEach(button => {
                        button.addEventListener("click", function() {
                            modal.classList.add("hidden");
                            modal.classList.remove("flex");
                        });
                    });

                    modal.addEventListener("click", function(event) {
                        if (event.target === modal) {
                            modal.classList.add("hidden");
                            modal.classList.remove("flex");
                        }
                    });
                });
            </script>
</body>

</html>
<?php
session_start();
require 'conexao.php';
if (!isset($_SESSION['id'])) {
    header('location:formEntrar.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque de Móveis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="alterations.css">
</head>

<body class="bg-indigo-950 rounded-lg h-screen flex flex-col">
    <nav class="relative bg-indigo-50 border-indigo-200 dark:bg-indigo-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-1 py-4">
            <div id="logo" class="">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="images/trabalhador-carregando-caixas.png" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-indigo-50">CDEM</span>
                </a>
            </div>
            <div class="hidden md:flex md:items-center md:w-auto mx-auto" id="navbar-user">
                <ul class="flex flex-col font-medium text-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-indigo-50 dark:bg-indigo-800 md:dark:bg-indigo-900 justify-center">
                    <li>
                        <a href="index.php" class="block py-2 px-3 text-indigo-50 bg-indigo-700 rounded md:bg-transparent md:text-indigo-700 md:p-0 md:dark:text-indigo-400" aria-current="page">Início</a>
                    </li>
                    <li>
                        <a href="meuEstoque.php" class="block py-2 px-3 text-indigo-900 rounded hover:bg-indigo-100 md:hover:bg-transparent md:hover:text-indigo-700 md:p-0 dark:text-indigo-50 md:dark:hover:text-indigo-400 dark:hover:bg-indigo-700 dark:hover:text-indigo-50 md:dark:hover:bg-transparent">Meu estoque</a>

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
            <div class="absolute right-0 mt-2 mr-4 top-full z-50 hidden w-48 text-base list-none bg-indigo-50 divide-y divide-indigo-100 rounded-lg shadow dark:bg-indigo-800 dark:divide-indigo-700" id="hamburger-menu">
                <div class="">
                    <ul class="py-2 ">
                        <li>
                            <a href="index.php" class="block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100 dark:hover:bg-indigo-700 dark:text-indigo-200 dark:hover:text-indigo-50">Início</a>
                        </li>
                        <li>
                            <a href="meuEstoque.php" class="block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100 dark:hover:bg-indigo-700 dark:text-indigo-200 dark:hover:text-indigo-50">Meu estoque</a>
                        </li>
                        <li>
                            <a href="categorias.php" class="block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100 dark:hover:bg-indigo-700 dark:text-indigo-200 dark:hover:text-indigo-50">Categorias</a>
                        </li>
                        <li>
                            <a href="sobre.php" class="block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100 dark:hover:bg-indigo-700 dark:text-indigo-200 dark:hover:text-indigo-50">Sobre</a>
                        </li>
                    </ul>
                </div>
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

    <div id="texto" class="flex flex-col items-center justify-center flex-1 text-center mb-10">
        <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-indigo-900 md:text-5xl lg:text-5xl dark:text-indigo-100">Olá, <?php echo $_SESSION["usuario"]; ?>! Seja bem-vindo(a) ao CDEM! </h1>
        <p class="mb-6 text-lg font-normal text-indigo-500 lg:text-xl sm:px-16 xl:px-48 dark:text-indigo-600">Clicando no botão abaixo você terá acesso ao seu estoque.</p>
        <a href="meuEstoque.php" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-indigo-50 bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-900">
            Consultar estoque
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>







    <div id="relatorio" class="flex flex-col items-center justify-center mt-10 mb-8">
        <h2 class="text-3xl font-bold mb-4 text-center text-indigo-200 dark:text-indigo-200">Relatório</h2>
        <table class="w-full md:w-4/5 lg:w-3/5 xl:w-2/5 text-lg text-left rtl:text-right text-indigo-200 dark:text-indigo-200">
            <thead class="text-indigo-100 dark:bg-indigo-900">
                <tr>
                    <th class="px-6 py-3">
                        Categoria
                    </th>
                    <th class="px-6 py-3">
                        Total de Produtos
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $sql = "select * from relatorio where contIDcat = ( select count(c.id_categoria) as contIDcat from table_estoque as p join table_categoria as c on p.id_categoria = c.id_categoria group by c.id_categoria order by contIDcat desc limit 1);";
                    $resultado = $conn->prepare($sql);
                    $resultado->execute();
                    $table_estoque = $resultado->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($table_estoque as $relatorio) {
                        echo '<tr class="bg-indigo-50 font-normal border-b dark:bg-indigo-950 dark:border-indigo-900">';
                        echo '<td class="px-6 py-3">' . $relatorio['categoria'] . '</td>';
                        echo '<td class="px-6 py-3">' . $relatorio['contIDcat'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
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
    </script>
</body>

</html>
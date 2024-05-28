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
<body class="bg-indigo-950 rounded-lg">
    <nav class="bg-indigo-900">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-indigo-400 hover:bg-indigo-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                    <!--
                    Icon when menu is closed.
                    Menu open: "hidden", Menu closed: "block"
                    -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    <!--
                    Icon when menu is open.
                    Menu open: "block", Menu closed: "hidden"
                    -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="images/trabalhador-carregando-caixas.png" alt="Your Company">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="inicio.php" class="text-indigo-400 hover:bg-indigo-700 hover:text-indigo-100 rounded-md px-3 py-2 text-sm font-medium">Início</a>
                            <a href="meuEstoque.php" class="text-indigo-400 hover:bg-indigo-700 hover:text-indigo-100 rounded-md px-3 py-2 text-sm font-medium">Meu estoque</a>
                            <a href="inicio.php" class="bg-indigo-600 text-indigo-100 rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Categorias</a>
                            <a href="sobre.php" class="text-indigo-400 hover:bg-indigo-700 hover:text-indigo-100 rounded-md px-3 py-2 text-sm font-medium">Sobre</a>
                        </div>
                    </div>
                </div>

                <div class="absolute inset-y-0 right-0 flex items-center pr-2  sm:static sm:inset-auto sm:ml-6 sm:pr-0 ">
                <a class=" block font-medium py-2 text-sm text-indigo-200  hover:text-indigo-50" role="menuitem" tabindex="-1" id="user-menu-item-0">Administrador</a>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button" class="relative flex rounded-full bg-indigo-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:ring-offset-2 focus:ring-offset-indigo-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="images/do-utilizador.png" alt="">
                            </button>
                        </div>

                        <!-- Dropdown menu -->
                        <div class="absolute right-0 z-10 hidden mt-2 w-48 origin-top-right rounded-md bg-indigo-600 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" data-dropdown-toggle="dropdown" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-menu">
                            
                            <a href="#" class=" block px-4 py-2 text-sm text-indigo-200 hover:text-indigo-50 font-medium" role="menuitem" tabindex="-1" id="user-menu-item-0">Usuário</a>
                            <a href="verify/logout.php" class="block px-4 py-2 text-sm text-indigo-200 hover:text-indigo-50 font-medium " role="menuitem" tabindex="-1" id="user-menu-item-2">Sair da conta</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        
        
    </nav>
    <script>
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');
        userMenuButton.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

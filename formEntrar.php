<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formEntrar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="alterations.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body class= "bg-indigo-950 rounded-lg py-5">


    <div class="container flex flex-col mx-auto bg-indigo-950 rounded-lg pt-12 my-5">
        <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
            <div class="flex items-center justify-center w-full lg:p-12">
                <div class="flex items-center xl:p-10">
                    <form method="POST" action="verify/paraEntrar.php" class="flex flex-col w-full h-full pb-6 bg-indigo-950 rounded-3xl" data-parsley-validate>
                            <div class="min-h-28">
                                <h1 class="mb-3 text-4xl text-center font-bold text-indigo-300">Entrar</h1>
                                <h4 class="mb-3 text-center text-indigo-300">Insira seu nome de usuário e senha</h4>

                                <?php if(isset($_GET['success']) && $_GET['success'] == 'ok'){ ?>
                                <p class=" text-center text-green-500">Usuário cadastrado com sucesso!</p>
                                <?php } ?>

                                <?php if(isset($_GET['error']) && $_GET['error'] === 'error'){ ?>
                                <p class=" text-center text-red-500" role="alert">Login ou senha incorretos!</p>
                                <?php } ?>

                                <?php if(isset($_GET['error']) && $_GET['error'] === 'emBranco'){ ?>
                                <p class=" text-center text-red-500">Preencha os campos!</p>
                                <?php } ?>
                            </div>
                        <div id="entrada" class="mt-4">
                            <label for="usuario" class="mb-4 text-md text-start font-bold text-indigo-300">Nome de usuário</label>
                            <input id="usuario" name="usuario" type="text" placeholder="Insira seu nome" class="flex items-center h-16 w-full px-5 py-4 mb-0 mr-2 text-sm font-medium outline-none focus:bg-indigo-50 placeholder:text-indigo-300 bg-indigo-100 text-indigo-900 rounded-2xl " required>
                        </div>

                        <div id="entrada" class="mt-2">
                            <label for="senha" class="mb-4 text-md text-start font-bold text-indigo-300">Senha</label>
                            <input id="senha" name="senha" type="password"  placeholder="Insira sua senha" class="flex items-center h-16 w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-indigo-50 placeholder:text-indigo-300 bg-indigo-100 text-indigo-900 rounded-2xl" required>
                        </div>

                        <div class="flex pt-3 flex-row justify-between mb-5">
                            <label class="relative inline-flex items-center mr-3 cursor-pointer select-none">
                                <input type="checkbox" checked value="" class="sr-only peer">
                                <div class="w-5 h-5 bg-indigo-50 border-2 rounded-sm border-indigo-100 peer peer-checked:border-0 peer-checked:bg-indigo-800">
                                    <img class="" src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/icons/check.png" alt="tick">
                                </div>
                                <span class="ml-3  text-sm font-medium text-indigo-300">Lembre de mim</span>
                            </label>
                            
                        </div>

                        <button type="submit" name="submit" id="submit" class="h-16 w-full px-6 py-5 mb-6 text-md font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 bg-indigo-800">Entrar</button>

                        <div class="mt-3 flex items-center justify-between mb-6">
                            <hr class="h-0 border-b border-solid border-indigo-300 grow">
                            <p class="mx-4 font-semibold text-indigo-300"><output>OU</output></p>
                            <hr class="h-0 border-b border-solid border-indigo-300 grow ">
                        </div>

                        <a href="https://accounts.google.com/v3/signin/identifier?authuser=0&continue=https%3A%2F%2Fwww.google.com.br%2F%3Fhl%3Dpt-BR&ec=GAlAmgQ&hl=pt-BR&flowName=GlifWebSignIn&flowEntry=AddSession&dsh=S-83004277%3A1715079571447828&theme=mn&ddm=0" class="flex items-center justify-center h-16 w-full py-4 mb-6 text-sm font-medium transition duration-300 rounded-2xl  text-indigo-800 bg-indigo-100 hover:bg-indigo-50 focus:ring-4 focus:ring-indigo-950">
                            <img class="h-5 mr-2" src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/logos/logo-google.png" alt="">
                            Entrar com o google
                        </a>

                        

                        <p class="text-sm text-center leading-relaxed text-indigo-500">Não está registrado? <a href="formCadastro.php" class="font-bold text-center text-indigo-300">Crie uma conta</a>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./node_modules/jquery/dist/jquery.js"></script>
    <script src="./node_modules/parsleyjs/dist/parsley.min.js"></script>
    <script src="./node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
    <link rel="stylesheet" href="./node_modules/parsleyjs/src/parsley.css">
</body>
</html> 
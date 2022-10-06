<?php
include("verifica.php");
include("config.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../PHP/../IMAGE/Favicon.ico" type="image/x-icon">
    <title>Fitness Manager</title>
    <link rel="stylesheet" href="globalstyle.css">
</head>
<body>
    <!--INICIO DO HEADER-->
    <header class="top-container">
        <div class="logo">
            <img src="../IMAGE/Logo Fitness Manager Branca.png" alt="Fitness Manager Logo" style="width: 150px;">
        </div>
        <nav class="nav-right">
            <ul class="top-list">
                <li><a href="sair.php" onclick="return confirm('Deseja realmente sair?');">SAIR</a></li>
            </ul>
        </nav>
    </header>
    <!--FIM DO HEADER-->

    <!--INICIO DO MAIN-->
    <main class="mid-container">
        <div class="column2">
            <a href="instrutores.php" class="card card1">
                <div>
                    <h5>Funcionários</h5>
                    <p>Administre seus funcionários</p>
                </div>
            </a>
            <a href="alunosadm.php?tipo=1" class="card card2">
                <div>
                    <h5>Alunos</h5>
                    <p>Administre seus clientes</p>
                </div>
            </a>
            <a href="maquinasadm.php?tipo=1" class="card card3">
                <div>
                    <h5>Máquinas</h5>
                    <p>Administre seus equipamentos</p>
                </div>
            </a>
        </div>
    </main>
    <!--FIM DO MAIN-->

    <!--INICIO DO FOOTER-->
    <footer class="bot-container">
        <ul class="icons">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        </ul>
        <ul class="footer-list">
            <li><a href="#">Suporte</a></li>
            <li><a href="#">Termos de uso</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
        <p>Todos os direitos reservados - &copy;2021 FITNESS MANAGER</p>
    </footer>
    <!--FIM DO FOOTER-->

    <!--SCRIPT-->
    <script src="https://kit.fontawesome.com/6bdf5b89c1.js" crossorigin="anonymous"></script>
    <!--FIM DO SCRIPT-->
</body>
</html>
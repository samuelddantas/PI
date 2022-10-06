<?php
include("config.php");
$erro = 0;
if (isset($_POST['usuario'])) {
    extract($_POST);
    $consult = $conexao->query("select * from tb_funcionarios ");
    while ($resultad = $consult->fetch_assoc()) {
        $usuarioadm = $resultad['fun_melhoremail'];
        $senhaadm = $resultad['fun_senha'];
        if ($usuarioadm == $usuario && $senhaadm == $senha) {
            $_SESSION['codigo'] = 1;
            if ($resultad['fun_tipo'] == 1) {
                header("Location: iniciallogadm.php");
            } elseif ($resultad['fun_tipo'] == 2) {
                header("Location: iniciallog.php");
            }
        } else {
            $erro = 1;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../PHP/../IMAGE/Favicon.ico" type="image/x-icon">
    <title>Login</title>
    <link rel="stylesheet" href="../PHP/../CSS/globalstyle.css">
</head>
<body>
    <!--INICIO DO HEADER-->
    <header class="top-container">
        <div class="logo">
            <img src="../IMAGE/Logo Fitness Manager Branca.png" alt="Fitness Manager Logo" style="width: 150px;">
        </div>
        <nav class="nav-right">
            <ul class="top-list">
                <span>
                    <li id="back"><a href="index.php"><i class="fas fa-arrow-alt-circle-left" style="font-size: 42px; color: #fea303;"></i></i></a></li>
                </span>
            </ul>
        </nav>
    </header>
    <!--FIM DO HEADER-->

    <!--INICIO DO MAIN-->
    <main class="mid-container">
        <div class="second-container">
            <div class="login">
                <h2>Login</h2>
                <form action="login.php" method="POST">
                    <?php if ($erro == 1) echo "<span style='color:red'>Usuário ou senha inválidos</span>" ?><br>
                    <div class="input-field">
                        <input type="text" id="e-mail" name="usuario" placeholder="Digite seu e-mail">
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                        <div class="underline"></div>
                    </div>

                    <div class="center">
                        <a href="<?php ?>"><input type="submit" value="Entrar"></a>
                    </div>
                </form>
            </div>
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
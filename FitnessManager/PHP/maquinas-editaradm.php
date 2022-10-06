<?php
include("config.php");
include("verifica.php");

$codigo = $_GET['codigo'];
if (isset($_POST['conserv'])) {
    extract($_POST);
    if ($consulta2 = $conexao->query("update tb_avaliacaomaquinas set avm_estadodeconservacao = '$conserv' where avm_codigo = $codigo")) {
        header("Location: maquinasadm.php");
    } else {
        echo "Erro no cadastro";
    }
}

$consulta3 = $conexao->query("select * from tb_maquinas");
$consulta4 = $conexao->query("select * from tb_funcionarios");
$consulta5 = $conexao->query("select * from tb_avaliacaomaquinas join tb_maquinas on avm_maq_codigo = maq_codigo  where avm_codigo = $codigo");
$resultado5 = $consulta5->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../IMAGE/Favicon.ico" type="image/x-icon">
    <title>Cadastrar Máquina</title>
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
                <span id="back">
                    <li><a href="maquinasadm.php"><i class="fas fa-arrow-alt-circle-left" style="font-size: 42px; color: #fea303;"></i></i></a></li>
                </span>
            </ul>
        </nav>
    </header>
    <!--FIM DO HEADER-->

    <!--INICIO DO MAIN-->
    <main class="mid-container">
        <div class="second-container">
            <div class="cadastro">
                <h2>Editar Máquinas</h2>
                <form method="POST" action="?codigo=<?php echo $resultado5['avm_codigo']; ?>">

                    Nome:
                    <div class="input-field">
                        <?php $resultado3 = $consulta3->fetch_assoc(); ?>
                        <br><input type="text" value="<?php echo $resultado5['maq_nome']; ?>" disabled>
                        <div class="underline"></div>
                    </div>

                    Estado de Conservação:
                    <div class="custom-select">
                        <br><select name="conserv">
                            <option value=1>Nova</option>
                            <option value=2>Manutenção</option>
                            <option value=3>Quebrada</option>
                        </select> <br>
                    </div>
                    <input type="submit" value="Alterar">

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
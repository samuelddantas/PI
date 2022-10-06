<?php
include("config.php");
include("verifica.php");

if (isset($_GET['excluir'])) {
    $codigo = $_GET['excluir'];
    if ($consulta = $conexao->query("delete from tb_avaliacaomaquinas  where avm_codigo = $codigo ")) {
        header("Location: maquinas.php");
    } else {
        echo "Erro na exclusão";
    }
}
$consulta = $conexao->query("select * from tb_maquinas join tb_avaliacaomaquinas on maq_codigo = avm_maq_codigo
join tb_funcionarios on fun_codigo = avm_fun_codigo order by maq_codigo");
$consulta4 = $conexao->query("select * from tb_funcionarios");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../PHP/../IMAGE/Favicon.ico" type="image/x-icon">
    <title>Máquinas</title>
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
                <li><a href="iniciallogadm.php"><i class="fas fa-arrow-alt-circle-left" style="font-size: 42px; color: #fea303;"></i></i></a></li>
            </ul>
        </nav>
    </header>
    <!--FIM DO HEADER-->

    <!--INICIO DO MAIN-->
    <main class="mid-container">
        <section>
            <div class="column3">
                <div class="alunos">
                    <h2>Máquinas</h2>
                </div>
                <div class="acoes">
                    <a href="maquinas-novoadm.php"><button class="cliente">Nova Máquina</button></a>
                    <a href="maquinasadm.php"><button class="atualizar">Atualizar</button></a>
                </div>
            </div>
            <hr class="line">

            <div class="content">
                <table class="crud">
                    <thead>
                        <th>Código</th>
                        <th>Máquina</th>
                        <th>Estado de Conservação</th>
                        <th>Ações</th>
                        </tr>
                    </thead>
                    <tr>
                        <td colspan="4">
                            <hr class="linha">
                        </td>
                    </tr>
                    <tbody>
                        <?php while ($resultado = $consulta->fetch_assoc()) { ?>
                            <tr>
                                <td label="Código"><?php echo $resultado['maq_codigo']; ?></td>
                                <td label="Máquina"><?php echo $resultado['maq_nome']; ?></td>
                                <?php if ($resultado['avm_estadodeconservacao'] == 1) {
                                    $est = "Nova";
                                } elseif ($resultado['avm_estadodeconservacao'] == 2) {
                                    $est = "Manutenção";
                                } elseif ($resultado['avm_estadodeconservacao'] == 3) {
                                    $est = "Quebrada";
                                } ?>
                                <td label="Conservação"><?php echo $est ?></td>
                                <td> &nbsp;
                                    <a href="maquinas-editaradm.php?codigo=<?php echo $resultado['avm_codigo']; ?>"><button class="editar">Editar</button> </a>
                                    <a href="?excluir=<?php echo $resultado['avm_codigo']; ?>" onclick="return confirm('Deseja realmente apagar?');"><button class="excluir">Excluir</button></a>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <hr class="linha">
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </section>
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
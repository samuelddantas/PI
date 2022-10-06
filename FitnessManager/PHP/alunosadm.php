<?php
include("config.php");
include("verifica.php");

if (isset($_GET['excluir'])) {
    $codigo = $_GET['excluir'];
    if ($consulta = $conexao->query("delete from tb_clientes where cli_codigo = $codigo")) {
        header("Location: alunosadm.php");
    } else {
        echo "Erro na exclusão";
    }
}

$consulta = $conexao->query("select * from tb_clientes ");
$consulta4 = $conexao->query("select * from tb_funcionarios");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../PHP/../IMAGE/Favicon.ico" type="image/x-icon">
    <title>Alunos</title>
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

                    <li><a href="iniciallogadm.php"><i class="fas fa-arrow-alt-circle-left" style="font-size: 42px; color: #fea303;"></i></i></a></li>
                </span>
            </ul>
        </nav>
    </header>
    <!--FIM DO HEADER-->

    <!--INICIO DO MAIN-->
    <main class="mid-container">
        <section>
            <div class="column3">
                <div class="alunos">
                    <h2>Alunos</h2>
                </div>
                <div class="acoes">
                    <a href="alunos-novoadm.php"><button class="cliente">Novo Cliente</button></a>
                    <a href="alunosadm.php"><button class="atualizar">Atualizar</button></a>
                </div>
            </div>
            <hr class="line">

            <div class="content">
                <table class="crud">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do Aluno</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Idade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tr>
                        <td colspan="7">
                            <hr class="linha linha2">
                        </td>
                    </tr>
                    <?php while ($resultado = $consulta->fetch_assoc()) { ?>
                        <tr>
                            <td label="Código"><?php echo $resultado['cli_codigo']; ?></td>
                            <td label="Nome"><?php echo $resultado['cli_nome']; ?></td>
                            <td label="CPF"><?php echo $resultado['cli_cpf']; ?></td>
                            <?php if ($resultado['cli_melhoremail'] == null) {
                                $resultado['cli_melhoremail'] = "Não cadastrado";
                            } ?>
                            <?php if ($resultado['cli_telefoneprincipal'] == null) {
                                $resultado['cli_telefoneprincipal'] = "Não cadastrado";
                            } ?>
                            <td label="E-mail"><?php echo $resultado['cli_melhoremail']; ?></td>
                            <td label="Telefone"><?php echo $resultado['cli_telefoneprincipal']; ?></td>
                            <td label="Idade"><?php echo $resultado['cli_idade']; ?></td>
                            <td>&nbsp;
                                <a href="alunos-editaradm.php?codigo=<?php echo $resultado['cli_codigo']; ?>"><button class="editar">Editar</button></a>
                                <a href="?excluir=<?php echo $resultado['cli_codigo']; ?>" onclick="return confirm('Deseja realmente apagar?');"><button class="excluir">Excluir</button></a>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <hr class="linha">
                            </td>
                        </tr>
                    <?php } ?>
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
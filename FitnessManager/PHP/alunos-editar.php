<?php
include("config.php");
include("verifica.php");

$codigo = $_GET['codigo'];
if (isset($_POST['nome'])) {
	extract($_POST);

	if ($consulta = $conexao->query("update tb_clientes set cli_nome ='$nome', cli_cpf = '$cpf', cli_melhoremail ='$melhoremail',
    cli_telefoneprincipal = '$telefoneprincipal', cli_idade = '$idade' where cli_codigo=$codigo")) {
		header("Location: alunos.php");
	} else {
		echo "Erro no cadastro";
	}
}

$consulta2 = $conexao->query("select * from tb_clientes where cli_codigo = $codigo");
$resultado2 = $consulta2->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../PHP/../IMAGE/Favicon.ico" type="image/x-icon">
	<title>Editar Aluno</title>
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

					<li><a href="alunos.php"><i class="fas fa-arrow-alt-circle-left" style="font-size: 42px; color: #fea303;"></i></i></a></li>
				</span>
			</ul>
		</nav>
	</header>
	<!--FIM DO HEADER-->

	<!--INICIO DO MAIN-->
	<main class="mid-container">
		<div class="second-container">
			<div class="cadastro">
				<h2>Cadastro de Aluno</h2>
				<form method="POST" action="?codigo=<?php echo $resultado2['cli_codigo']; ?>">
					<div class="input-field">
						<input type="varchar(100)" name="nome" placeholder="Digite seu nome" required value="<?php echo $resultado2['cli_nome']; ?>">
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="varchar(15)" name="cpf" placeholder="Digite seu CPF" required value="<?php echo $resultado2['cli_cpf']; ?>">
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="varchar(100)" name="melhoremail" placeholder="Digite seu E-mail" value="<?php echo $resultado2['cli_melhoremail']; ?>">
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="varchar(15)" name="telefoneprincipal" placeholder="Digite seu telefone principal" value="<?php echo $resultado2['cli_telefoneprincipal']; ?>">
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="int" name="idade" placeholder="Digite sua idade" required value="<?php echo $resultado2['cli_idade']; ?>"><br>
						<div class="underline"></div>
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
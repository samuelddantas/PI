<?php
include("config.php");
include("verifica.php");

if (isset($_POST['nome'])) {
	extract($_POST);
	if ($consulta = $conexao->query("insert into tb_clientes (cli_nome, cli_cpf, cli_melhoremail, cli_telefoneprincipal, cli_idade) 
    values ('$nome', '$cpf', '$melhoremail', '$telefoneprincipal', '$idade');")) {
		header("Location: alunosadm.php");
	} else {
		echo "Erro no cadastro";
	}
}
$consulta2 = $conexao->query("select * from tb_clientes");
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

					<li><a href="alunosadm.php"><i class="fas fa-arrow-alt-circle-left" style="font-size: 42px; color: #fea303;"></i></i></a></li>
				</span>
			</ul>
		</nav>
	</header>
	<!--FIM DO HEADER-->

	<!--INICIO DO MAIN-->
	<main class="mid-container">
		<div class="second-container">
			<div class="cadastro">
				<h2>Cadastro de Alunos</h2>
				<form method="POST" action="?codigo=<?php echo $resultado2['cli_codigo']; ?>">
					<div class="input-field">
						<input type="varchar(100)" name="nome" placeholder="Digite seu nome" required>
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="varchar(15)" name="cpf" placeholder="Digite seu CPF" required>
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="varchar(100)" name="melhoremail" placeholder="Digite seu melhor E-mail">
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="varchar(15)" name="telefoneprincipal" placeholder="Digite seu telefone principal">
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="varchar(20)" name="idade" required placeholder="Digite sua idade">
						<div class="underline"></div>
					</div>

					<input type="submit" value="Cadastrar">
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
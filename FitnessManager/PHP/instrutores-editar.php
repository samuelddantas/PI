<?php
include("config.php");
include("verifica.php");
$codigo = $_GET['codigo'];
if (isset($_POST['nome'])) {
	extract($_POST);

	if ($consulta = $conexao->query("update tb_funcionarios set fun_nome ='$nome', fun_cpf = '$cpf', fun_melhoremail ='$melhoremail',
    fun_telefoneprincipal = '$telefoneprincipal', fun_senha = '$senha', fun_tipo = '$tipo' where fun_codigo=$codigo")) {
		header("Location: instrutores.php");
	} else {
		echo "Erro no cadastro";
	}
}

$consulta2 = $conexao->query("select * from tb_funcionarios where fun_codigo = $codigo");
$resultado2 = $consulta2->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../PHP/../IMAGE/Favicon.ico" type="image/x-icon">
	<title>Editar Funcionário</title>
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

					<li><a href="instrutores.php"><i class="fas fa-arrow-alt-circle-left" style="font-size: 42px; color: #fea303;"></i></i></a></li>
				</span>
			</ul>
		</nav>
	</header>
	<!--FIM DO HEADER-->

	<!--INICIO DO MAIN-->
	<main class="mid-container">
		<div class="second-container">
			<div class="cadastro">
				<h2>Editar Funcionário</h2>
				<form method="POST" action="?codigo=<?php echo $resultado2['fun_codigo']; ?>">
					<div class="input-field">
						<input type="varchar(100)" name="nome" placeholder="Digite seu nome" required value="<?php echo $resultado2['fun_nome']; ?>">
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="varchar(15)" name="cpf" placeholder="Digite seu CPF" required value="<?php echo $resultado2['fun_cpf']; ?>">
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="varchar(100)" name="melhoremail" placeholder="Digite seu melhor E-mail" required value="<?php echo $resultado2['fun_melhoremail']; ?>">
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="varchar(15)" name="telefoneprincipal" placeholder="Digite seu melhor telefone" required value="<?php echo $resultado2['fun_telefoneprincipal']; ?>">
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<input type="varchar(20)" name="senha" placeholder="Digite uma senha" required value="<?php echo $resultado2['fun_senha']; ?>">
						<div class="underline"></div>
					</div>
					<div class="input-field">
						<div class="custom-select">
							<select name="tipo">
								<option value="0">Selecione o tipo</option>
								<?php $consulta8 = $conexao->query("select * from tb_funcionarios");
								$resultado8 = $consulta8->fetch_assoc();

								?>
								<option value=1>Admin</option>
								<option value=2>Comum</option>

							</select>
						</div>
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
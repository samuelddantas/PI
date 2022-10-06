<?php
include("config.php");
include("verifica.php");

if (isset($_POST['nome'])) {
	extract($_POST);
	if (
		$consulta = $conexao->query("insert into tb_maquinas (maq_nome) values ('$nome');") and
		$consulta2 = $conexao->query("insert into tb_avaliacaomaquinas (avm_estadodeconservacao,avm_maq_codigo,avm_fun_codigo )
	 values ('$conserv', '$avm_maq','$avm_fun');")
	) {
		header("Location: maquinas.php");
	} else {
		echo "Erro no cadastro";
	}
}
$consulta3 = $conexao->query("select * from tb_maquinas ");
$consulta4 = $conexao->query("select * from tb_funcionarios");
$consulta5 = $conexao->query("select * from tb_avaliacaomaquinas");

while ($resultado6 = $consulta3->fetch_assoc()) {
	$resultado6['avm_maq_codigo'] = $resultado6['maq_codigo'] + 1;
	$ult = $resultado6['avm_maq_codigo'];
}
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
					<li><a href="maquinas.php"><i class="fas fa-arrow-alt-circle-left" style="font-size: 42px; color: #fea303;"></i></i></a></li>
				</span>
			</ul>
		</nav>
	</header>
	<!--FIM DO HEADER-->

	<!--INICIO DO MAIN-->
	<main class="mid-container">
		<div class="second-container">
			<div class="cadastro">
				<h2>Cadastro de Máquinas</h2>
				<form method="POST" action="?">

					<div class="input-field">
						<input type="varchar(100)" name="nome" placeholder="Digite o nome da máquina" required>
						<div class="underline"></div>
					</div>
					Estado de Conservação:
					<div class="custom-select">
						<br><select name="conserv">
							<?php $resultado5 = $consulta5->fetch_assoc(); ?>
							<option value=1>Nova</option>
							<option value=2>Manutenção</option>
							<option value=3>Quebrada</option>
						</select>
					</div>
					Instrutor:
					<div class="custom-select">
						<br><select name="avm_fun">
							<?php while ($resultado4 = $consulta4->fetch_assoc()) { ?>
								<option value="<?php echo $resultado4['fun_codigo'] ?>"><?php echo $resultado4['fun_nome'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="input-field">
						<input type="number" name="avm_maq" value="<?php echo $ult ?>" placeholder="<?php echo $ult ?>">
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
<?php 

	error_reporting(1);


	if($_POST != NULL){

		include_once "connect_db.php";
		
		$usuario = $_POST["usuario"];
		$senha = $_POST["senha"];

		if($usuario != NULL && $senha != NULL){

			$sql = "SELECT * 
					FROM user_info 
					WHERE user = '$usuario'";
			


			$retorno = $conexao->query($sql);

			if ($retorno == false) {
				echo $conexao->error;
			}

			$registro = $retorno->fetch_array();

			$user = $registro["user"];
			$password = $registro["password"];

			if($usuario == $user && $senha == $password){
				echo 
				"<script>
					alert('Logado com Sucesso!!');
					location.href='feed.php';
				 </script>";
			}else{
				echo 
				"<script>
					alert('Usuário/Senha incorretos!!');
				 </script>";
			}

		}else{
			echo 
				"<script>
					alert('Usuário/Senha incorretos!!');
				 </script>";
		}

	}


?>



<!DOCTYPE html>

<html>

	<head>
		<title>TITLE</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../CSS/login-style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>





	<body>

	<nav class="navbar navbar-expand-lg">
	  <a class="navbar-brand" href="#"><img src="https://pm1.narvii.com/6274/91e724ccdf21f9002929ae41d560fdcc09a0d3bc_hq.jpg"> Ren-Chon Network </a>
	</nav>

	<div class="login-sidebar">
		<div class="login-form">
            <form method="POST">
            	<div class="form-group">
            		<label for="user">User:</label>
			  		<input type="text" id="user" name="usuario" placeholder="usuario" class="form-control">
			  	</div>
			  	<div class="form-group">
			  		<label for="password">Password:</label>
			  		<input type="password" id="password" name="senha" placeholder="senha" class="form-control">
			  	</div>
			  	<button type="submit" class="btn btn-primary">Login</button>
			</form>

			<br>
            
            <a href="cadastro.php">Cadastrar</a> 
            
            <br>
            
            <a href="">Esqueceu a senha?</a>
		</div>
	</div>

	<footer>
		<p>© 2019 Copyright, AppleHead Company</p>
	</footer>
	</body>
</html>
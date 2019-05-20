<?php 
	error_reporting(1);
	if ($_POST != NULL) {

		include_once "connect_db.php";

	    // Obtem dados do POST
	    $usuario = $_POST["usuario"];
	    $senha = $_POST["senha"];
	    $email = $_POST["email"];

	    //addslashes() <- evita SQL Injection quado for fazer um SELECT

	    // Valida campos obrigatórios
	    if ($usuario != "" && $senha != "" && $email != "" ) {

	      // Cria o comando SQL
	      $sql = "INSERT INTO user_info (user, password, email) 
	              VALUES ('$usuario', '$senha', '$email')";

	      // Executa no BD
	      $retorno = $conexao->query($sql);

	      // Executou?
	      if ($retorno == true) {

	        echo "<script>
	                alert('Cadastrado com Sucesso!');
	                location.href='welcome.php';
	              </script>";

	      } else {

	        echo "<script>
	                alert('Erro ao Cadastrar!');
	              </script>";

	        // Exibe do erro que o banco retorna
	        echo $conexao->error;

	      }

	    } else {
	        echo "<script>
	                alert('Preencha todos os campos!');
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
			<a class="navbar-brand" href="welcome.php"><img src="https://33.media.tumblr.com/5dc4d066766ace675599ee469422390c/tumblr_mwix7neuTm1s21xzoo3_400.gif"> Ren-Chon Network </a>
		</nav>

			<div class="login-sidebar">
				<div class="login-form">
					<h2>New Account:</h2>
					<br>
					<form method="POST">
						<div class="form-group">
							<label for="user">Digite seu usuário:</label>
							<input type="text" id="user" name="usuario" placeholder="" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Digite sua senha:</label>
							<input type="password" id="password" name="senha" placeholder="" class="form-control">
						</div>
						<div class="form-group">
							<label for="confirmPassword">Confime sua senha:</label>
							<input type="password" id="confirmPassword" name="confirmeSenha" placeholder="" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Digite seu email:</label>
							<input type="email" id="email" name="email" placeholder="" class="form-control">
						</div>
						<button type="submit" class="btn btn-dark">Submit</button>
					</form>
				</div>
			</div>
			
	</body>
</html>
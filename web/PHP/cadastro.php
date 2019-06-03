<?php 
	error_reporting(1);
	if ($_POST != NULL) {

		include_once "connect_db.php";

	    // Obtem dados do POST
	    $usuario = $_POST["usuario"];
	    $senha = $_POST["senha"];
			$email = $_POST["email"];
			$answer = $_POST["answer"];
			$ques_cod = $_POST["ques_cod"];
			$nome = $_POST["nome"];
			$foto = $_POST["photo"];


	    //addslashes() <- evita SQL Injection quado for fazer um SELECT

	    // Valida campos obrigatórios
	    if ($usuario != "" && $senha != "" && $email != "" && $nome != "" && $ques_cod != "" && $answer != "") {

				if($foto == ""){
					$foto = "https://imgur.com/Pk98UaE.png";
				}

	      // Cria o comando SQL
	      $sql = "INSERT INTO user_info (user, password, email, photo, fullname, ques_cod, answer) 
	              VALUES ('$usuario', '$senha', '$email', '$foto', '$nome', '$ques_cod', '$answer')";

	      // Executa no BD
	      $retorno = $conexao->query($sql);

	      // Executou?
	      if ($retorno == true) {

	        echo "<script>
	                alert('Cadastrado com Sucesso!');
	                location.href='index.php';
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
		<title>Ren-Chon</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../CSS/login-style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>


	<body style="overflow: auto;">

		<nav class="navbar navbar-expand-lg">
			<a class="navbar-brand" href="index.php"><img src="https://33.media.tumblr.com/5dc4d066766ace675599ee469422390c/tumblr_mwix7neuTm1s21xzoo3_400.gif"> Ren-Chon Network </a>
		</nav>

		<div class="login-sidebar" style="height: 100%;">
			<div class="login-form mb-5 mt-5">
				<h2>New Account:</h2>
				<br>
				<form method="POST">
					<div class="form-group">
						<label for="user">Digite seu usuário:</label>
						<input type="text" id="user" name="usuario" placeholder="" required class="form-control">
					</div>

<script>
	var check = function() {
  if (document.getElementById('password').value ==
		document.getElementById('confirmPassword').value) {
    document.getElementById('message').style.color = 'green';
		document.getElementById('message').innerHTML = '';
		document.getElementById('submit').disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = 'As senhas não coincidem';
		document.getElementById('submit').disabled = true;
  }
}
</script>

					<div class="form-group">
						<label for="password">Digite sua senha:</label>
						<input type="password" id="password" name="senha" placeholder="" onkeyup='check();' required class="form-control">
					</div>
					<div class="form-group">
						<label for="confirmPassword">Confirme sua senha:</label>
						<input type="password" id="confirmPassword" name="confirmeSenha" placeholder="" onkeyup='check();' required class="form-control">
						<span id='message'></span>
					</div>
					<div class="form-group">
						<label for="nome">Digite seu nome:</label>
						<input type="nome" id="nome" name="nome" placeholder="Nome visivel para os outros" required class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Digite seu email:</label>
						<input type="email" id="email" name="email" placeholder="" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Link para sua foto de perfil:</label>
						<input type="photo" id="photo" name="photo" placeholder="URL de imagem 1:1 (Ex: 500x500)" class="form-control">
					</div>
					<div class="form-group">
							<label for="ques_cod">Selecione uma pergunta de segurança:</label>
							<select name="ques_cod" required class="form-control">
												<option value="">Selecione sua pergunta:</option>

												<?php

													// Remove mensagem de alerta
													error_reporting(1);

													include_once "connect_db.php";

															// Cria comando SQl
													$sql = "SELECT * 
													FROM question";

													// Executa no BD
													$retorno = $conexao->query($sql);

													// Deu erro?
													if ($retorno == false) {
														echo $conexao->error;
															}

													while ($registro = $retorno->fetch_array()) {

																$id = $registro["id"];
																$name = $registro["name"];

																echo "<option value='$id'>$name</option>";

															}

														?>

											</select>
							<label for="answer" class="pt-3">Resposta:</label>
							<input type="answer" id="answer" name="answer" placeholder="Resposta" required class="form-control">
					</div>
					<div class="text-right pt-2">
						<button type="submit" id="submit" class="btn btn-dark" disabled>Gravar</button>
					</div>
				</form>
			</div>
		</div>
			
	</body>
</html>
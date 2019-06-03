<!-- WELCOME - ESQUECEU A SENHA? -->
<?php 
	error_reporting(1);
	if ($_POST != NULL) {

		include_once "connect_db.php";



	    // Obtem dados do POST
	  $usuario = $_POST["usuario"];
		$resposta = $_POST["resposta"];
		$question = $_POST["question"];
		$senha = $_POST["senha"];

		$sql = "SELECT *
				FROM user_info
				WHERE user = '$usuario'";


		$retorno = $conexao->query($sql);

		if ($retorno == false) {
			echo $conexao->error;
		}
		
		if($registro = $retorno->fetch_array()){
			$ques_cod = $registro["ques_cod"];
			$answer = $registro["answer"];
			$password = $registro["password"];
			$user = $registro["user"];
		} 
		else{
			echo "<script>
							alert('Usuário Inexistente!');
						</script>";
		}

		if($usuario == $user && $senha != NULL && $resposta == $answer && $question == $ques_cod){

			$sql = "UPDATE  user_info
				SET password = '$senha' 
				WHERE user = '$usuario'";
			
			$retorno = $conexao->query($sql);
		
		      // Executou?
			  if ($retorno == true) {

		
				echo "<script>
								alert('Alterado com Sucesso!');
								location='index.php';
							</script>";
					
				
				
			  } else {
		
				echo "<script>
								alert('Erro ao Alterar!');
							</script>";
		
				// Exibe do erro que o banco retorna
				echo $conexao->error;
		
			  }
		
			} else {
				echo "<script>
								alert('Preencha todos os campos corretamente!');
							</script>";
			}

	}


 


?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Ren-chon</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="../CSS/login-style.css">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		</head>
		<body>
		<nav class="navbar navbar-expand-lg">
			<a class="navbar-brand" href="index.php"><img src="https://33.media.tumblr.com/5dc4d066766ace675599ee469422390c/tumblr_mwix7neuTm1s21xzoo3_400.gif"> Ren-Chon Network </a>
		</nav>
		<div class="login-sidebar">
			<div class="login-form">
				<h2>Esqueceu sua senha?</h2>
				<form method="POST">
					<div class="form-group">
						<label for="user">Digite seu usuário:</label>
						<input type="text" id="user" name="usuario" placeholder="" class="form-control">
					</div>
					<div class="form-group">
						<label for="question">Selecione sua pergunta:</label>
						<select name="question" required class="form-control">
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
						<label for="answer">Resposta:</label>
						<input type="text" id="answer" name="resposta" placeholder="" class="form-control">
						<label for="novasenha">Digite sua nova senha:</label>
						<input type="password" id="newpassword" name="senha" placeholder="" class="form-control">
						<label>Confirme a nova senha</label>
						<input type="password" id="confirmnew" name="confirmarNova" placeholder="" class="form-control">
						<button type="submit" class="btn btn-dark">Gravar</button>
					</div>
				</form>
			</div>
		</div>
		</div>
	</body>
</html>
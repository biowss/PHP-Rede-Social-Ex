<!-- PAGINA DE CONFIGURAÇÕES DO USUARIO -->
<?php 
session_start();

// N"ao está logado?
if ($_SESSION["logado"] != "ok") {

  // Volta para o login
  header("Location: index.php");

}
	error_reporting(1);
	if ($_POST != NULL) {

		include_once "connect_db.php";

	    // Obtem dados do POST
	    $usuario = $_POST["usuario"];
			$nome = $_POST["fullname"];
			$profileImage = $_POST["profileImage"];
			$senha = $_POST["senha"];
			$novaSenha = $_POST["novaSenha"];
			$id = $_SESSION["id_usuario"];

			// Cria o comando SQL
				
				if( $usuario != ""){
					$sql = "UPDATE user_info
		  		SET user = '$usuario'
					WHERE id = $id";
					
					// Executa no BD
					$retorno = $conexao->query($sql);

				}

				if($nome != ""){
					$sql = "UPDATE user_info
					SET fullname = '$nome' 
					WHERE id = $id";

					// Executa no BD
					$retorno = $conexao->query($sql);

				}

	      if($profileImage != ""){
					$sql = "UPDATE user_info
					SET photo = '$profileImage' 
					WHERE id = $id";

					// Executa no BD
					$retorno = $conexao->query($sql);

				}

				if ($senha != "" && $novaSenha != ""){
					$sql = "UPDATE user_info
					SET password = '$novaSenha' 
					WHERE id = $id";
					
					// Executa no BD
					$retorno = $conexao->query($sql);
				}


	      // Executou?
	      if ($retorno == true) {

	        echo "<script>
	                alert('Alterado com Sucesso!');
	                location.href='feed.php';
	              </script>";

	      } else {

	        echo "<script>
	                alert('Erro ao Alterar!');
	              </script>";

	        // Exibe do erro que o banco retorna
	        echo $conexao->error;

	      }

	    
	}
?>

<?php include_once "nav.php"; ?>
<script>

	var check = function() {
		if(document.getElementById('user').value == "" && document.getElementById('profileImage').value == "" && document.getElementById('fullname').value == "" && document.getElementById('password').value == "" && document.getElementById('newPassword').value == ""){
			document.getElementById('submit').disabled = true;
		}else{
			if (document.getElementById('newPassword').value ==
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
	}

	window.onload = function(){
		check();
	}

</script>

		<div class="container m-auto">
			
			<h2>Configs</h2>
			<br>
			<form method="POST">
				<fieldset class="form-group border-custom2">
					<legend>Change Account Information</legend>
					<div class="form-group">
						<label for="user">User:</label>
						<input type="text" id="user" name="usuario" onkeyup='check();' placeholder="" class="form-control w-50">
					</div>
					<div class="form-group">
						<label for="profileImage">Profile Image:</label>
						<input type="text" id="profileImage" name="profileImage" onkeyup='check();' placeholder="www.google.com/image.png" class="form-control w-50">
					</div>
					<div class="form-group">
						<label for="fullname">Nickname:</label>
						<input type="text" id="fullname" name="fullname" onkeyup='check();' placeholder="" class="form-control w-50">
					</div>
					<br>
				</fieldset>
				<fieldset class="form-group border-custom2">
					<legend>Account Password</legend><br>
					<div class="text-left pt-2">
						<div class="form-group">
							<label for="password">Actual Password:</label>
							<input type="password" id="password" name="senha" placeholder="" onkeyup='check();' class="form-control w-50">
						</div>
						<div class="form-group">
							<label for="newPassword">New Password:</label>
							<input type="password" id="newPassword" name="novaSenha" placeholder="" onkeyup='check();' class="form-control w-50">
						</div>
						<div class="form-group">
							<label for="confirmPassword">Confirm New Password:</label>
							<input type="password" id="confirmPassword" name="confirmeSenha" placeholder="" onkeyup='check();' class="form-control w-50">
							<span id='message'></span>
						</div>
					</div>
				<br>		
				</fieldset>		
				
				<div class="text-right mb-5">
					<button type="submit" id="submit" class="btn btn-dark">Save</button>
				</div>
			</form>
		</div>
	</body>
</html>
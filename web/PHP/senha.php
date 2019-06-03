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
		$senha = $_POST["senha"];
		$novaSenha = $_POST["novaSenha"];
		$id = $_SESSION["id_usuario"];

	    // Valida campos obrigatórios
	    if ($senha != "" && $novaSenha != "") {

            $getpass = "SELECT *
                    FROM user_info
                    WHERE id = $id";
            $return = $conexao->query($getpass);
            if ($registry = $return->fetch_array()){
                $pass = $registry["password"];
            
            

            if ($senha == $pass){

	            // Cria o comando SQL
	            $sql = "UPDATE user_info
		  		        SET password = '$novaSenha' 
	                    WHERE id = $id";

	            // Executa no BD
	            $retorno = $conexao->query($sql);

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
            } else{
                echo "<script>
                        alert('Senha atual incorreta');
                    </script>";
            }
        }
	    } else {
	        echo "<script>
	                alert('Preencha todos os campos!');
	              </script>";
	        }
	}
?>

<?php include_once "nav.php"; ?>

		<div class="container">
			
			<h2>Alterar Senha</h2>
			<br>
			<form method="POST">
				<fieldset class="form-group border-custom2">
					<br>
<script>
	var check = function() {
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
</script>
					<div class="form-group">
						<label for="password">Senha Atual:</label>
						<input type="password" id="password" name="senha" placeholder="" required class="form-control w-50">
					</div>
					<div class="form-group">
						<label for="newPassword">Nova senha:</label>
						<input type="password" id="newPassword" name="novaSenha" placeholder="" onkeyup='check();' required class="form-control w-50">
					</div>
					<div class="form-group">
						<label for="confirmPassword">Confirme sua senha:</label>
						<input type="password" id="confirmPassword" name="confirmeSenha" placeholder="" onkeyup='check();' required class="form-control w-50">
						<span id='message'></span>
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
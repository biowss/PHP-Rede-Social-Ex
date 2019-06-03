<!-- AMIGOS E SOLICITAÇOES DE AMIZADE DO USUARIO -->
<?php include_once "nav.php"; ?>
<?php include_once "sidebar.php"; ?>

	<!-- Main-Page - Friends -->

<?php 
// VISUALIZAÇÃO DAS PENDENCIAS
	echo 
	"<div class='page padding-style'>
		<div class='border-custom'> 
			<fieldset>					
				<legend class='pb-2'><h4>Pedidos pendentes:</h4></legend>";

				$sql = "SELECT * FROM user_info WHERE id IN (
					SELECT user_id
					FROM user_info
					INNER JOIN friendship 
					ON user_info.id = friendship.user_id AND user_info.id = friendship.user_id 
					WHERE friendship.friend_id = $id_usuario AND confirm = 0 OR friendship.user_id = $id_usuario AND confirm = 0)";

				$retorno = $conexao->query($sql);

			
				while($registro = $retorno->fetch_array()){
					$photo = $registro["photo"];
					$fullname = $registro["fullname"];
					$user = $registro["user"];
					$id = $registro["id"];
				
					if($id != $id_usuario){
					echo					
						"<div style='display: flex; flex-flow: row; justify-content: space-between;'>				
							<div>
								<a class='navbar-brand mr-auto' href='feed.php?user=$otherProfile' href='feed.php?user=$user'>
									<img src='$photo' width='100px'>
									$fullname
								</a>
							</div>
							<div class='mt-auto mb-auto'>
								<form method='GET' class='form-inline' action='confirm.php'>
									<button class='btn btn-dark' type='submit' name='user' value='$user' style='margin: auto'>Aceitar pedido</button>
								</form>
							</div>
							<div class='mt-auto mb-auto'>
								<form method='GET' class='form-inline' action='delete.php'>
									<button class='btn btn-dark' type='submit' name='user' value='$user' style='margin: auto'>Cancelar pedido</button>
								</form>
							</div>
						</div>";
					}
				}
				$sql = "SELECT * FROM user_info WHERE id IN (
					SELECT friend_id
					FROM user_info
					INNER JOIN friendship 
					ON user_info.id = friendship.user_id AND user_info.id = friendship.user_id 
					WHERE friendship.friend_id = $id_usuario AND confirm = 0 OR friendship.user_id = $id_usuario AND confirm = 0)";

				$retorno = $conexao->query($sql);

			
				while($registro = $retorno->fetch_array()){
					$photo = $registro["photo"];
					$fullname = $registro["fullname"];
					$user = $registro["user"];
					$id = $registro["id"];
				
					if($id != $id_usuario){
					echo					
						"<div style='display: flex; flex-flow: row; justify-content: space-between;'>				
							<div>
								<a class='navbar-brand mr-auto' href='feed.php?user=$user'>
									<img src='$photo' width='100px'>
									$fullname
								</a>
							</div>
							<div class='mt-auto mb-auto'>
								<form method='GET' class='form-inline' action='delete.php'>
									<button class='btn btn-dark' type='submit' name='user' value='$user' style='margin: auto'>Cancelar pedido</button>
								</form>
							</div>
						</div>";
					}
				}
				
					
	echo 
			"</fieldset>";

// VISUALIZAÇÃO DOS AMIGOS

	echo 
			"<fieldset class='mt-4'>					
				<legend class='pb-2'><h4>Friends:</h4></legend>					
				<ul class='profiles-display6'>";

				$sql = "SELECT * FROM user_info WHERE id IN (
					SELECT friend_id 
					FROM user_info
					INNER JOIN friendship 
					ON user_info.id = friendship.user_id AND user_info.id = friendship.user_id 
					WHERE friendship.friend_id = $id_usuario AND confirm = 1 OR friendship.user_id = $id_usuario AND confirm = 1)";
	
				$retorno = $conexao->query($sql);
			
				while($registro = $retorno->fetch_array()){
					$photo = $registro["photo"];
					$fullname = $registro["fullname"];
					$user = $registro["user"];
					$id = $registro["id"];

					if($id != $id_usuario){
					echo 
						"<div>				
							<a href='feed.php?user=$user'>
								<img src='$photo' width='100%'>
								$fullname
							</a>
						</div>";
					}
				}
				$sql = "SELECT * FROM user_info WHERE id IN (
					SELECT user_id 
					FROM user_info
					INNER JOIN friendship 
					ON user_info.id = friendship.user_id AND user_info.id = friendship.user_id 
					WHERE friendship.friend_id = $id_usuario AND confirm = 1 OR friendship.user_id = $id_usuario AND confirm = 1)";

				$retorno = $conexao->query($sql);
			
				while($registro = $retorno->fetch_array()){
					$photo = $registro["photo"];
					$fullname = $registro["fullname"];
					$user = $registro["user"];
					$id = $registro["id"];

					if($id != $id_usuario){
					echo 
						"<div>				
							<a href='feed.php?user=$user'>
								<img src='$photo' width='100%'><br>
								$fullname
							</a>
						</div>";
					}
				}

					
	echo 
				"</ul>
			</fieldset>
		</div>			
	</div>";
		
?>
</body>
</html>
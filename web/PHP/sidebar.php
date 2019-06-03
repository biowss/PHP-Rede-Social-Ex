
<?php
error_reporting(1);
include_once "connect_db.php";

//User ID
$id_usuario = $_SESSION["id_usuario"];

$otherProfile = $_GET["user"];

if($otherProfile != NULL){
	// SE O GET NAO FOR NULO ELE VAI USAR AS INFORMAÇOES DO PERFIL QUE ESTÁ COMO PARAMETRO NO GET

	//cria comando SQL
	$sql = "SELECT *
			FROM user_info
			WHERE user = '$otherProfile'";	

	//executa no BD
	$retorno = $conexao->query($sql);

	//error
	if($retorno == false) {
		echo $conexao->error;
	}
	

	if ($registro = $retorno->fetch_array()) {
		$id = $registro["id"];
		$otherProfile = $registro["user"];
		$photo = $registro["photo"];
		$fullname = $registro["fullname"];
	}
	
	if($id == NULL){
	echo "<script>
			alert('Usuário Inexistente!');
			location.href='feed.php';
		</script>";
	}
	

}else{
	// SE O FEED FOR DO USUARIO LOGADO $GET VAI SER NULL E O USUARIO VAI VER SUAS PROPRIAS INFORMAÇOES

	//cria comando SQL
	$sql = "SELECT *
	FROM user_info
	WHERE id = $id_usuario";

	//executa no BD
	$retorno = $conexao->query($sql);

	//error
	if ($retorno == false) {
		echo $conexao->error;
		}

	if ($registro = $retorno->fetch_array()) {			
		$id = $registro["id"];
		$photo = $registro["photo"];
		$fullname = $registro["fullname"];		
	}		
}

?>


<div class="container">

<!-- Side-Page - Profile -->
<div class="profileSide">
	<div class="border-custom pt-4 pb-4"> 
		<a href="#">
			<img src='<?php echo $photo ?>' width="70%" height="70%">
			<h3 class="pt-2 font-style"> <?php echo  $fullname ?></h3>
		</a>
	</div>


	<?php 

	// ADICIONA A PARTE DE ADICIONAR AMIGOS CASO NAO SEJA PERFIL PROPRIO

	if($otherProfile != NULL){	
		$test = 0;
		
		$sqle = "SELECT id AS id_amigo
		FROM user_info
		WHERE user = '$otherProfile'";

		$return = $conexao->query($sqle);

		if ($registry = $return->fetch_array()){
		$id_amigo = $registry["id_amigo"];
		}

		$sql = "SELECT user_info.*, friendship.*
				FROM user_info
				INNER JOIN friendship
				ON user_info.id = friendship.user_id OR 
				user_info.id = friendship.friend_id
				WHERE user_info.user = '$otherProfile'";

		$retorno = $conexao->query($sql);

		while($registro = $retorno->fetch_array()){
			$userid = $registro["user_id"];
			$friendid = $registro["friend_id"];
			$confirm = $registro["confirm"];
				
			if ($userid == $id_usuario && $friendid == $id_amigo || $userid == $id_amigo && $friendid == $id_usuario){
				$test = 1;
				if($confirm == 1){
					echo 
					"<div class='border-custom'> 
						<div class='p-2'>
							<form method='GET' class='form-inline my-2 my-lg-0' action='delete.php'>
								<button class='btn btn-dark w-50' type='submit' name='user' value='$otherProfile' style='margin: auto'>Deletar</button>
							</form>
						</div>
					</div>";		
				}else{
					echo 
					"<div class='border-custom'> 
						<div class='p-2'>
						<form method='GET' class='form-inline my-2 my-lg-0' action='delete.php'>
								<button class='btn btn-dark w-50' type='submit' name='user' value='$otherProfile' style='margin: auto'>Cancelar Pedido</button>
							</form>
						</div>
					</div>";
				}
			}
		}
		if($test == 0){
			
			echo
			"<div class='border-custom'> 
					<div class='p-2'>
						<form method='GET' class='form-inline my-2 my-lg-0' action='solicitacao.php'>
							<button class='btn btn-dark w-50' type='submit' name='user' value='$otherProfile' style='margin: auto'>Adicionar</button>
						</form>
					</div>
				</div>";
		}	
	}

				if($otherProfile != NULL){	
					echo "<div>";
				}else{
					echo"<div class='border-custom'> 
							<h4> Profile Friends </h4>
								<ul class='profiles-display3'>";
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
						"<div style='width: 32%;'>				
							<a href='feed.php?user=$user'>
								<img src='$photo' width='100%'>
								<p style='text-overflow: ellipsis; overflow: hidden; max-width: 100%;'>$fullname</p>
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
						"<div style='width: 32%;'>				
							<a href='feed.php?user=$user'>
								<img src='$photo' width='100%'>
								<p style='text-overflow: ellipsis; overflow: hidden; max-width: 100%;'>$fullname</p>
							</a>
						</div>";
					}
				}
			}
				
			?>
		</ul>
	</div>
</div>	

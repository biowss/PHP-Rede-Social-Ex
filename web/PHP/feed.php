
<!-- TODOS OS POSTS DO USUARIO -->
<?php include_once "nav.php"; ?>
<?php include_once "sidebar.php"; ?>
<?php 
	error_reporting(1);
	if ($_POST != NULL) {
		if($_POST["newPost"]){
			include_once "connect_db.php";

			// Obtem dados do POST
			$postId = $_SESSION["id_usuario"];
			$postComment = $_POST["post"];
			$postUrl = $_POST["url"];

			$sql = "INSERT INTO post (user_id, comment, url, timestamp) 
					VALUES ('$postId', '$postComment', '$postUrl', CURRENT_TIMESTAMP)";

			$retorno = $conexao->query($sql);

			// Executou?
			if ($retorno == true) {

			echo "<script>
					alert('Postado!');
					location.href='feed.php';
					</script>";

			} else {

			echo "<script>
					alert('Erro ao Postar!');
					</script>";

			// Exibe do erro que o banco retorna
			echo $conexao->error;

			}
		}

		if($_POST["commentPost"]){
			$thisId = $_POST["commentPost"];
			$comment = $_POST["comment"];
			$commentUrl = $_POST["commentUrl"];

			$sql = "INSERT INTO comments(id_post, id_user, comment, url, timestamp) 
					VALUES ($thisId, $id_usuario, '$comment', '$commentUrl', CURRENT_TIMESTAMP)";

			$retorno = $conexao->query($sql);	
			
			echo"<script>
					location.href='feed.php#like$thisId'
				</script>";

		}
		
							
		if($_POST["likes"]) {
			$thisId = $_POST["likes"];

			// dar o like

			$sql = "INSERT INTO likes(post_id, u_id) 
					VALUES ($thisId, $id_usuario)";

			$retorno = $conexao->query($sql);

			$sql = "UPDATE post SET liked = liked+1
					WHERE id_post = $thisId";
			
			$retorno = $conexao->query($sql);

			echo"<script>
					location.href='feed.php#like$thisId'
				</script>";
		}


		if($_POST["delete"]) {
			$thisId = $_POST["delete"];
			$sql = "DELETE FROM post  
			WHERE id_post = $thisId";
		$retorno = $conexao->query($sql);
		if ($retorno == true) {

			echo "<script>
					alert('Deletado!');
					location.href='feed.php';
					</script>";

			} else {

			echo "<script>
					alert('Erro ao Deletar!');
					</script>";

			// Exibe do erro que o banco retorna
			echo $conexao->error;

			}
		
		}   

		if($_POST["commentDelete"]) {
			$thisId = $_POST["commentDelete"];
			$sql = "DELETE FROM comments  
			WHERE comments_id = $thisId";
		$retorno = $conexao->query($sql);

		if ($retorno == true) {

			echo "<script>
					alert('Deletado!');
					location.href='feed.php';
					</script>";

			} else {

			echo "<script>
					alert('Erro ao Deletar!');
					</script>";

			// Exibe do erro que o banco retorna
			echo $conexao->error;

			}
		
		}   

	}
?>
<script>

var check = function() {
	if(document.getElementById('post').value == "" && document.getElementById('url').value == ""){
		document.getElementById('submit').disabled = true;
	}else{
		document.getElementById('submit').disabled = false;
}
}

window.onload = function(){
	check();
}

</script>

	<!-- Main-Page - Posts -->

<div class="page">
	<div class="border-custom"> 
		<form method="POST">
			<div class="form-group ml-5 mr-5 mt-5">
				<label for="post">Comment:</label>
				<textarea class="form-control" rows="5" id="post" name="post" onkeyup='check();'></textarea>
			</div>
			<div class="form-group ml-5 mr-5 mb-0">
				<label for="url">URL:</label>
				<input type="text" class="form-control" id="url" name="url" onkeyup='check();'>
			</div>
			<br>
			<div class="text-right">
				<button type="submit" id="submit" name="newPost" value="newPost" class="btn btn-dark mr-5">Post It!</button>
			</div>
		</form>
	</div>
	<div class="border-custom"> 
		<fieldset class="m-5">
			<?php 
			session_start();

				if($otherProfile != NULL){
					$sql = "SELECT user_info.*, post.*
							FROM user_info
							INNER JOIN post
							ON post.user_id = user_info.id 
							WHERE user_info.user = '$otherProfile' 
							ORDER BY timestamp DESC";
				}else{
					$sql = "SELECT user_info.*, post.*
					FROM user_info
					INNER JOIN post
					ON post.user_id = user_info.id 
					WHERE user_info.id IN (
						SELECT user_id
						FROM friendship
						WHERE friend_id = $id_usuario AND confirm = 1
						OR user_id = $id_usuario AND confirm = 1
						UNION
						SELECT friend_id
						FROM friendship
						WHERE friend_id = $id_usuario AND confirm = 1
						OR user_id = $id_usuario AND confirm = 1)  
					ORDER BY timestamp DESC";
				}

				$retorno = $conexao->query($sql);
				if ($retorno == false) {
					echo $conexao->error;
					}

				while ($registro = $retorno->fetch_array()) {

					$userId = $registro["user_id"];
					$comments = $registro["comment"];
					$url = $registro["url"];
					$timestamp = $registro["timestamp"];
					$liked = $registro["liked"];
					$name = $registro["fullname"];
					$photo= $registro["photo"];
					$idPost = $registro["id_post"];
					$redireciona = $registro["user"];
					echo "
					<div class='mb-5'>
						<div class='post-custom'>
							<div class='post-title pb-2'>
								<div style='font: 13px 'Fugaz One', cursive;'>
									<a class='navbar-brand mr-auto' href='feed.php?user=$redireciona'><img src='$photo' width='60px'> $name </a>
								</div>
								<div>
									<i>$timestamp</i>
								</div>
							</div>
							<div class='post-img' style='text-align: center;'>
								<img src='$url' width='400px'>
							</div>
							<div class='post-body p-3'>
								<p> $comments </p>
							</div>
							<form method='POST' class='post-bottom pt-2'>
								<div>";

								$sqlLikes = "SELECT * 
										FROM likes
										WHERE post_id = $idPost";
								
								$retornoLikes = $conexao->query($sqlLikes);
								$checkretorno = 0;

								while($registroLikes = $retornoLikes->fetch_array()){
									$checkLikes = $registroLikes["u_id"];
									$checkretorno = $checkretorno+1;
									if($id_usuario == $checkLikes){
										echo"<button type='button' class='btn btn-primary' id='like$idPost'> $liked Likes </button>";
									}else{
										echo"<button type='submit' name='likes' value='$idPost' class='btn btn-primary' id='like$idPost'> Like! </button>";
								}}
								if($registroLikes == false && $checkretorno == 0){
									echo"<button type='submit' name='likes' value='$idPost' class='btn btn-primary' id='like$idPost'> Like! </button>";
								}
								// COMENTARIO
								echo"
									<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalContactForm'> Comment </button>
									<div class='modal fade' id='modalContactForm' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'
									aria-hidden='true'>
									<div class='modal-dialog' role='document'>
										<div class='modal-content' style='background-color: #d4bee9;'>
											<div class='modal-header text-center'>
												<h4 class='modal-title w-100 font-weight-bold'>Comment</h4>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
												</button>
											</div>
											<div class='modal-body mx-3'>
												<div class='md-form'>
												<label data-error='wrong' data-success='right' for='form8'>Your message:</label>
												<textarea type='text' name='comment' id='form8' class='md-textarea form-control' rows='4'></textarea>
												</div>
											</div>
											<div class='modal-body mx-3'>
											<label data-error='wrong' data-success='right' for='form34'>Image Url:</label>
											<input type='text' id='form34' class='form-control' name='commentUrl'>
											</div>

											<div class='modal-footer d-flex justify-content-center' style='background-color: #bba4d2;'>
												<button type='submit' name='commentPost' value='$idPost' class='btn btn-unique'>Send<i class='fas fa-paper-plane-o ml-1'></i></button>
											</div>
										</div>
									</div>
									</div>








								</div>";
					if($id_usuario == $userId){
						echo"	<div>
									<button type='submit' name='delete' value='$idPost' class='btn btn-danger'> Delete Post </button>
								</div>";
						}

					echo 
							"</form>
						</div>";
					
						$sqlComment = "SELECT * 
										FROM comments
										INNER JOIN user_info
										ON user_info.id = comments.id_user
										WHERE id_post = $idPost
										ORDER BY timestamp DESC";
								
						$retornoComment = $conexao->query($sqlComment);

						while($registroComment = $retornoComment->fetch_array()){
							$commentId = $registroComment["comments_id"];
							$commentUserId = $registroComment["id"];
							$commentUser = $registroComment["user"];
							$commentUserName = $registroComment["fullname"];
							$commentCommentary = $registroComment["comment"];
							$commentPhoto = $registroComment["photo"];
							$commentTimeStamp = $registroComment["timestamp"];
							$commentUrl = $registroComment["url"];
							
						
							echo"<div class='ml-5 p-1 mt-1' style='border-left: 2px solid #bba4d2;border-bottom: 2px solid #bba4d2; background-color: #dbcbea; border-radius: 8px;'>
									<div class='post-title pb-2'>
										<div style='font: 5px 'Fugaz One', cursive;'>
											<a class='navbar-brand mr-auto' href='feed.php?user=$commentUser'><img src='$commentPhoto' width='50px'> $commentUserName </a>
										</div>
										<div>
											<i>$commentTimeStamp</i>
										</div>
									</div>
									<div class='post-img' style='text-align: center;'>
										<img src='$commentUrl' width='200px'>
									</div>
									<div class='p-3' style='font: 16px arial, sans-serif;'>
										<p> $commentCommentary </p>
									</div>";
									if($id_usuario == $commentUserId){
										echo"	<form method='POST'>
												<div class='text-right'>
													<button type='submit' name='commentDelete' value='$commentId' class='btn btn-danger'> Delete Post </button>
												</div>
												</form>";
										}


				echo
					"</div>";
					}
					echo"
					</div>";
					
				}

				
			?>
		</fieldset>

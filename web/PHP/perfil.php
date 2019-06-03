<?php include_once "nav.php"; ?>
<?php include_once "sidebar.php"; ?>
	<!-- Main-Page - Posts -->

		<div class="page">
			<div class="border-custom"> 
				<fieldset class="m-5">
					<legend><h3> All Posts:</h3></legend>

					<?php
					$sql = "SELECT user_info.*, post.*
					FROM user_info
					INNER JOIN post
					ON post.user_id = user_info.id 
					WHERE user_info.id = $id_usuario 
					ORDER BY timestamp DESC";

					$retorno = $conexao->query($sql);
					
					while ($registro = $retorno->fetch_array()) {

						$userId = $registro["user_id"];
						$comments = $registro["comment"];
						$url = $registro["url"];
						$timestamp = $registro["timestamp"];
						$likes = $registro["likes"];
						$name = $registro["fullname"];
						$photo= $registro["photo"];
						$idPost = $registro["id_post"];
						$redireciona = $registro["user"];
						echo "
						<div>
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
									<div>	
										<button type='submit' name='likes' value='$idPost' class='btn btn-primary'> $likes Likes </button>
										<button type='submit' class='btn btn-primary' data-toggle='modal' data-target='#modalLoginForm'> Comment </button>
									</div>";
						if($id_usuario == $userId){
							echo"	<div>
										<button type='submit' name='delete' value='$idPost' class='btn btn-danger'> Delete Post </button>
									</div>";
							}
						echo 
								"</form>
							</div>
						</div>";
						
					}

					?>
				</fieldset>
			</div>
		</div>
	</div>
</body>
</html>

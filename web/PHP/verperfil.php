<?php 
session_start();

error_reporting(1);
include_once "connect_db.php";

//User ID
$id_usuario = $_SESSION["id_usuario"];

//pega o usuario a ser visualizado
$profileAdd = $_GET["user"];

if ($profileAdd == NULL) {
	echo "<script>
	        alert('O usuário não existe!');
	        location.href='feed.php';
	    </script>";
  }

//cria comando SQL
$sql = "SELECT *
		FROM user_info
		WHERE user = '$profileAdd'";

//executa no BD
$retorno = $conexao->query($sql);

//error
if ($retorno == false) {
	echo $conexao->error;
  }
if ($registro = $retorno->fetch_array()) {

	$id = $registro["id"];
	$profileAdd = $registro["user"];
	$photo = $registro["photo"];
	$fullname = $registro["fullname"];

}
?>
	
<?php include_once "nav.php"; ?>

	<div class="container">

	<!-- Side-Page - Profile -->
	<div class="profileSide">
			<div class="border-custom pt-4 pb-4"> 
				<a href="#">
					<img src='<?php echo $photo ?>' width="70%">
					<h3 class="pt-2"> <?php echo  $fullname ?></h3>
				</a>
			</div>
			<div class="border-custom"> 
				<h4> Profile Friends </h4>
				<ul class="profiles profiles-display3">
					<div>
						<a href="perfil.php">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
					<div>
						<a href="#">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
					<div>
						<a href="#">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
					<div>
						<a href="#">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
					<div>
						<a href="#">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
					<div>
						<a href="#">
							<img src="https://i.pinimg.com/236x/9c/13/fd/9c13fd0d8583cb9c42b3f4808a2b3916--non-non-biyori-place.jpg" width="100%">
							<p>Friend Name</p>
						</a>
					</div>
				</ul>
			</div>

		</div>	
	<!-- Main-Page - Posts -->

		<div class="page">
			<div class="border-custom"> 
				<form method="POST">
					<div class="text-right pt-2">
						<button type="submit" id="solicitaçao" class="btn btn-dark" disabled>Adicionar</button>
					</div>
					<div class="text-right pt-2">
						<button type="submit" id="delete" class="btn btn-dark" disabled>Deletar</button>
					</div>
					<div class="form-group ml-5 mr-5 mt-5">
						<label for="comment">Comment:</label>
						<textarea class="form-control" rows="5" id="comment"></textarea>
					</div>
					<div class="form-group ml-5 mr-5 mb-0">
						<label for="url">URL:</label>
						<input type="text" class="form-control" id="url">
					</div>
					<br>
					<div class="text-right">
					  <button type="submit" class="btn btn-dark mr-5">Post It!</button>
					</div>
				</form>
			</div>
			<div class="border-custom"> 
				<fieldset class="m-5">
					<legend> All Posts </legend>
					<h2> Nope. </h2>
				</fieldset>
			</div>
		
		</div>
	</div>
</body>
</html>

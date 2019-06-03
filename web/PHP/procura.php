
<!-- PAGINA COM RESULTADOS DE PESQUISA DA NAVBAR -->
<?php include_once "nav.php"; ?>
<?php include_once "sidebar.php"; ?>

<?php 
	$search = $_GET["search"];

	// Cria comando SQl
	$sql = "SELECT * 
			FROM user_info 
			WHERE fullname LIKE '%$search%'";

	// Executa no BD
	$retorno = $conexao->query($sql);

	// Deu erro?
	if ($retorno == false) {
		echo $conexao->error;
	}
	
	echo "<div class='page padding-style'>
			<div class='border-custom'> 
				<fieldset>
					<legend>Results:</legend>
					<ul class='profiles-display6'>";

						while ($registro = $retorno->fetch_array()) {

							$id = $registro["id"];
							$photo = $registro["photo"];
							$fullname = $registro["fullname"];
							$user = $registro["user"];
		
						echo 
							"<div>							
								<a href='feed.php?user=$user'>
									<img src='$photo' width='100%'>
									$fullname
								</a>									
							</div>";
						}
	echo 
	"				</ul>
				</fieldset>
			</div>
		</div>"
				


?>
		
</body>
</html>
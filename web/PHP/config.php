<?php include_once "nav.php"; ?>

		<div class="container">
			
			<h1>Configurações</h1>
			<fieldset>
				<legend>Informações da Conta</legend><br>
				<label>Nome:</label>
				<input type="text" name="nome"><br><br>
				<label>Foto de perfil:</label>
				<input type="text" name="foto"><br><br>
				<label>E-mail:</label>
				<input type="email" name="email"><br><br>
			</fieldset>
			<fieldset>
				<legend>Privacidade</legend><br>
				<label>Comentários:</label>
				<select>
					<option>Público</option>
					<option>Só amigos</option>
				</select><br><br>	
				<label>Privacidade do Perfil:</label>
				<select>
					<option>Público</option>
					<option>Só amigos</option>
				</select><br><br>
			</fieldset>
			<fieldset>
				<legend>Conta</legend><br>
				<label>Senha atual:</label>
				<input type="password" name="senha"><br><br>
				<label>Nova senha:</label>
				<input type="password" name="senhanova"><br><br>
				<label>Confime a senha:</label>
				<input type="password" name="senhanova"><br><br>
				<input type="button" name="delete" value="Deletar conta">
			</fieldset><br><br>
			<input type="button" name="save" value="Salvar Configurações">
		</div>
	</body>
</html>
<div class ="bg-text">&nbsp;
	<h1>
		Iniciar sesión
	</h1><hr>
	<img style = "width:20%; max-width:100px" src="src/seyda.png"/>
	<form method="post" action="api/loginUser.php">
		<p>
			Usuario:
		</p>
		<input type="text" REQUIRED id="username" class="form-control" title= "Ingresa tu nombre de usuario" name="username" placeholder="Usuario">
		<p><br>
			Contrase&ntilde;a:
		</p>
		<input type="password" REQUIRED id="password" class="form-control" title= "Ingresa tu contrase&ntilde;a" name="password" placeholder="Contrase&ntilde;a">
		<p><br>
			<input type="submit" class = "btn btn-primary"  value="Conectarse">
		</p>
		<p>
			&iquest;Olvidaste tu <a href="forgot.php" class = "contentLink" title="Registrar usuario">
				contrase&ntilde;a</a>&quest;
		</p><hr>
		<p>
			&iquest;No tienes una cuenta&quest; <a href="register.php" class = "contentLink" title="Registrar usuario">
			Reg&iacute;strate aqu&iacute;
			</a>
		</p>
	</form>
</div>
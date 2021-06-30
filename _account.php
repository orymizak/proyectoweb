<?php
	$userID = $_SESSION['ID'];
	$sql = "SELECT * FROM users WHERE ID = $userID";
	$result = $mysqli->prepare($sql);
	$result->execute();

	while($registro = $result->fetch(PDO::FETCH_ASSOC)){
		$profile = $registro['profile_image'];
		$phone = $registro['phone'];
		$hashkey = $registro['hashkey'];
	}
?>

<body>
  	<div class ="bg-text">&nbsp;
		<h1>
			Cuenta de <?php echo ''.$_SESSION['username'].'';?><hr>
		</h1>
		<div>
			<form method = "post" action = "api/uploadProfile.php" enctype="multipart/form-data">
				<div>
					<img class ="profileIMG" id = "profileDisplay" title= "Haz clic para cambiar" onclick = "triggerClick();" src ="api/profile/<?php echo $profile;?>"/>
					<input hidden type ="file" onchange ="displayImage(this);" name = "profileImage" id = "profileImage" onChange="displayImage(this)" class = "form-control"/>
				</div><br>Imagen de perfil
				<div>
					<span id = "msgtext">
						&nbsp;
					</span>
				</div>
			</form>
		</div><hr>
		<h3>
			Contrase&ntilde;a 
			<a href ="#" onclick = "changePassword();closePhone();" class ="small-input">
				cambiar
			</a>
		</h3>
			<?php include "_password.php";?>
		<h3><hr>
			Tel&eacute;fono 
			<a href ="#" onclick = "changePhone();closePassword();" class ="small-input">
				cambiar
			</a>
		</h3>
			<?php include "_phone.php";?>
		<hr>
		<h3>
			HashKey
		</h3>

		<?php
		if ($hashkey == null || $hashkey == '') {
  echo '<form method="post" action="api/hashkey.php">
			<input type = "submit" class = "btn btn-success" value = "Generar"/>
		<form>';
		}
		else
		{
  echo "<p hidden id = 'hashkey2'>
  			".$hashkey."
		</p>
  		<input type='password' id = 'hashkey' value = ".$hashkey." readonly><br><br>
  		<button class = 'btn btn-danger' onclick='show();'>
  			Mostrar/ocultar
		</button>
  		<span id = 'btncopiar'></span>";
		}
		?>
		<br><br>
  	</div><br><br>
  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

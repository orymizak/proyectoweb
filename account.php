<!DOCTYPE html>
<HTML lang ="es">
  <head>
      <meta charset="utf-8">
        <title> Seyda || Login </title>
        <meta name = "description" content ="Tienda de pulseras y accesorios">
        <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
        <link rel ="stylesheet" href="css/style.css"/>
        <link rel ="stylesheet" href="js/javascript.js"/>

  </head>
  <body>
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
      	<div class ="bg-text">

			<h1>Cuenta de 
				<?php echo ''.$_SESSION['username'].'';?>
			</h1>

			<div>
				<form method = "post" action = "api/uploadProfile.php" enctype="multipart/form-data">
					<div>
						<img class ="profileIMG" id = "profileDisplay" title= "Haz clic para cambiar" onclick = "triggerClick();" src ="api/profile/<?php echo $profile; ?>"/>
						<input hidden type ="file" onchange ="displayImage(this);" name = "profileImage" id = "profileImage" onChange="displayImage(this)" class = "form-control"/>
					</div><br>

					<div>
						<span id = "msgtext"></span><br><br>
						
					</div>
				</form>

			</div>
			<h2>
			<hr>
			</h2>
			<h3>
				Contrase&ntilde;a <a href ="#" onclick = "changePassword();closePhone();" class ="small-input">cambiar</a>
			</h3>

				<div class="form-popup" style = "display:none" id="myForm">
					<form action="api/updatepassword.php" method = "post" class="form-container">
						<div>
							<b>Contrase&ntilde;a actual:</b>
						</div>
						<div>
							<input type="password" placeholder="Ingresa tu contrase&ntilde;a" name ="passwordold" id ="passwordold" minrequired>
						</div>
						<div><br>
						    <b>Nueva contrase&ntilde;a</b>
					    </div>
					    <div>
						    <input type="password" id ="password" placeholder="Contrase&ntilde;a nueva" name ="password" minlength="8" onkeyup='check();' required>
					    </div><br>
						    <b>Repite la nueva contrase&ntilde;a:</b>
					    <div>
						    <input type="password" placeholder="Repite la contrase&ntilde;a nueva" id="chk_pass" minlength="8" onkeyup='check();' required>
					    </div><br><span id = "message"></span><br><br>
						    <button type="submit" class="btn">Cambiar contrase&ntilde;a</button>
						    <button type="button" class="btn cancel" onclick="closePassword()">
						    	Cerrar
						    </button>
				    </form>
				</div>

			<h3><hr>
				Tel&eacute;fono <a href ="#" onclick = "changePhone();closePassword();" class ="small-input">cambiar</a>
			</h3>

				<div class="form-popup" style = "display:none" id="myForm2">
					<form action="api/updatephone(web).php" method = "post" class="form-container">
						<div>
							<b>Ingrese su nuevo tel&eacute;fono:</b>
						</div>
						<div><br>
			                <input type="tel" id="phone" pattern="[0-9]{10}" title= "Permitido: solo n&uacute;meros" name="phone" placeholder="N&uacute;mero de tel&eacute;fono" minlength="10" maxlength="10" required onchange='check();'><br>
		                </div>
                		<span id = "msgphone"></span><br>
						    <button type="submit" class="btn">Cambiar tel&eacute;fono</button>
						    <button type="button" class="btn cancel" onclick="closePhone();">
						    	Cerrar
						    </button>
				    </form>
				</div>

			<p>
			<?php
			 $p1 = substr($phone, 0,3);
			 $p2 = substr($phone, 3,3);
			 $p3 = substr($phone, 6,4);
			 echo '('.$p1.') - '.$p2.' - '.$p3.'';
			 ?>
			</p><hr>
			<h3>
				HashKey
			</h3>
			<?php 
            if ($hashkey == null || $hashkey == '') {
				echo '<form method="post" action="api/hashkey.php">
						<input type = "submit" value = "Generar"/>
					<form>';
			}
			else
			{
				echo "<p hidden id = 'hashkey2'>".$hashkey."</p>
				<input type='password' id = 'hashkey' value = ".$hashkey." readonly><br><br>
				<button onclick='show();'>Mostrar/ocultar</button>
				<span id = 'btncopiar'></span>";
			}
			?>
			<br>
			<br>
	  </div>
	<br>
	<br><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<br/>
<br/>
  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript">

function copyToClipboard(elemento) {
  var $temp = $("<input>")
  $("body").append($temp);
  $temp.val($(elemento).text()).select();
  document.execCommand("copy");
  $temp.remove();
}



  function triggerClick() {
  	document.querySelector('#profileImage').click();
  }
  function displayImage(e) {
  	if (e.files[0]){
  		var reader = new FileReader();
  		reader.onload = function(e) {
  			document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
  		}
  		reader.readAsDataURL(e.files[0]);
  		document.querySelector('#msgtext').innerHTML = '<a href="login.php"><input type = "button" value = "Cancelar"/></a> <button type = "submit" id ="subm" name ="save">Subir imagen</button>';
  	}
  }

	function show() {
	  var x = document.getElementById("hashkey");
	  var y = document.querySelector('#btncopiar');
	  if (x.type === "password") {
	    x.type = "text";
  		y.innerHTML = "<button onclick='copyToClipboard(\"#hashkey2\")';>Copiar</button>";
	  } else {
	    x.type = "password";
  		y.innerHTML = "";
	  }
	}

  function changePassword() {
  	document.getElementById("myForm").style.display = "block";
  }

  function closePassword() {
  	document.getElementById("myForm").style.display = "none";
  }

  function changePhone() {
  	document.getElementById("myForm2").style.display = "block";
  }

  function closePhone() {
  	document.getElementById("myForm2").style.display = "none";
  }

  var check = function() {

    password = document.getElementById('password').value;
    chk_pass = document.getElementById('chk_pass').value;
    color = document.getElementById('message').style.color;
    phone = document.getElementById('phone').value;
    message = document.getElementById('message').innerHTML;

    if (phone.length >= 1){
      if (phone.length < 10){
          document.getElementById('msgphone').style.color = 'red';
          document.getElementById('msgphone').innerHTML = 'Ingrese al menos 10 n&uacute;meros.';
      }
      else{
        document.getElementById('msgphone').innerHTML = '';
      }
    }

    if (phone.length == 0){
      document.getElementById('msgphone').innerHTML = '';
    }

    if (chk_pass.length >= 1){
        if (password == chk_pass) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Las contrase&ntilde;as nuevas coinciden.';
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Las contrase&ntilde;as nuevas no coinciden.';
      }
    }

    if (chk_pass.length == 0){
      document.getElementById('message').innerHTML = '';
    }

}

  </script>
</html>
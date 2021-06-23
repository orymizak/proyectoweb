<!DOCTYPE html>
<HTML>
  <head>
    <meta name="viewport" content="width=device-width"><!-- , user-scalable=no -->
    <link rel ="stylesheet" href="css/bar.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  </head>
  <body>
    <div class="topnav">

  	 	<a href="test.php" id = "title" class="active" title ="Ir a inicio">
        SEYDA
    	</a>

  	  <div id="myLinks">

        <a id="btn_1" class="link" title ="Ir al cat&aacute;logo" href ="#">Cat&aacute;logo</a>
      	<a id="btn_2" class="link" title ="M&aacute;s informaci&oacute;n acerca de nosotros" href ="#">

        <?php include('api/connection.php');

          session_start(); 

          $username = isset($_SESSION['username']);
            if ($username == null || $username == '') {
              echo "Mi&nbsp;cuenta</a>";
              echo '<a id="btn_3" class="link" title ="&iexcl;Con&eacute;ctate&excl;" href ="#">Registrarse</a>';
            }

            else {
              echo "Cuenta&nbsp;de&nbsp;".$_SESSION['username']."</a>";
              echo '<a id="btn_4" class="link-logout" title ="Salir" href ="api/logout.php">Cerrar&nbsp;sesi&oacute;n</a>';
              // $sql ="SELECT * from users where username = '{$_SESSION['username']}'";
              // $ret = mysqli_query($mysqli, $sql);
              //   if(!$ret) {
              //     // echo pg_last_error($mysqli);
              //     exit;
              //   }
              // // // jala datos especificos del usuario
              // while($row = mysqli_fetch_row($ret)) {
              //   echo $row[2];
              // }
            }
        ?>

  	  </div>

      <!-- Botón de hamburguesa en móviles -->
      <a href="javascript:void(0);" title ="Desplegar men&uacute;" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>

    <div class="main">
      <div id="sec0" style ="width: 100%; height:100%" class="tabcontent">
          <?php include "index.php" ?>
      </div>

      <div id="sec1" style ="width: 100%; height:100%" class="tabcontent">
          <?php include "products.php" ?>
      </div>

      <div id="sec2" class="tabcontent" style ="width: 100%; height:100%" >
          <?php include "login.php" ?>
      </div>     
      <div id="sec3" class="tabcontent" style ="width: 100%; height:100%" >
          <?php include "register.php" ?>
      </div>    
      <div id="sec4" class="tabcontent" style ="width: 100%; height:100%" >
          <?php include "#" ?>
      </div>     
    </div>

  <script type = "text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
  <!-- Este permite la inserción y función de javascript en el navbar -->
  <script type = "text/javascript" >
    <?php require_once("js/javascript.js");?>
  </script>

  </body>
</HTML>
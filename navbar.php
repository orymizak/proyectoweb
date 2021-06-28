<!DOCTYPE html>
<HTML>
<?php include('api/connection.php');
  session_start(); ?>
  <head>
    <meta name="viewport" content="width=device-width"><!-- , user-scalable=no -->
    <link rel ="stylesheet" href="css/style.css"/>
    <link rel ="stylesheet" href="css/bar.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    <div class="topnav">

  	 	<a href="index.php" class="active" title ="Ir a inicio">
        <img style = "padding: 0px;height:40px" src="src/seyda.png"/>
    	</a>

      <div id="myLinks">
        <a class = "link" title ="Ir al cat&aacute;logo" href="products.php">Productos</a>
        <a class = "link" title ="&iexcl;Con&eacute;ctate&excl;" href="login.php">

		<?php
          $username = isset($_SESSION['username']);
            if ($username == null || $username == '') {
              echo "Mi&nbsp;cuenta</a>";
            }

            else {
              echo "Cuenta&nbsp;de&nbsp;".$_SESSION['username']."</a>";
              echo '<a class = "link" title ="Mi bolsa" href ="cart.php">Mi&nbsp;bolsa</a>';
              echo '<a class = "link-logout" title ="Salir" href ="api/logout.php">Cerrar&nbsp;sesi&oacute;n</a>';
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

        <a class = "linkBack" title ="Volver" href="#"></a>
        
      </div>
      <!-- Botón de hamburguesa en móviles -->
      <a href="javascript:void(0);" title ="Desplegar men&uacute;" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    




    <script type = "text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    
    <!-- Este permite la inserción y función de javascript en el navbar -->
    <script type = "text/javascript" >
      <?php require_once("js/javascript.js");?>
    </script>

  </body>
</HTML>
<!DOCTYPE html>
<HTML lang ="es">
  <head>
      <meta charset="utf-8">
      <title>Seyda || Cat&aacute;logo</title>
    	<!-- Meta-description: descripción de la página -->
    	<meta name="description" content="Tienda de pulseras y otros accesorios">
      <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
    	<!-- Meta-viewport: forza el contenido de la página para evitar el acercamiento en celular -->
    	<!-- Insersión del archivo style.css y javascript.js -->
    	<link rel ="stylesheet" href="css/style.css"/>
    	<link rel ="stylesheet" href="js/javascript.js"/>
  	<!-- Para incluir una página en otra se usa la siguiente función fuera del body -->
  	<!-- Esto es útil para incluir la conexión de la base de datos en las páginas como la configuración de usuarios, login, etc., e incluso para incluir la barra de navegación. -->
  </head>
  <body style = "background-color: 

    background-color: #ffe4cf;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
  ">
  <!-- Ejemplo de acentos -->
  <!-- a = &aacute; ñ = &ntilde; ? = &quest; ¿ = &iquest; ! = &excl; ¡ = &iexcl; % = &percnt; -->
  <!-- AQUÍ VA EL CONTENIDO -->
  <div>&nbsp;
      <div class ="bg-text">
        <p style ="font-size:25px"><b>&iexcl;Bienvenido a Seyda&#33; El mejor sitio para comprar pulseras y accesorios personalizados.</b></p>
        <p style ="font-size:16px">Aqu&iacute; podr&aacute;s adquirir los mejores estilos de pulseras ideales para ti.</p>
        <br>

        <div class = "container" style ="text-align: left; margin-left:5px;"> 
          <h2>&Uacute;ltimas novedades</h2>

          <div class = "cont">
              <?php 
                $query = "SELECT * FROM products";
                $resultado = $mysqli->query($query);

                while($row = $resultado->fetch_assoc()) {
                  echo '
                  <div class = "card">
                    <h4>'.$row['name'].'</h4>
                    <img style = "width:10%" src="data:image;base64,'.base64_encode($row["image"]).'">
                    <p> '.$row['description'].'</h6>
                  </div>';
                }?>
          </div>

        </div><br><br>
      </div><br><br>
  </div>
    <!-- FIN DE CONTENIDO -->
  </body>
</html>
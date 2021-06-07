<!DOCTYPE html>
<HTML lang ="es">
  <head>
      <meta charset="utf-8">
    	<!-- Meta-description: descripción de la página -->
    	<meta name="description" content="Tienda de pulseras y otros accesorios">
      <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
    	<!-- Meta-viewport: forza el contenido de la página para evitar el acercamiento en celular -->
    	<!-- Insersión del archivo style.css y javascript.js -->
    	<link rel ="stylesheet" href="css/style.css"/>
    	<link rel ="stylesheet" href="js/javascript.js"/>
  	<!-- Para incluir una página en otra se usa la siguiente función fuera del body -->
  	<!-- Esto es útil para incluir la conexión de la base de datos en las páginas como la configuración de usuarios, login, etc., e incluso para incluir la barra de navegación. -->
  	<?php include "navbar.php" ?>
    <title>Seyda || Tienda de Accesorios</title>
  </head>

  <body>
  <!-- Ejemplo de acentos -->
  <!-- a = &aacute; ñ = &ntilde; ? = &quest; ¿ = &iquest; ! = &excl; ¡ = &iexcl; % = &percnt; -->

    <!-- AQUÍ VA EL CONTENIDO -->
      <br>
      <br>
      <br>
      <div class ="bg-text">
        <b><p style ="font-size:25px">&iexcl;Bienvenido a Seyda&#33; El mejor sitio para comprar pulseras y accesorios personalizados.</p></b>
        <p style ="font-size:16px">Aqu&iacute; podr&aacute;s adquirir los mejores estilos de pulseras ideales para ti.</p>
        <br>
        <div class = "container" style ="text-align: left; margin-left:5px;"> 
          <h2>&Uacute;ltimas novedades</h2>
          <div class = "box">

              <a href="">
                <div class="box-row">
                  <div class="box-cell box1">
                    <img src="src/agatha.jpg" style = "border: 1px solid black;width:150px" title="pulseras para pareja" alt="pulseras para pareja agatha">
                  </div>
                  <div class="box-cell box2">
                    <div>Agatha y Bola Blanca</div> Par de pulseras tejidas con hilo grueso y piedra Agatha y bola blanca al centro.
                  </div>
              </a>
              &nbsp;

              <a href="">
                <div class="box-row">
                  <div class="box-cell box1">
                    <img src="src/universo.jpg" style = "border: 1px solid black;width:150px" title="pulsera universo" alt="pulsera universo">
                  </div>
                  <div class="box-cell box2">
                    <div>Pulsera Universo</div>Pulsera de piedras naturales con separadores en chapa de oro 24k.
                  </div>
              </a>
              &nbsp;

              <a href="">
                <div class="box-row">
                  <div class="box-cell box1">
                    <img src="src/tobillera.jpg" style = "border: 1px solid black;width:150px" title="tobillera pucca" alt="tobillera pucca">
                  </div>
                  <div class="box-cell box2">
                    <div>Tobillera Pucca</div> Tobillera de hilo rodeada de Pucca de colores y cuarzo cristalizado.
                  </div>
              </a>
                    
          </div>
        </div>
        <div><br><br>
        <a href = "">Ir al cat&aacute;logo</a><br><br>
          
        </div>
      </div>
    <!-- FIN DE CONTENIDO -->

  </body>
</html>
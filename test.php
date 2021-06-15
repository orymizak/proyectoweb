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

	 	<a href="test.php" id = "seyda" class="active" title ="Ir a inicio">
	    	<p id="title">SEYDA</p>
	  	</a>

	  	<div id="myLinks">
  			<a id="btn_1" class="link" title ="Ir al cat&aacute;logo" href ="#">Cat&aacute;logo</a>
        	<a id="btn_2" class="link" title ="M&aacute;s informaci&oacute;n acerca de nosotros" href ="#">Cuenta</a>
        	<a id="btn_3" class="link" title ="&iexcl;Con&eacute;ctate&excl;" href ="#">Test</a>
        	<a id="btn_4" class="link" title ="&iexcl;Con&eacute;ctate&excl;" href ="#">Test</a>

		  		<form id="searchBar" accept-charset="utf-8" action="search.php">
		        		<input type="text" value="" name="products" placeholder="Busca art&iacute;culos" label="Buscar">
			        	<input type="submit" style = "float:right" value="Buscar">
		  		</form>
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
        <?php include "config.php" ?>
    </div>    

    <div id="sec4" class="tabcontent" style ="width: 100%; height:100%" >
        <?php include "register.php" ?>
    </div>    
  </div>


<script>

//Check URL
function checkUrl() {
  var url = window.location.href;
  var frames = document.querySelectorAll('.tabcontent');
  frames.forEach(frame => {
    if( url.search( frame.id ) > 0 ) {
      frame.style.display = "block";
      frame.classList.add("active");
    } else {
      frame.style.display = "none";
      frame.classList.remove("active");
    }
  })
}

window.onload = checkUrl();

//Check Button Click
var btns = document.querySelectorAll(".link");

function toggleFrame(e){
  var frames = document.querySelectorAll('.tabcontent');
  var x = e.target.id.substr(-1);
  frames.forEach(frame => {
    if(frame.id.includes(x)){
      frame.style.display = "block";
        frame.classList.add("active");
    } else {
      frame.style.display = "none";
        frame.classList.remove("active");
    }
  });
  
}

btns.forEach(btn => {
  btn.addEventListener("click", toggleFrame);
})

sec0.style.display = "block";

</script>




    <script type = "text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <!-- Este permite la inserción y función de javascript en el navbar -->
    <script type = "text/javascript" >
      <?php require_once("js/javascript.js");?>
    </script>

  </body>
</HTML>
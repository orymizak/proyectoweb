      // función para detectar cambio de pantalla y adaptar botones
      window.onresize = function(){
        var w = parseInt(window.innerWidth);
        var x = document.getElementById("myLinks");
        if(w > 900) {
          x.style.display = "flex";
          return;
        }
        if (w <= 900)
        {
          x.style.display = "none";
        }
      }

      // función del botón de hamburguesa
      function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
          x.style.display = "none";
          return;
        } 
          x.style.display = "block";
      }
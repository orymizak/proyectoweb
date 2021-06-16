      // función para detectar cambio de pantalla y adaptar botones
      window.onresize = function(){
        var w = width = parseInt(window.innerWidth);
        var x = document.getElementById("myLinks");

      // var width = w = $(document).width();

        console.log(w +"|" +width);
        var btn_1 = document.querySelector('#btn_1'); 
        var btn_2 = document.querySelector('#btn_2'); 
        var btn_3 = document.querySelector('#btn_3'); 
        var btn_4 = document.querySelector('#btn_4'); 

        if(w >= 811) {
          x.style.display = "flex";
          btn_1.removeEventListener("click", myFunction);
          btn_2.removeEventListener("click", myFunction);
          btn_3.removeEventListener("click", myFunction);
          btn_4.removeEventListener("click", myFunction);
        }
        if (w < 810)
        {
          x.style.display = "none";
          btn_1.addEventListener("click", myFunction);
          btn_2.addEventListener("click", myFunction);
          btn_3.addEventListener("click", myFunction);
          btn_4.addEventListener("click", myFunction);
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
      });
    }

    window.onload = checkUrl();
    sec0.style.display = "block";

    window.onload = function() {
      width = $(document).width();
      if (width <= 810) {
        document.querySelector('#btn_1').addEventListener("click", myFunction);
      }
    }

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
    });


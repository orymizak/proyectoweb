
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
      document.querySelector('#msgtext').innerHTML = '<a href="account.php"><input type = "button" class = "btn btn-danger" value = "Cancelar"/></a> <button type = "submit" class = "btn btn-success" id ="subm" name ="save">Subir imagen</button>';
    }
  }

  function show() {
    var x = document.getElementById("hashkey");
    var y = document.querySelector('#btncopiar');
    if (x.type === "password") {
      x.type = "text";
      y.innerHTML = "<button class = 'btn btn-primary' onclick='copyToClipboard(\"#hashkey2\")';>Copiar</button>";
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
    chk_pass = document.getElementById('confirm_password').value;
    name = document.getElementById('username').value;
    color = document.getElementById('message').style.color;
    username = document.getElementById('username').value;
    phone = document.getElementById('phone').value;
    message = document.getElementById('message').innerHTML;
    msguser = document.getElementById('msguser').innerHTML;
    msgphone = document.getElementById('msgphone').innerHTML;

    if (username.length >= 1){
      if (username.length < 8){
          document.getElementById('msguser').style.color = 'red';
          document.getElementById('msguser').innerHTML = 'Ingrese al menos 8 caracteres.';
      }
      if (username.length >= 8){
          document.getElementById('msguser').innerHTML = '';
      }
    }

    if (username.length == 0){
      document.getElementById('msguser').innerHTML = '';
    }

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
        document.getElementById('message').innerHTML = 'Las contrase&ntilde;as coinciden.';
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Las contrase&ntilde;as no coinciden.';
      }
    }

    if (chk_pass.length == 0){
      document.getElementById('message').innerHTML = '';
    }
}

  var check2 = function() {
    password = document.getElementById('password').value;
    chk_pass = document.getElementById('confirm_password').value;
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

  // función para detectar cambio de pantalla y adaptar botones
  window.onresize = function(){
    var w = width = parseInt(window.innerWidth);
    var x = document.getElementById("myLinks");

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

  window.onload = function() {
      var $recaptcha = document.querySelector('#g-recaptcha-response');

      if($recaptcha) {
          $recaptcha.setAttribute("required", "required");
      }
  };

  btns.forEach(btn => {
    btn.addEventListener("click", toggleFrame);
  });


<div class="form-popup" style = "display:none" id="myForm2">
  <form action="api/updatephone(web).php" method = "post" class="form-container">
    <p>
      <b>Ingrese su nuevo tel&eacute;fono:</b>
    </p>
      <p>
        <input type="tel" class="form-control" id="phone" pattern="[0-9]{10}" title= "Permitido: solo n&uacute;meros" name="phone" placeholder="N&uacute;mero de tel&eacute;fono" minlength="10" maxlength="10" required onchange='check2();'>
      </p>
        <p id = "msgphone"></p>
        <button type="submit" class="btn btn-success">
          Cambiar tel&eacute;fono
        </button>
        <button type="button" class="btn btn-danger" onclick="closePhone();">
          Cerrar
        </button>
    </form><br>
</div>
<p>
<?php
 $p1 = substr($phone, 0,3);
 $p2 = substr($phone, 3,3);
 $p3 = substr($phone, 6,4);
 echo '('.$p1.') - '.$p2.' - '.$p3.'';
 ?>
</p>
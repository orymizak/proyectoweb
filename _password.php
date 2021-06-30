    <div class="form-popup" style = "display:none" id="myForm">
      <form action="api/updatepassword.php" method = "post" class="form-container">
          <p>
            <b>Contrase&ntilde;a actual:</b>
          </p>
          <p>
            <input type="password" class="form-control" placeholder="Ingresa tu contrase&ntilde;a" name ="passwordold" id ="passwordold" minrequired>
          </p>
          <p>
            <b>Nueva contrase&ntilde;a:</b>
          </p>
          <p>
            <input type="password" class="form-control" id ="password" placeholder="Contrase&ntilde;a nueva" name ="password" minlength="8" onkeyup='check2();' required>
          </p>
          <p>
            <b>Repite la nueva contrase&ntilde;a:</b>
          </p>
          <p>
            <input type="password" class="form-control" placeholder="Repite la contrase&ntilde;a nueva" id="confirm_password" minlength="8" onkeyup='check2();' required>
          </p>
          <p id = "message"></p>
          <button type="submit" class="btn btn-success">
            Cambiar contrase&ntilde;a
          </button>
          <button type="button" class="btn  btn-danger" onclick="closePassword();">
            Cerrar
          </button>
        </form>
    </div>
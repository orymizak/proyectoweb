<!DOCTYPE html>
<HTML lang="es">

<head>
    <meta charset = "utf-8">
    <title> Seyda || Login </title>
    <meta name = "description" content ="Tienda de pulseras y accesorios">
    <link rel="stylesheet" href="css/login.css"/>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

    <body>
        <div class= "wrapper fadeInDown">
            <div id="formContent">
                <div>
                    <img src="src/admin.png" id="icon" alt="icono usuario" />
                </div>

                <form id="loginForm" method="post" action="connection.php">
                    <input type="text" id="username" name="user" placeholder="username">
                    <input type="password" id="password" name="password" placeholder="password">
                    <input type="submit" value="Log In" >
                </form>
            </div>
        </div>
    </body>

</html>

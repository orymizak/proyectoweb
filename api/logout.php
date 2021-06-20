<?php
    error_reporting(E_ERROR);
    session_start();
    session_destroy();
    echo'<script type="text/javascript">
    alert("Usted se ha desconectado.");
    window.location.href="https://localhost/test.php";
    </script>';
?>

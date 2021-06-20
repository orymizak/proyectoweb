<?php

$imagedata = file_get_contents("test.bin");
             // alternatively specify an URL, if PHP settings allow
$base64 = base64_encode($imagedata);

echo '<img src ="data:image;base64,'.$base64.'">';

?>
<?php
 
     error_reporting(E_ERROR);
	 require_once('connection.php');
	 
	 $imageID = $_POST['imageID'];

	 $sql = "SELECT ID, image FROM products WHERE ID = '$imageID'";
	 $res = mysqli_query($mysqli,$sql);
	 
	 $result = array();

	 $url = "localhost/api/getImage.php?img=";

	 while($row = mysqli_fetch_array($res)){
		 array_push($result,array('url'=>$url.$row[0]));
	 // echo $url.$row[1];
	 }
 echo json_encode(array("result"=>$result));

 mysqli_close($mysqli);
 
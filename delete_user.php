<?php
require_once "db.php";
if (isset($_POST["userss"])) {

$rowCount = count($_POST["userss"]);
for($i=0;$i<$rowCount;$i++) {


	$sil=$db->prepare("DELETE from users where userId=:userId");
	$kontrol=$sil->execute(array(
		'userId' => $_POST["userss"][$i]
	));if($kontrol){
		header("Location:index.php");
	}	
}
}



?>
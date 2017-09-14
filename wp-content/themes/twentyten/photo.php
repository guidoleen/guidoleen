<?php
if(isset($_POST['fotoinput']))
{
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

	echo  $_FILES["fileToUpload"]["name"];

	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
	{
	  echo "FOTOINVOEG is gelukt: " . $_FILES["fileToUpload"]["name"];
	}
	else
	{
	 	echo "Niet gelukt";
	}
}
$txtcontent = ($txtcontent . "<img src='" . $target_file . "'>";

// header("Location: http://www.guidoleen.nl/portfolio/wp-content/themes/twentyten/your.php");
?>
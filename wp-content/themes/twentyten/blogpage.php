<?php
/*
Template Name: blogpage
*/

include 'header.php';
?>

<div id="contentblog">
<div class="blogclass">
<!-- <center> -->

                
                	<span class="leesverder"><a href="../guidoblog.php">TERUG</a></span>
<br />
                        

<?php

$con = mysqli_connect("guidoleen.nl","cl48-guidoleen","guidoleen","cl48-guidoleen");

if(!$con)
{
 die("Niet Goed" . mysqli_connect_error());
}
else
{
$sql = "SELECT * FROM G_Blog WHERE IDBlog = " . $_GET["page_id"];
$result = mysqli_query($con, $sql);

$string = "";
if(!$result) 
{
 echo "NIET GELUKT";
}
elseif(mysqli_num_rows($result) > 0)
{	
	while($rij = mysqli_fetch_assoc($result))
	{
		if($rij['Photo'] == "")
		{
		echo $string = "<h2>" . $rij['Title'] . "</h2><h3>" . stripslashes($rij['Content']) . "</h3><br />" . "<br /><a class='leesverder' href='http://www.guidoleen.nl/portfolio/wp-content/themes/twentyten/guidoblog.php'>Terug naar overzicht</a><br/><br/>";
		}
		else
		{
		echo $string = "<img class='blogimg' src='../" . $rij['Photo'] . "' border='0'>" . "<h2>" . $rij['Title'] . "</h2><h3>" . stripslashes($rij['Content']) . "</h3><br />" . "<br /><a class='leesverder' href='http://www.guidoleen.nl/portfolio/wp-content/themes/twentyten/guidoblog.php'>Terug naar overzicht</a><br/><br/>";
		}
	}
}
mysqli_close($con);
}
?>
<!-- </center> -->
</div>
</div>


<?php include 'footer.php';?>

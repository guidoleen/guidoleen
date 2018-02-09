<?php
/*
Template Name: blogpage
*/

include 'header.php';
?>

<center>
<div id="content0">
<span class="leesverder"><a href="http://www.guidoleen.nl/portfolio/">NAAR PORTFOLIO</a></span>

<br />
                        

<?php

$con = mysqli_connect("guidoleen.nl","cl48-guidoleen","guidoleen","cl48-guidoleen");

if(!$con)
{
 die("Niet Goed" . mysqli_connect_error());
}
else
{
$sql = "SELECT * FROM G_Blog ORDER BY Datum DESC";
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
			echo $string = "<br /><h1>" . $rij['Title'] . "</h1>" .  "<h3>" . stripslashes(substr($rij['Content'],0,60)) . "..." . "</h3>" . "<a class='leesverder' href='http://www.guidoleen.nl/portfolio/wp-content/themes/twentyten/blogpage.php
/?page_id=" . $rij['IDBlog'] . "'>Lees verder...</a><br/><br/>";
		}
		else
		{
			echo $string = "<br /><a href='http://www.guidoleen.nl/portfolio/wp-content/themes/twentyten/blogpage.php
/?page_id=" . $rij['IDBlog'] . "'><img class='startimg' src='" . $rij['Photo'] . "' border='0'></a><h1>" . $rij['Title'] . "</h1>" .  "<h3>" . stripslashes(substr($rij['Content'],0,60)) . "..." . "</h3>" . "<a class='leesverder' href='http://www.guidoleen.nl/portfolio/wp-content/themes/twentyten/blogpage.php
/?page_id=" . $rij['IDBlog'] . "'>Lees verder...</a><br/><br/>";

		}

	}
}
mysqli_close($con);
}
?>

</div>
</center>

<?php include 'footer.php';?>
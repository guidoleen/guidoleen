<!-- BEGIN PAGE -->
<?php
/*
Template Name: blogpage
*/

	error_reporting(0);
include 'header.php';
include '_DbConn.php';
?>
<style>
#BlogList
{
	position: absolute;
	top: 0%;
	right: 5%;
	background-color: #fff;
	padding: 10px;
	z-index:999;
	line-height:2em;
}
#invoerveld {
    font-family: "Open Sans",sans-serif;
    position: relative;
    top: 150px;
	left: 20px;
	color: #555555;
}
#pasww 
{	
	left: -20px;
	width: 100%;
	background: #c8c8c8;
	position: absolute;
	padding-left: 20px;
}
.btn {
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Open Sans",sans-serif;
  color: #555555;
border-color: #ffffff;
  font-size: 14px;
  background: #ffffff;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
	border: 0px;
}
.btnred
{
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Open Sans",sans-serif;
  color: #000000;
border-color: #FF0000;
  font-size: 14px;
  background: #FF0000;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
	border: 0px;
}
.btn:hover {
  background: #d6d6d6;
  text-decoration: none;
}
.btnred:hover {
  background: #d6d6d6;
  text-decoration: none;
}
</style>
<!-- PHP SCRIPT -->
<?php

//// IDBlog 	Datum 	Title 	Content 	Photo 

$con = mysqli_connect($DB_HOST, $DB_USERNAAM, $DB_PASSW, $DB_DATABASE);

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
		$string = "<img style='max-width: 20%' src='../" . $rij['Photo'] . "' border='0'>" . "<h2>" . $rij['Title'] . "</h2><h3>" . $rij['Content'] . "</h3><br />" . "<br /><a class='leesverder' href='http://www.guidoleen.nl/portfolio/wp-content/themes/twentyten/guidoblog.php'>Terug naar overzicht</a><br/><br/>";

$txttitle = $rij['Title'];

$txtcontent = $rij['Content'];
	
$txtphoto = $rij['Photo'];
	

	}
}
mysqli_close($con);
}

///////// List Connection  ////////
$listurl = "";
$conLaad = mysqli_connect($DB_HOST, $DB_USERNAAM, $DB_PASSW, $DB_DATABASE);
$sqlUrl = "SELECT * FROM G_Blog";

	if(!$conLaad)
	{
		die(mysqli_connect_error());
	}
	else
	{
		$DBVraag = mysqli_query($conLaad, $sqlUrl);
		
		while($RijVraag = mysqli_fetch_assoc($DBVraag))
		{
			$listurl = $listurl  . '<a href="your.php?page_id=' . $RijVraag ['IDBlog'] . '">' .  $RijVraag ['Title'] . '</a><br />';
		}
	}
mysqli_close($conLaad);
?>

<?php
////////////////////////////

if(isset($_POST['update']))
{

	$conUP = mysqli_connect($DB_HOST, $DB_USERNAAM, $DB_PASSW, $DB_DATABASE);

	if(!$conUP)
	{
		 die('Niet Goed' . mysqli_connect_error());
	}
	else
	{

		$txttitle = $_POST['TxtTitle'];
		$txtcontent = $_POST['TxtContent'];
		// $txtphoto = $rij['Photo'];


		$sqlUP = "UPDATE G_Blog SET Title = '" . $txttitle . "', Content = '" . $txtcontent . "'  WHERE IDBlog = " . $_GET["page_id"];

	$resultUP = mysqli_query($conUP, $sqlUP);
	}

	if(!$resultUP)
	{
		die('Gaat NIET: ' . mysql_error());
	}
echo "GELUKT";

mysqli_close($conUP);
}

///////////////////////
if(isset($_POST['delete']))
{
	$ConDel = mysqli_connect($DB_HOST, $DB_USERNAAM, $DB_PASSW, $DB_DATABASE);
	$DelSql = "DELETE FROM G_Blog WHERE IDBlog = " . $_GET["page_id"];
	
	if(!$_GET["page_id"])
	{
		die('geen geldige ID');
	}

	if(!$ConDel)
	{
		 die('Niet Goed' . mysqli_connect_error());
	}
	else
	{
		$DELRESULT = mysqli_query($ConDel, $DelSql);
	}
	if(!$DELRESULT)
	{
		echo mysql_error();
	}
mysqli_close($ConDel);
}
?>

<?php
////////////////////////////

if(isset($_POST['insert']))
{

	$conIN = mysqli_connect($DB_HOST, $DB_USERNAAM, $DB_PASSW, $DB_DATABASE);

	if(!$conIN)
	{
		 die('Niet Goed' . mysqli_connect_error());
	}
	else
	{
		$sqlIN = "INSERT INTO G_Blog (Title, Content) VALUES ('Titel', 'Bericht')";

	$resultIN = mysqli_query($conIN, $sqlIN);
	}

	if(!$resultIN)
	{
		die('Gaat NIET: ' . mysql_error());
	}
echo "GELUKT";

mysqli_close($conIN);
}
////////// Foto invoegen Text //////////
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

/////// database fotoinvoeg
	$conUP = mysqli_connect($DB_HOST, $DB_USERNAAM, $DB_PASSW, $DB_DATABASE);

	if(!$conUP)
	{
		 die('Niet Goed' . mysqli_connect_error());
	}
	else
	{

		$txtcontent = $_POST['TxtContent'];

		$sqlUP = "UPDATE G_Blog SET Content = '" . $txtcontent . "'  WHERE IDBlog = " . $_GET["page_id"];

	$resultUP = mysqli_query($conUP, $sqlUP);
	}

	if(!$resultUP)
	{
		die('Gaat NIET: ' . mysql_error());
	}
echo "GELUKT";

mysqli_close($conUP);
}

?>
<?php
//////////////////////////// INLOGGEN ///////////
// $IDcmsStr = "style='display: show'";
$IDcmsStr = "style='display: none'";

if(isset($_POST['inloggen']))
{
	$usrname = $_POST['naam'];
	$pwdname = $_POST['wachtwoord'];
	session_start();
	$_SESSION['login_name'] = $usrname;
	$_SESSION['login_user'] = $pwdname;
		
	if(($usrname == "guido") && ($pwdname == "555"))
	{
	echo "Juist";
	// document.getElementById('IDcms').style.display = 'show';
		$IDcmsStr = "style='display: show'";
		// session_start();
		// echo $_SESSION['wachtwoord'];
	}
	

}
///////// SESIES Destroy ///////////
if(isset($_POST['uitlog']))
{
	// session_unset();
	session_start();
	// session_destroy();
	$_SESSION['login_user'] = "22";
	echo "Nu uitgelogged....";
}

////////////////// SHOW TEXT /////////////
// $txtcontent;
if(isset($_POST['Showbutt']))
{
	// echo $txtcontent;
	echo "<script type='text/javascript'>alert('" . $txtcontent . "');</script>";
}
?>
<!-- END PHP SCRIPT -->
<!-- END -->

<!--  TEXTEDIT   -->
<script>

/////// A toevoegen ////////
function Atoevoegen(txtarea)
{
var CaretPos = 0; 
// IE Support
	if (document.selection) {
	txtarea.focus ();
	var Sel = document.selection.createRange ();
	Sel.moveStart ('character', -ctrl.value.length);
	CaretPos = Sel.text.length;
	}
// Firefox support
	else if (txtarea.selectionStart || txtarea.selectionStart == '0')
	CaretPos = txtarea.selectionStart;


	var front = (txtarea.value).substring(0, CaretPos);  
	var back = (txtarea.value).substring(CaretPos,txtarea.value.length); 
	
	var objUrl = document.getElementById("inpUrl").value;
	var objName = document.getElementById("inpUrlName").value;
	if(objUrl.toString() == "")
	{
		alert("invullen van Url");
	}
	else
	txtarea.value = front + '<a href="http://' + objUrl + '">' + objName + '</a>' + back;
}

/////// BR toevoegen ////////
function BRtoevoegen(txtarea)
{
var CaretPos = 0; 
// IE Support
	if (document.selection) {
	txtarea.focus ();
	var Sel = document.selection.createRange ();
	Sel.moveStart ('character', -ctrl.value.length);
	CaretPos = Sel.text.length;
	}
// Firefox support
	else if (txtarea.selectionStart || txtarea.selectionStart == '0')
	CaretPos = txtarea.selectionStart;


	var front = (txtarea.value).substring(0, CaretPos);  
	var back = (txtarea.value).substring(CaretPos,txtarea.value.length); 

	txtarea.value = front + "</br>" + back;
}
///// JS FotoNaamInvoeg
function IMGtoevoegen(txtarea)
{
var CaretPos = 0; 
// IE Support
	if (document.selection) {
	txtarea.focus ();
	var Sel = document.selection.createRange ();
	Sel.moveStart ('character', -ctrl.value.length);
	CaretPos = Sel.text.length;
	}
// Firefox support
	else if (txtarea.selectionStart || txtarea.selectionStart == '0')
	CaretPos = txtarea.selectionStart;


	var front = (txtarea.value).substring(0, CaretPos);  
	var back = (txtarea.value).substring(CaretPos,txtarea.value.length); 

	var fotonaam = document.getElementById("fileToUpload").value;

	txtarea.value = front + '<img border="0" src="../images/' + fotonaam + '">' + back;
}
function ShowMe()
{
 var myWindow = window.open("", "myWindow", "");
	var content = document.getElementById('TxtContent').value;
    myWindow.document.write(content);

	// document.getElementById('SHOW').innerHTML = document.getElementById('TxtContent').value;
}
</script>
<!--  END TEXTEDIT   -->

<!-- EDITOR -->
<div id="invoerveld">
	<div id="pasww">
	<form name="formuww" method="post">
	Naam: <input type="text" name="naam" class="btn">
	Wachtwoord: <input type="password" name="wachtwoord" class="btn">
	<input type="submit" name="inloggen" value="inloggen" class="btn">
	<input type="submit"  name="uitlog" value="Uitloggen" class="btn">
	</form>
	</div>


<div id="IDcms" <?php echo $IDcmsStr; ?> >
<form method="post" name="formu" id="formuID" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
<br /><br /><br />
<input type="submit" name="insert" value="Maak bericht aan" class="btnred" /> <input type="submit" name="delete" value="Verwijder dit bericht" class="btnred" /><br /><br />

Titel kop: <br />
<textarea style="left: 50px" rows="1" cols="100" name="TxtTitle" id="TxtTitle" wrap="none"> <?php echo $txttitle; ?> </textarea><br /><br />

Text: <br />
<input type="button" class="btn" value="<BR>" onclick="BRtoevoegen(document.getElementById('TxtContent'));"> Url Link:<input type="text" id="inpUrl" class="btn"> Url Naam:<input type="text" id="inpUrlName" class="btn">  <input type="button" class="btn" value="<LINK>" onclick="Atoevoegen(document.getElementById('TxtContent'));"><br><br />

<textarea style="left: 50px" rows="10" cols="100" name="TxtContent" id="TxtContent" wrap="physical"><?php echo $txtcontent; ?></textarea><br />
<br />

Foto tussen text: <input type="file" name="fileToUpload" id="fileToUpload" class="btn"> <input type="button" class="btn" name="fotonaam" value="Foto Naam" onclick="IMGtoevoegen(document.getElementById('TxtContent'));" />
<input type="submit" class="btn" name="fotoinput" value="Foto Toevoegen" /><br /><br />

<input type="submit" class="btnred" name="update" value="SAVE" /><br />

</form>

</br></br>
<form name="showw" method="post" enctype="multipart/form-data">
<input type="submit" class="btn" id="Showbutt" name="Showbutt" value="show me the thing">
<!-- <input type="button" class="btn" id="Showbutt" onclick="ShowMe()" value="show me the thing"> -->

</form>
<div id="SHOW"></div>

<br /><br />
</div>
</div>

<!-- END EDITOR -->
<center>
<div id="content0">
FotoNaam: <?php echo $txtphoto; ?></br>
<span class="leesverder"><a href="../guidoblog.php">TERUG</a></span>
<br />
                        
<?php echo $string ?>

</div>
</center>

<div id="BlogList"><?php echo $listurl; ?></div>

<?php include 'footer.php';?>

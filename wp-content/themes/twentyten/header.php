<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta content="Guido, Leen, Nieuwegein - 06-42417175 - guido@guidoleen.nl - App ontwikkeling en UX design van online applicaties. Webbased programming: php, mysql, C#, javascript, python. Internetsite. Variatie en diversiteit is mijn kracht. Op deze site; Application en design." name="description">
<meta content="UX-design, usability, internet, applicaties, php, c#, .net, css, javascript, html, conceptontwikkeling, internetsite, site, internet, webdesign, web design, internetdesign, websites, beeldretouche, beeldbewerkingen, advertentie, advertenties, brochure, brochures, mailing, mailings, leaflet, leaflets, verpakking, verpakkingen, periodiek, periodieken, technisch, sfeer, food, constructie, Nieuwegein, Utrecht, Amsterdam" name="keyword">
<meta content="Guido Leen, UX Design & Development - guido@guidoleen.nl" name="author">
<meta content="Guido Leen, UX Design & Development guido@guidoleen.nl" name="publisher">
<meta content="(c) 2015 Guido, Design, Nieuwegein" name="copyright">
<meta content="NL" name="language">
<meta content="ALL" name="robots">
<meta content="guidoleen@live.nl" http-equiv="reply-to">
<title>Guido Leen UX Design & Software Development</title>

<?php
	$uri = $_SERVER["HTTP_HOST"];
	$strUri = "";
	if($uri == "localhost")
	{
		$strUri = 'wp-content/themes/twentyten';
	}
	else
	{
		$strUri = get_template_directory_uri();
	}
?>
<!-- SCRIPTS -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
<script src="/portfolio/wp-content/themes/twentyten/js/jquery.js"></script>

<link href="<?php echo $strUri . '/css/stylextra.css' ?>" type="text/css" rel="stylesheet" />

</script>
<script language="javascript">
function schermh()
{
	// var totalh = window.innerHeight;
	var aa = document.getElementById("navigatie").offsetWidth;
	document.getElementById("content2").style.width = (aa + "px");
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-13278901-4', 'guidoleen.nl');
  ga('send', 'pageview');

</script>
</head>
<body>
<div id="header"><a href="http://www.guidoleen.nl">
<script>
function glogo()
{
	var fromUrl = window.location.href;
	var arrUri = fromUrl.split("//");
	arrUri = arrUri[1].split("/");
	var strUri = "";
	if(arrUri[0] == "localhost")
	{
		strUri = "http://localhost/guido/guidoleen";
	}
	var strTotal = '<img id="glogo" border="0" src="' + strUri + '/portfolio/wp-content/themes/twentyten/images/glogogroot.png" />';
	return strTotal;
}
document.write(glogo());

// UI menu Item
$(document).ready(function(){
	iC = 0;
	$("#menu_cross").click(function()
	{
		iC++;
		$("#menu").toggle();
		if( iC > 1 ){
			iC = 0;
		}
		if( iC == 1 )
		{
			$("rect.top").attr("class", "clicked bar top");
			$("rect.middle").attr("class", "clicked bar middle");
			$("rect.footer").attr("class", "clicked bar footer");
		}
		else
		{
			$("rect.top").attr("class", "bar top");
			$("rect.middle").attr("class", "bar middle");
			$("rect.footer").attr("class", "bar footer");
		}
	});
});
</script>
	<div id="title_logo">
		<center>
			</a> Guido Leen | Development en UX Design<br />Front-end en usability. <br />
		</center>
	</div>
</div>

    <div id="navigatie">
		<ul id="menu">
			<li><a href="http://m.guidoleen.nl/">MOBILE  |  </a></li>
			<li><a href="http://www.guidoleen.nl/portfolio/?page_id=2">OVER  |   </a></li>
			<li><a href="http://www.guidoleen.nl/portfolio/?page_id=309">ONLINE DEV  |  </a></li> 
			<li><a href="http://www.guidoleen.nl/portfolio/">UX DESIGN  |   </a></li> 
			<li><a href="http://www.guidoleen.nl/portfolio/?page_id=207">CONTACT  |   </a></li> 
			<li><a href="http://www.guidoleen.nl/portfolio/wp-content/themes/twentyten/guidoblog.php">BLOG  |   </a></li> 
		<!-- <li><a href="http://www.guidoleen.nl/wordpress/?page_id=4">WERK  |   </a></li> -->
		</ul>
		<div id="menu_cross"><div id="test" class="sfsdfdf"></div>
			<svg id="burger-svg" class="burger-svg">
				<rect x="-1" y="-1" width="30" height="30" id="canvas_background" fill="#fff"/>
				<g class="burger-container">
					<rect class="bar top" x="5.7" y="7.1" width="18.1" height="3"/>
					<rect class="bar middle" x="5.7" y="13.1" width="18.1" height="3"/>
					<rect class="bar footer" x="5.7" y="19.1" width="18.1" height="3"/>
				</g>
			</svg>
		</div>
		<!-- <div id="menu_cross">X</div> -->
    </div>
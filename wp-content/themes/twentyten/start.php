<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Naamloos document</title>
<style type="text/css">
body
{
	background:#999999;
}
.Basis
{
	width:250px;
/*	background-color:#CCC; */
	float:left;
	padding:10px;
	overflow:hidden;
}
.binnendiv
{
   background: none repeat scroll 0 0 #FFFFFF;
    border-radius: 3px 3px 3px 3px;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
    width: 230px;
	padding:10px;
	overflow:hidden;
}
.imgdiv
{
	border:0px;
	margin:-10px;	
}
.tekst
{
	padding-top:50px;
}
h1
{
	font-size:1.2em;
}
h3
{
	font-size:1.0em;
}
</style>
</head>

<body>
<div class="Basis">
	<div class="binnendiv">
		<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop2', 'index' );
			?>
        </div>
</div>
            
<div class="Basis">
	<div class="binnendiv">
		
		<span class="tekst"><br /><h1><?php the_title(); ?></h1>
        <h3><?php the_content( __( 'Doorgaan met lezen <span class="meta-nav">&rarr;</span>', 'twentyten' ))?>;</h3>
        </span>
        </div>
</div>


<div class="Basis">
	<div class="binnendiv">
		<img src="Instagram_files/test.jpg" class="imgdiv" />
		<span class="tekst"><br />
        		<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'index' );
			?>
        
        </span>
        </div>
</div>

<div class="Basis">
	<div class="binnendiv">
		<img src="Instagram_files/test.jpg" class="imgdiv" />
		<span class="tekst"><br /><h1>ssd</h1><h3>shdgfhsdgfhd</h3></span>
        </div>
</div>

<div class="Basis">
	<div class="binnendiv">
		<img src="Instagram_files/test.jpg" class="imgdiv" />
		<span class="tekst"><br /><h1>ssd</h1><h3>shdgfhsdgfhd</h3></span>
        </div>
</div>

<div class="Basis">
	<div class="binnendiv">
		<img src="Instagram_files/test.jpg" class="imgdiv" />
		<span class="tekst"><br /><h1>ssd</h1><h3>shdgfhsdgfhd</h3></span>
        </div>
</div>

<div class="Basis">
	<div class="binnendiv">
		<img src="Instagram_files/test.jpg" class="imgdiv" />
		<span class="tekst"><br /><h1>ssd</h1><h3>shdgfhsdgfhd</h3></span>
        </div>
</div>
		<div id="wrapper">
			<!-- <div id="content" role="main"> -->

			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop2', 'start' );
			?>
			<!-- </div> #content -->
		</div><!-- #container -->
<?php get_footer(); ?>


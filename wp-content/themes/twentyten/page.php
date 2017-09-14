<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<center>
<div id="content0">
			<!-- <div id="content2" role="main"> -->

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

     <?php remove_filter ('the_content', 'wpautop'); ?>

				<!-- <div id="post-<?php the_ID(); ?>"> -->
                
                	<span class="leesverder"><a href="http://www.guidoleen.nl/portfolio/">TERUG</a></span>

					<?php if ( is_front_page() ) { ?>
						<h1><?php the_title(); ?></h1>
					<?php } else { ?>
						<h1><?php the_title(); ?></h1>
					<?php } ?>

						<?php the_content(); ?>
<br />
                        
<?php endwhile; ?>

</div>
</center>
<?php get_footer(); ?>

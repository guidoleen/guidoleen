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
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<!-- <div id="post-<?php the_ID(); ?>"> -->

					<span class="leesverder"><a href="javascript:window.history.back()">TERUG</a> &nbsp </span>

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div>' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
	<br />
                        
               <span class="leesverder"><?php the_title(); ?> &nbsp &nbsp <a href="http://www.guidoleen.nl/portfolio/">TERUG</a> &nbsp </span>
<?php endwhile; ?>
</div>
</center>
<?php get_footer(); ?>

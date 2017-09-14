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

     <?php remove_filter ('the_content', 'wpautop'); ?>

				<!-- <div id="post-<?php the_ID(); ?>"> -->
					<span class="leesverder"><a href="javascript:window.history.back()">TERUG</a> &nbsp </span>


						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?><br />
                        
					<span class="leesverder"><a href="javascript:window.history.back()">TERUG</a> &nbsp </span>

<?php endwhile; // end of the loop. ?>
</div>
</center>
<?php get_footer(); ?>

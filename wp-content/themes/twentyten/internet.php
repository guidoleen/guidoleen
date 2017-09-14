<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

	

<br />
<center>   
<div class="content2">


<?php query_posts('cat=1'); ?>
<?php global $more; $more = 0; ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <div class="Basis">
		<!-- <div class="binnendiv"> -->
     <?php remove_filter ('the_content', 'wpautop'); ?>
        <?php the_content(); ?>
        
        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink naar %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="leesverder"><?php the_title(); ?></a>
    	<!-- </div> -->
	</div><br />

<!-- <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?> -->
<?php wp_link_pages(); ?>

    <?php endwhile; endif; ?>
</div>
</center>
<br />
<?php get_footer(); ?>

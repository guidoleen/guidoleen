<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Oudere posts', 'twentyten' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Nieuwere posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
	</div><!-- #nav-above -->
<?php endif; ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1><?php _e( 'Niet gevonden', 'twentyten' ); ?></h1>
		<div class="wrapperinfo">
			<p><?php _e( 'Geen resultaten gevonden voor het gevraagde archief. Misschien een zoekopdracht een optie?', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php /* How to display posts in the Gallery category. */ ?>

	<?php if ( in_category( _x('gallery', 'gallery category slug', 'twentyten') ) ) : ?>
    <!-- <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="wrapperinfo"> -->

		<div id="post-<?php the_ID(); ?>">
			<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<h4>
				<?php twentyten_posted_on(); ?>
			</h4><!-- .entry-meta -->
</div>
			<h4>
<?php if ( post_password_required() ) : ?>
				<?php ; ?>
<?php else : ?>			
				<?php 
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
						<div class="gallery-thumb">
							<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
						</div><!-- .gallery-thumb -->
						<p><em><?php printf( __( 'Deze gallerij bevat <a %1$s>%2$s fotoos</a>.', 'twentyten' ),
								'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink naar %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
								$total_images
							); ?></em></p>
				<?php endif; ?>
						<?php the_excerpt(); ?>
<?php endif; ?>
			</h4><!-- .entry-content -->

			<div class="wrapperbott">
				<a href="<?php echo get_term_link( _x('gallery', 'gallery category slug', 'twentyten'), 'category' ); ?>" title="<?php esc_attr_e( 'Bekijk posts in de categorie', 'twentyten' ); ?>"><?php _e( 'More Galleries', 'twentyten' ); ?></a>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Geef commentaar', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
            
		</div><!-- #post-## -->

<?php /* How to display posts in the asides category */ ?>

	<?php elseif ( in_category( _x('asides', 'asides category slug', 'twentyten') ) ) : ?>
		<div id="post-<?php the_ID(); ?>">
        <!-- 		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="wrapperinfo"> -->

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<h4>
				<?php the_excerpt(); ?>
			</h4><!-- .entry-summary -->
		<?php else : ?>
			<h4>
				<?php the_content( __( 'Doorgaan met lezen <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
			</h4><!-- .entry-content -->
		<?php endif; ?>

			<h4>
				<?php twentyten_posted_on(); ?>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Geef commentaar', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
   			</h4><!-- .entry-utility -->
		</div><!-- #post-## -->

<?php /* How to display all other posts. */ ?>

	<?php else : ?>
		<div id="post-<?php the_ID(); ?>" class="wrapperinfo">
        <!-- 		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="wrapperinfo"> -->
			<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink naar %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            			<h4>
				<?php twentyten_posted_on(); ?>
			</h4><!-- .entry-meta -->

	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<h4>
				<?php the_excerpt(); ?>
			</h4><!-- .entry-summary -->
	<?php else : ?>
			<h4>
				<?php the_content( __( 'Doorgaan met lezen <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
			</h4><!-- .entry-content -->
	<?php endif; ?>

			<h4>
				<?php if ( count( get_the_category() ) ) : ?>
					<span class="entry-date">
						<?php printf( __( '%2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' )); ?>
					</span>
					<span class="entry-date">|</span>
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<span class="entry-date">
						<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					</span>
					<span class="entry-date">&nbsp;|&nbsp;</span>
				<?php endif; ?>
				<span class="entry-date"><?php comments_popup_link( __( 'Voeg commentaar toe', 'twentyten' ), __( '1 Commentaar', 'twentyten' ), __( '% Commentaren', 'twentyten' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep"> | </span> <span class="edit-link">', '</span>' ); ?>
			 <br />
<!-- AddToAny BEGIN -->
<span class="entry-date"><a class="a2a_dd" href="http://www.addtoany.com/share_save">Deel met anderen...</a></span>
<script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->

</h4><!-- .entry-utility -->
		</div><!-- #post-## -->

		<?php comments_template( '', true ); ?>

	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Oudere posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Nieuwere posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>

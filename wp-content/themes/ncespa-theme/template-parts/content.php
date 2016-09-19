<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package NCESPA
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php ncespa_post_thumbnail(); ?>

	<header class="entry-header">
	  <span class="date"><?php the_date() ?></span>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
  	<?php ncespa_excerpt(); ?>

		<?php
		if ( is_single() ) :
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'ncespa' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			else :

  			/* translators: %s: Name of current post */
  			the_excerpt( sprintf(
  				__( 'Continue reading %s', 'twentysixteen' ),
  				the_title( '<span class="screen-reader-text">', '</span>', false )
  			) );
			endif;

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ncespa' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ncespa' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<!--
<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'ncespa' ),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	?>
-->
</article><!-- #post-## -->

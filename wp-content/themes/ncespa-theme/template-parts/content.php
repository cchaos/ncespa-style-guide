<?php
/**
 * Template part for displaying posts in a list.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package NCESPA
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <hr class="plain">

  <?php if (is_sticky() ):
	      the_post_thumbnail();
  endif; ?>


  <div class="entry-content">
    <h6 class="date"><?php the_date() ?></h6>
    <?php the_title( sprintf( '<h2 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <hr>

    <div class="excerpt">
  		<?php
  			the_excerpt();

  			wp_link_pages( array(
  				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ncespa' ) . '</span>',
  				'after'       => '</div>',
  				'link_before' => '<span>',
  				'link_after'  => '</span>',
  				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ncespa' ) . ' </span>%',
  				'separator'   => '<span class="screen-reader-text">, </span>',
  			) );
  		?>

    	<?php
    		edit_post_link(
    			sprintf(
    				/* translators: %s: Name of current post */
    				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'ncespa' ),
    				get_the_title()
    			),
    			'<p class="link"><span class="edit-link">',
    			'</span></p>'
    		);
    	?>
  	</div>
  </div>
</article><!-- #post-## -->

<?php
/**
 * Custom NCESPA template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 *  @package NCESPA
 */

if ( ! function_exists( 'ncespa_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * Create your own ncespa_entry_meta() function to override in a child theme.
 */
function ncespa_entry_meta() {
	if ( 'post' === get_post_type() ) {
		$author_avatar_size = apply_filters( 'ncespa_author_avatar_size', 49 );
		printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
			_x( 'Author', 'Used before post author name.', 'ncespa' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		ncespa_entry_date();
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'ncespa' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( 'post' === get_post_type() ) {
		ncespa_entry_taxonomies();
	}

	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'ncespa' ), get_the_title() ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'ncespa_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own ncespa_entry_date() function to override in a child theme.
 *
 * @since NCESPA 1.0
 */
function ncespa_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before publish date.', 'ncespa' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'ncespa_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own ncespa_entry_taxonomies() function to override in a child theme.
 *
 * @since NCESPA 1.0
 */
function ncespa_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'ncespa' ) );
	if ( $categories_list && ncespa_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'ncespa' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'ncespa' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'ncespa' ),
			$tags_list
		);
	}
}
endif;

if ( ! function_exists( 'ncespa_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own ncespa_post_thumbnail() function to override in a child theme.
 *
 * @since NCESPA 1.0
 */
function ncespa_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'ncespa_excerpt' ) ) :
	/**
	 * Displays the optional excerpt.
	 *
	 * Wraps the excerpt in a div element.
	 *
	 * Create your own ncespa_excerpt() function to override in a child theme.
	 *
	 * @since NCESPA 1.0
	 *
	 * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
	 */
	function ncespa_excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );

		if ( has_excerpt() || is_search() ) : ?>
			<div class="<?php echo $class; ?>">
				<?php the_excerpt(); ?>
			</div><!-- .<?php echo $class; ?> -->
		<?php endif;
	}
endif;

if ( ! function_exists( 'ncespa_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own ncespa_excerpt_more() function to override in a child theme.
 *
 * @since NCESPA 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function ncespa_excerpt_more($ellipse = true) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ncespa' ), get_the_title( get_the_ID() ) )
	);

	if ( $ellipse ) :
	  return ' &hellip; <p class="link">' . $link . '</p>';
  else :
    return '<p class="link">' . $link . '</p>';
  endif;
}
add_filter( 'excerpt_more', 'ncespa_excerpt_more' );
endif;

if ( ! function_exists( 'ncespa_manuel_excerpt' ) && ! is_admin() ) :
/**
 * Adds 'Continue reading' link to manual excerpts
 *
 * @return excerpt and 'Continue reading' link
 */
function ncespa_manuel_excerpt( $excerpt ) {
	$excerpt_more = '';
	if( has_excerpt() ) {
    	$excerpt_more = ncespa_excerpt_more(false);
	}
	return $excerpt . $excerpt_more;
}
add_filter( 'get_the_excerpt', 'ncespa_manuel_excerpt' );
endif;

if ( ! function_exists( 'ncespa_categorized_blog' ) ) :
/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own ncespa_categorized_blog() function to override in a child theme.
 *
 * @since NCESPA 1.0
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function ncespa_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'ncespa_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'ncespa_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so ncespa_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so ncespa_categorized_blog should return false.
		return false;
	}
}
endif;

/**
 * Flushes out the transients used in ncespa_categorized_blog().
 *
 * @since NCESPA 1.0
 */
function ncespa_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ncespa_categories' );
}
add_action( 'edit_category', 'ncespa_category_transient_flusher' );
add_action( 'save_post',     'ncespa_category_transient_flusher' );

if ( ! function_exists( 'ncespa_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since NCESPA 1.2
 */
function ncespa_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

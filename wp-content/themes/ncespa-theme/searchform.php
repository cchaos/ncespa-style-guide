<?php
/**
 * Template for displaying search forms in NCESPA
 *
 * @package NCESPA
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label>
    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'ncespa' ); ?></span>
    <span class="inline-label">
      <input type="search" class="search-field input-group-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'ncespa' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
      <button type="submit" class="search-submit button"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'ncespa' ); ?></span> <i class="fa fa-search"></i></button>
    </span>
  </label>
</form>

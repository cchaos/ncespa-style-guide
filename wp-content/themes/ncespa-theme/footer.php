<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NCESPA
 */

?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'ncespa' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<div class="footer-navs">
  			<?php if ( has_nav_menu( 'social' ) ) : ?>
          <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'ncespa' ); ?>">
            <?php
              wp_nav_menu( array(
                'theme_location' => 'social',
                'menu_class'     => 'social-links-menu',
                'depth'          => 1,
                'link_before'    => '<span class="screen-reader-text">',
                'link_after'     => '</span>',
              ) );
            ?>
          </nav><!-- .social-navigation -->
        <?php endif; ?>

        <?php if ( has_nav_menu( 'legal' ) ) : ?>
          <nav class="legal-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Legal Menu', 'ncespa' ); ?>">
            <?php
              wp_nav_menu( array(
                'theme_location' => 'legal',
                'menu_class'     => 'legal-menu',
               ) );
            ?>
          </nav><!-- .legal-navigation -->
        <?php endif; ?>
      </div>

			<div class="sponsors">
        <div>
          <h5>Our Sponsors</h5>
          <a href="http://www.twitch.tv/"><img src="<?php echo get_template_directory_uri() ?>/img/Twitch_logo.png" alt="Twitch"></a>
        </div>
        <div>
          <h5>Our Partners</h5>
          <a href="http://spheric.io"><img src="<?php echo get_template_directory_uri() ?>/img/Spheric_logo.png" alt="Spheric"></a>
        </div>
      </div>

			<p class="copy"><img src="<?php echo get_template_directory_uri() ?>/img/NCESPA_logo_small.png" alt="" width="20"> <small>&copy;<?php echo date('Y') ?> National Collegiate eSports Association&reg;. All Rights Reserved.</small></p>
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>

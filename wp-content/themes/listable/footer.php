<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Listable
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
			<div id="footer-sidebar" class="footer-widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
		<div class="footer-text-area">
			<div class="site-info">
				<?php
				$footer_copyright = listable_get_option('footer_copyright');
				if ( $footer_copyright ) : ?>
					<div class="site-copyright-area">
						<?php echo $footer_copyright; ?>
					</div>
				<?php endif; ?>
				<?php
				$args = array(
					'theme_location'  => 'footer_menu',
					'container'       => '',
					'container_class' => '',
					'menu_class'      => 'footer-menu',
					'depth'           => 1,
					'fallback_cb'     => null,
				);
				wp_nav_menu( $args );
				?>
			</div><!-- .site-info -->
			<div class="theme-info">
				<a href="<?php echo esc_url( esc_html__( 'https://tradielist.com.au/', 'Tradie List' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'listable' ), 'Tradie List' ); ?></a>
				<span class="sep"> <?php _e( 'and', 'listable' ) ?> </span>
				<?php printf( esc_html__( '%1$s by %2$s.', 'listable' ), '<a href="https://returnonclick.com.au/">ROCM</a>', '<a href="https://returnonclick.com.au/" rel="designer">Return On Click</a>' ); ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="hide">
	<div class="arrow-icon-svg"><?php get_template_part( 'assets/svg/carousel-arrow-svg' ); ?></div>
	<div class="cluster-icon-svg"><?php get_template_part( 'assets/svg/map-pin-cluster-svg' ); ?></div>
	<div class="selected-icon-svg"><?php get_template_part( 'assets/svg/map-pin-selected-svg' ); ?></div>
	<div class="empty-icon-svg"><?php get_template_part( 'assets/svg/map-pin-empty-svg' ); ?></div>
	<div class="card-pin-svg"><?php get_template_part( 'assets/svg/pin-simple-svg' ); ?></div>
</div>

<?php wp_footer(); ?>

</body>
</html>
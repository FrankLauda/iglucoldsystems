<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer class="footer-container">
	<div class="footer-grid">
		<?php dynamic_sidebar( 'footer-widgets' ); ?>
	</div>
	<div class="copyright text-center">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/proline-logo-final.png" width="150" alt="Proline Equipmeny"></a>
		<p>&#169; Proline Equipment <?php echo date(Y);?> | site created by <a href="https://franklauda.com">Frank Lauda</a>
	</div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
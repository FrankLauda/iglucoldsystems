<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $video_description ) ; ?>

			<?php if( have_rows('video_&_des') ):?>

		<?php while ( have_rows('video_&_des') ) : the_row(); ?>

		        	<div class="grid-x full-width-two-thirds">
		  				<div class="cell large-7 medium-12 text-right">
		  					<?php echo get_sub_field('video');?>
		  				</div>

		  				<div class="cell large-5 medium-12">
		  					<?php echo get_sub_field('description');?>
		  				</div>
		  			</div>

		 <?php endwhile;?>

<?php else :?>

// no layouts found

<?php endif; ?>

<?php

if ( $related_products ) : ?>

	<section class="related products">

		<h3 style="text-align: center; margin-bottom: 3rem;"><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h3>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>

<?php endif;

wp_reset_postdata();

<?php
/** custom PHP */

add_image_size('slides', 1153, 477, true);
//add_image_size('sml_slides', 1024, 576, true);

/**
* Add the images to the special submenu -> the submenu items with the parent with 'pt-special-dropdown' class.
*
* @param array $items List of menu objects (WP_Post).
* @param array $args  Array of menu settings.
* @return array
*/
function add_images_to_special_submenu( $items ) {
	$special_menu_parent_ids = array();

	foreach ( $items as $item ) {
		if ( in_array( 'pt-special-dropdown', $item->classes, true ) && isset( $item->ID ) ) {
			$special_menu_parent_ids[] = $item->ID;
		}

		if ( in_array( $item->menu_item_parent, $special_menu_parent_ids ) && has_post_thumbnail( $item->object_id ) ) {
			$item->title = sprintf(
				'%1$s %2$s',
				get_the_post_thumbnail( $item->object_id, 'thumbnail', array( 'alt' => esc_attr( $item->title ) ) ),
				$item->title
			);
		}
	}

	return $items;
}

add_filter( 'wp_nav_menu_objects', 'add_images_to_special_submenu' );

// Change 'add to cart' text on archive product page
add_filter( 'woocommerce_product_add_to_cart_text', 'bryce_archive_add_to_cart_text' );
function bryce_archive_add_to_cart_text() {
        return __( 'View More', 'your-slug' );
}

add_filter( 'the_title', 'shorten_woo_product_title', 10, 2 );
function shorten_woo_product_title( $title, $id ) {
    if ( ! is_singular( array( 'product' ) ) && get_post_type( $id ) === 'product' ) {
        return wp_trim_words( $title, 9, '...' ); // change last number to the number of words you want
    } else {
        return $title;
    }
}

/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['features_tab'] = array(
		'title' 	=> __( 'Features', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'features_product_tab_content'
	);

	$tabs['specifications_tab'] = array(
		'title' 	=> __( 'Specifications', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'specifications_product_tab_content'
	);

	return $tabs;

}
function features_product_tab_content() {
	// The new tab content
	echo get_field( 'features' );
}

function specifications_product_tab_content() {
	// The new tab content
	echo get_field( 'specifications' );
}

/**
 * Add a video & description section on single product page
 */




<?php
/*
Plugin Name: IK Post Rating
Description: Adds a star rating system to WordPress, send Post Rating to the Own Developed Third Part Service ('http://laravel-api-post-rating.test/api'). The Third Part Service Response consists average rating for the WordPress Post.
Version: 1.0.0
Author: Ihor Khaletskyi
Author URI: https://sitepro4web.com/
*/


defined( 'ABSPATH' ) or die( 'Hey, you can\t access this file!' );

define( 'THIRD_PART_RESTFUL_API_SERVICE',
        'http://laravel-api-post-rating.test/api' );


//Create the rating interface.
add_action( 'comment_form_logged_in_after', 'ik_post_rating_rating_field' );
add_action( 'comment_form_after_fields', 'ik_post_rating_rating_field' );
function ik_post_rating_rating_field() {
	?>
	<label for="rating">Rating<span class="required">*</span></label>
	<fieldset class="comments-rating">
		<span class="rating-container">
			<?php

			global $post;

			for ( $i = 5; $i >= 1; $i -- ) : ?>
				<input type="radio" id="rating-<?php echo esc_attr( $i ); ?>"
				       name="rating" value="<?php echo esc_attr( $i ); ?>"/>
				<label
					for="rating-<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></label>
			<?php endfor; ?>
            <input type="radio" id="rating-0" class="star-cb-clear"
                   name="rating" value="0"/><label for="rating-0">0</label>
            <input type="hidden" name="post_id"
                   value="<?php echo sanitize_text_field( $post->ID ); ?>">
            <input type="hidden" name="post_title"
                   value="<?php echo sanitize_text_field( the_title() ); ?>">
		</span>
	</fieldset>
	<?php
}

//Enqueue the plugin's styles.
add_action( 'wp_enqueue_scripts', 'ik_post_rating_styles' );
function ik_post_rating_styles() {
	wp_register_style( 'ik-post-rating-styles',
	                   plugins_url( '/', __FILE__ ) . 'assets/style.css' );

	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'ik-post-rating-styles' );
}

//Make the rating required.
add_filter( 'preprocess_comment', 'ik_post_rating_require_rating' );
function ik_post_rating_require_rating( $commentdata ) {
	if ( ! is_admin() && ( ! isset( $_POST['rating'] ) || 0 === intval( $_POST['rating'] ) ) ) {
		wp_die( __( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.' ) );
	}

	return $commentdata;
}


//Save the rating submitted by the user.
add_action( 'comment_post', 'ik_post_rating_save_comment_rating' );
function ik_post_rating_save_comment_rating( $comment_id ) {
	if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) ) {
		$rating     = intval( $_POST['rating'] );
		$post_id    = intval( $_POST['post_id'] );
		$post_title = sanitize_text_field( $_POST['post_title'] );

		$remote_get = wp_remote_get( THIRD_PART_RESTFUL_API_SERVICE . '?post_id=' . $post_id . '&post_title=' . $post_title . '&user_rating=' . $rating,
		                             [
			                             'method' => 'GET',
		                             ] );

		$response = json_decode( $remote_get['body'], true );

		update_post_meta( $post_id,
		                  'rating',
		                  round( $response['avg_rating'],
		                         1,
		                         PHP_ROUND_HALF_UP ) );
		add_comment_meta( $comment_id, 'rating', $rating );
	}
}

//Display the rating on a submitted comment.
add_filter( 'comment_text', 'ik_post_rating_display_comment_rating' );
function ik_post_rating_display_comment_rating( $comment_text ) {
	if ( $rating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
		$stars_comment = '<p class="stars">';
		for ( $i = 1; $i <= $rating; $i ++ ) {
			$stars_comment .= '<span class="dashicons dashicons-star-filled"></span>';
		}
		$stars_comment .= '</p>';
		$comment_text  = $comment_text . $stars_comment;

		return $comment_text;
	} else {
		return $comment_text;
	}
}

//Display the avg rating before excerpt and content.
add_filter( 'the_content', 'ik_post_rating_display_post_rating' );
add_filter( 'the_excerpt', 'ik_post_rating_display_post_rating' );
function ik_post_rating_display_post_rating( $post_title ) {
	global $post;

	if ( $rating = get_post_meta( $post->ID, 'rating', true ) ) {

		$stars_post = '<p class="stars">';

		$recent_rating = $rating - floor( $rating );

		for ( $i = 1; $i <= $rating; $i ++ ) {
			$stars_post .= '<span class="dashicons dashicons-star-filled"></span>';
		}

		if ( $recent_rating != 0 ) {
			$stars_post .= '<span class="dashicons dashicons-star-half"></span>';
		}

		$stars_post .= '</p>';
		$post_title = $stars_post . $post_title;

		return $post_title;
	} else {
		return $post_title;
	}
}

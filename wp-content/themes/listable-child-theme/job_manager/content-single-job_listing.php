<?php
/**
 * The template for displaying the WP Job Manager listing details on single listing pages
 *
 * @package Listable
 */

global $post;

$taxonomies = array();
$data_output = '';
$terms = get_the_terms(get_the_ID(), 'job_listing_type');
$termString = '';
if ( is_array($terms) || is_object($terms) ) {
	$firstTerm = $terms[0];
	if ( ! $firstTerm == NULL ) {
		$term_id = $firstTerm->term_id;

		$data_output .= 'data-icon="' . listable_get_term_icon_url($term_id) .'"';
		$count = 1;
		foreach ( $terms as $term ) {
			$termString .= $term->name;
			if ( $count != count($terms) ) {
				$termString .= ', ';
			}
			$count++;
		}
	}
}

$listing_is_claimed = false;
if ( class_exists( 'WP_Job_Manager_Claim_Listing' ) ) {
	$classes = WP_Job_Manager_Claim_Listing()->listing->add_post_class( array(), '', $post->ID );

	if ( isset( $classes[0] ) && ! empty( $classes[0] ) ) {
		if ( $classes[0] == 'claimed' )
			$listing_is_claimed = true;
	}
} ?>

<div class="single_job_listing"
	data-latitude="<?php echo get_post_meta($post->ID, 'geolocation_lat', true); ?>"
	data-longitude="<?php echo get_post_meta($post->ID, 'geolocation_long', true); ?>"
	data-categories="<?php echo $termString; ?>"
	<?php echo $data_output; ?>>

	<?php if ( get_option( 'job_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status ) : ?>
		<div class="job-manager-info"><?php esc_html_e( 'This listing has expired.', 'listable' ); ?></div>
	<?php else : ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="row">
						<header class="entry-header"> 
						<?php $category = list_categories($post);		//see functions.php 	?>
						<h1 class="entry-title" itemprop="name"><?php
							echo get_the_title();
							if ( $listing_is_claimed ) :
								echo '<span class="listing-claimed-icon">';
								get_template_part('assets/svg/checked-icon');
								echo '<span>';
							endif;
						?></h1>
						</header><!-- .entry-header -->
						<span class="entry-subtitle" itemprop="description">	
						<?php 
						$strLocation = "";
						if(strlen(get_post_meta($post->ID,'geolocation_city',true)) > 2){
							$strLocation = " ".get_post_meta($post->ID,'geolocation_city',true);
						}
						echo $category . $strLocation ?> 
						</span>
					</div>	<!-- /row -->
					<div class="row">
						<?php if ( is_active_sidebar( 'listing_content' ) ) : ?>
							<div class="listing-sidebar  listing-sidebar--main">
								<?php dynamic_sidebar('listing_content'); ?>
							</div>
						<?php endif; ?>
					</div>  <!-- /row -->

				</div>	<!-- /col 	-->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
					<div class="row">
						<?php if ( is_active_sidebar( 'listing__sticky_sidebar' ) ) : ?>
							<div class="listing-sidebar  listing-sidebar--top  listing-sidebar--secondary">
								<?php dynamic_sidebar('listing__sticky_sidebar'); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_active_sidebar( 'listing_sidebar' ) ) : ?>
							<div class="listing-sidebar  listing-sidebar--bottom  listing-sidebar--secondary">
								<?php dynamic_sidebar('listing_sidebar'); ?>
							</div>
						<?php endif; ?>
					</div>	<!-- /row -->
				</div>
			</div>
		</div>

	<?php endif; ?>
</div>
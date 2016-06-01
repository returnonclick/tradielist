
<div class="container">
	<div class="row">
		<div class="col-md-12">		<?php 
			if ( ! empty( $title ) ) {
            	//echo $before_title;		?>
            	<h2 class="business-title"><?php echo $title ?></h2>		<?php 
            	//echo $after_title;
        	}	?>
		</div>
	</div>

	<?php if ( strlen( $phone ) > 3 ) : ?>
	<div class="row">
		<div class="col-md-4 col-sm-5 col-xs-12"><?php esc_html_e( 'Phone', 'listable' ); ?></div>
		<div class="col-md-8 col-sm-7 col-xs-12">
			<a class="listing-contact  listing--phone" href="tel:<?php echo $phone; ?>" itemprop="telephone"><?php echo $phone; ?></a>
		</div>
	</div>
	<!-- <div class="clear_both"></div>	-->
	<?php endif; ?>

	<?php if ( strlen( $twitter ) > 3 ) : ?>
	<div class="row">
		<div class="col-md-4 col-sm-5 col-xs-12"><?php esc_html_e( 'Twitter', 'listable' ); ?></div>
		<div class="col-md-8 col-sm-7 col-xs-12">
			<a class="listing-contact  listing--twitter" href="https://twitter.com/<?php echo $twitter; ?>" itemprop="url">@<?php echo $twitter; ?></a>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( strlen( $website_pure ) > 3 ) : ?>
	<div class="row">
		<div class="col-md-4 col-sm-5 col-xs-12"><?php esc_html_e( 'Website', 'listable' ); ?></div>
		<div class="col-md-8 col-sm-7 col-xs-12">
			<a class="listing-contact  listing--website" href="<?php echo esc_url( $website ); ?>" itemprop="url" target="_blank" rel="nofollow"><?php echo $website_pure; ?></a>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( strlen( $location ) > 3 ) : ?>	
	<div class="row">
		<div class="col-md-4 col-sm-5 col-xs-12"><?php esc_html_e( 'Address', 'listable' ); ?></div>
		<div class="col-md-8 col-sm-7 col-xs-12">
			<div class="value_description_businesscontacts"><?php echo esc_html( $location ) ?> </div>
		</div>
	</div>
	<?php endif; ?>
</div>

<!--
/*
xs: 0,
  // Small screen / phone
  sm: 544px,
  // Medium screen / tablet
  md: 768px,
  // Large screen / desktop

*/	-->

<div class="row">
	<div class="col-md-8 col-sm-8 col-xs-12">		<?php 
		if ( ! empty( $title ) ) {
        	//echo $before_title;		?>
        	<h2 class="business-title"><?php echo $title ?></h2>		<?php 
        	//echo $after_title;
    	}	?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">	
		<h2 class="business-title"><?php echo esc_html_e( "Business Registration", 'listable' ); ?></h2>	
	</div>
</div>


<div class="row">
	<div class="col-md-8 col-sm-8 col-xs-12"> 
		<?php if ( strlen( $phone ) > 3 ) : ?>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 business-label"><?php esc_html_e( 'Phone', 'listable' ); ?></div>
			<div class="col-md-9 col-sm-9 col-xs-12 business-data">
				<a class="listing-link" href="tel:<?php echo $phone; ?>" ><?php echo $phone; ?></a>		<!-- listing-contact listing--phone itemprop="telephone" -->
			</div>
		</div>
		<!-- <div class="clear_both"></div>	-->
		<?php endif; ?>

		<?php if ( strlen( $website_pure ) > 3 ) : ?>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 business-label"><?php esc_html_e( 'Website', 'listable' ); ?></div>
			<div class="col-md-9 col-sm-9 col-xs-12 business-data">
				<a class="listing-link" href="<?php echo esc_url( $website ); ?>" target="_blank" rel="nofollow"><?php echo $website_pure; ?></a>		 <!-- listing-contact listing--website itemprop="url" -->
			</div>
		</div>
		<?php endif; ?>

		<?php if ( strlen( $facebook ) > 3 ) : ?>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 business-label"><?php esc_html_e( 'Facebook', 'listable' ); ?></div>
			<div class="col-md-9 col-sm-9 col-xs-12 business-data">
				<a class="listing-link" href="<?php echo esc_url($facebook); ?>" target="_blank" rel="nofollow"><?php echo $facebook_pure; ?></a>		<!-- listing-contact listing--facebook itemprop="url"  -->
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12"> 
		<?php if ( strlen( $abn ) > 3 ) : ?>
		<div class="row">
			<div class="col-md-4 col-sm-5 col-xs-12 business-label"><?php esc_html_e( 'ABN', 'listable' ); ?></div>
			<div class="col-md-8 col-sm-7 col-xs-12 business-data"><?php echo $abn; ?></div>
		</div>
		<!-- <div class="clear_both"></div>	-->
		<?php endif; ?>

		<?php if ( strlen( $acn ) > 3 ) : ?>
		<div class="row">
			<div class="col-md-4 col-sm-5 col-xs-12 business-label"><?php esc_html_e( 'ACN', 'listable' ); ?></div>
			<div class="col-md-8 col-sm-7 col-xs-12 business-data"><?php echo $acn; ?></div>
		</div>
		<?php endif; ?>

	</div>
</div>	<!-- row -->

<?php if ( strlen( $address ) > 3 ) : ?>	
<div class="row">
	<div class="col-md-2 col-sm-4 col-xs-12 business-label"><?php esc_html_e( 'Address', 'listable' ); ?></div>
	<div class="col-md-10 col-sm-8 col-xs-12 business-data">
		<div class="value_description_businesscontacts"><?php echo esc_html( $address ) ?> </div>
	</div>
</div>
<?php endif; ?>

<?php if ( strlen( $license1 ) > 3 ) : ?>
<div class="row">
	<div class="col-md-2 col-sm-4 col-xs-12 business-label"><?php esc_html_e( 'Licenses', 'listable' ); ?></div>
	<div class="col-md-10 col-sm-8 col-xs-12 business-data">	
		<ul>
			<li><?php echo $license1; ?></li>
			<li><?php echo $license2; ?></li>
			<li><?php echo $license3; ?></li>
		</ul>
	</div>
</div>
<?php endif; ?>



<!--
/*
xs: 0,
  // Small screen / phone
  sm: 544px,
  // Medium screen / tablet
  md: 768px,
  // Large screen / desktop

*/	-->
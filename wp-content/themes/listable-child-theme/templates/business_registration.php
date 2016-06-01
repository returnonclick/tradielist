
<div class="row">
	<div class="col-md-12">		<?php 
		if ( ! empty( $title ) ) {
        	//echo $before_title;		?>
        	<h2 class="business-title"><?php echo $title ?></h2>		<?php 
        	//echo $after_title;
    	}	?>
	</div>
</div>

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

<?php if ( strlen( $licenses ) > 3 ) : ?>
<div class="row">
	<div class="col-md-4 col-sm-5 col-xs-12 business-label"><?php esc_html_e( 'Licenses', 'listable' ); ?></div>
	<div class="col-md-8 col-sm-7 col-xs-12 business-data"><?php echo $licenses; ?></div>
</div>
<?php endif; ?>

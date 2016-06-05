<?php
/**
 * Plugin Name: 	ROC - Google Plus Business
 * Plugin URI:		http://wordpress.org/plugins/roc-google-plus-business/
 * Description:		Get Business details from google plus
 * Version: 		1.0
 * Author:      	Jossandro Balardin - Return On Click
 * Author URI:  	http://www.returnonclick.com.au
 * Text Domain: 	roc-gp-business
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class  ROC_GP.
 *
 * Main ROC - Google Plus Business.
 *
 * @class		 ROC_SI
 * @version		1.0
 * @author		Jossandro Balardin
 */
class  ROC_GP_Business {

	/**
	 * Instance of plugin.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var object $instance The instance of the plugin class.
	 */
	private static $instance;

	/**
	 * Construct.
	 *
	 * Initialize the class and plugin.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		// Initialize plugin parts
		$this->init();

	}


	/**
	 * Instance.
	 *
	 * An global instance of the class. Used to retrieve the instance
	 * to use on other files/plugins/themes.
	 *
	 * @since 1.0.0
	 * @return object Instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) :
			self::$instance = new self();
		endif;

		return self::$instance;

	}


	/**
	 * Init.
	 *
	 * Initialize plugin parts.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		/**
		 * Including all classes needed.
		 */
		// require_once plugin_dir_path( __FILE__ ) . 'class/class-roc-space-interest-ajax.php';
		

		//==== Adding new post type for INTEREST and STATUS Unsubscribed
				

		// Instantiating Save Class to use Ajax 
		
	}


	/**
	 * @DESC: CURLs the Google Places API with our url parameters and returns JSON response
	 */
	function grp_plugin_curl( $url ) {

		// waiting for an URL like that:
		// https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJN7CYX-sJxkcRKZB46WGRioQ&key=YOURKEYHERE

		// Send API Call using WP's HTTP API
		$data = wp_remote_get( $url );

		if ( is_wp_error( $data ) ) {
			$error_message = $data->get_error_message();
			$this->output_error_message( "Something went wrong: $error_message", 'error' );
		}

		//Use curl only if necessary
		if ( empty( $data['body'] ) ) {

			$ch = curl_init( $url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_HEADER, 0 );
			$data = curl_exec( $ch ); // Google response
			curl_close( $ch );
			$response = json_decode( $data, true );

		} else {
			$response = json_decode( $data['body'], true );
		}

		//GPR Reviews Array
		$gpr_reviews = array();

		//includes Avatar image from user
		//@see: https://gist.github.com/jcsrb/1081548
		if ( isset( $response['result']['reviews'] ) && ! empty( $response['result']['reviews'] ) ) {
			//Loop Google Places reviews
			foreach ( $response['result']['reviews'] as $review ) {

				$user_id = isset( $review['author_url'] ) ? str_replace( 'https://plus.google.com/', '', $review['author_url'] ) : '';

				//Add args to
				$request_url = add_query_arg(
					array(
						'alt' => 'json',
					),
					'https://picasaweb.google.com/data/entry/api/user/' . $user_id
				);

				$avatar_get      = wp_remote_get( $request_url );
				$avatar_get_body = json_decode( wp_remote_retrieve_body( $avatar_get ), true );
				$avatar_img      = preg_replace( "/^http:/i", "https:", $avatar_get_body['entry']['gphoto$thumbnail']['$t'] );

				//check to see if image is empty (no broken images)
				if ( empty( $avatar_img ) ) {
					$avatar_img = GPR_PLUGIN_URL . '/assets/images/mystery-man.png';
				}

				//add array image to review array
				$review = array_merge( $review, array( 'avatar' => $avatar_img ) );
				//add full review to $gpr_views
				array_push( $gpr_reviews, $review );

			}

			//merge custom reviews array with response
			$response = array_merge( $response, array( 'gpr_reviews' => $gpr_reviews ) );


		}
		//Business Avatar
		if ( isset( $response['result']['photos'] ) ) {

			$request_url = add_query_arg(
				array(
					'photoreference' => $response['result']['photos'][0]['photo_reference'],
					'key'            => $this->api_key,
					'maxwidth'       => '300',
					'maxheight'      => '300',
				),
				'https://maps.googleapis.com/maps/api/place/photo'
			);

			$response = array_merge( $response, array( 'place_avatar' => $request_url ) );

		}

		//Google response data in JSON format
		return $response;

	}
	

}


/**
 * The main function responsible for returning the  ROC_GP_Business object.
 *
 * Use this function like you would a global variable, except without needing to declare the global.
 *
 * Example: <?php  ROC_GP_Business()->method_name(); ?>
 *
 * @since 1.0.0
 *
 * @return object  ROC_GP_Business class object.
 */
if ( ! function_exists( 'ROC_GP_Business' ) ) :

 	function  ROC_GP_Business() {
		return  ROC_GP_Business::instance();
	}

endif;

ROC_GP_Business();

<?php

/*
Plugin Name:    Technical Interview
Plugin URL:     http://technical-interview.dev
Description:    Plugin for the technical interview
Version:        0.1
Author:         James Whayman
Author URI:     http://jameswhayman.com
 */

namespace AUSWEB\Plugins\Mailcatcher;

define( 'TECHNICAL_INTERVIEW_PLUGINS_URL' , untrailingslashit( plugins_url( '' , __FILE__ ) ) );

class TechnicalInterview {
	/**
	 * TechnicalInterview constructor.
	 */
	public function __construct() {
		$includes = [
			'widgets/contact-form.php'
		];

		$this->load_includes( $includes );
		$this->register_actions();

		add_action( 'wp_enqueue_scripts' , array( $this , 'technical_interview_enqueue_scripts' ) );
		add_action( 'wp_ajax_ajax_action' , array( $this , 'technical_interview_ajax_action') );

	}

	/**
	 * @param $files
	 */
	public function load_includes( $files ) {
		foreach ( $files as $file ) {
			$path = plugin_dir_path(__FILE__) . $file;

			if (!file_exists($path)) {
				trigger_error(__('File ' . $path . ' could not be found'), E_USER_ERROR);
			}

			require_once($path);
		}
	}

	/**
	 * Register WordPress actions
	 */
	public function register_actions() {

		add_action('widgets_init', [$this, 'register_widgets']);
	}

	/**
	 * Register WordPress widgets
	 */
	public function register_widgets() {

		register_widget('ContactForm');
	}

	/**
	 * Enqueue Styles and Scripts
	 */
	public function technical_interview_enqueue_scripts()
	{
		wp_enqueue_style( 'technical-interviewg-style-1.0' , TECHNICAL_INTERVIEW_PLUGINS_URL . '/assets/css/style.css' , array() , '1.0' , 'all' );
		wp_enqueue_script( 'technical-interviewg-script-1.0' , TECHNICAL_INTERVIEW_PLUGINS_URL . '/assets/js/script.js' , array( 'jquery' ) , '1.0' , true );
	}

	public function technical_interview_ajax_action()
	{
		if ( isset( $_POST['form_sent'] ) && $_POST['form_sent'] )
	    {
			$name = sanitize_text_field( $_POST['name'] );
			$email = sanitize_text_field( $_POST['email'] );
			$password = sanitize_text_field( $_POST['password'] );

			$name_err = array();
			$email_err = array();
			$pass_err = array();

			if ( empty( $name ) )
			{
				$name_err[] = "Your name cannot be empty.";
			}
			else
			{
				if ( !preg_match("/^[a-zA-Z]*$/",$name) )
				{
					$name_err[] = "Your name cannot contain numbers or symbols.";
				}
			}

			if ( empty( $email ) )
			{
				$email_err[] = "Your email address cannot be empty.";
			}
			else
			{
				if ( ! filter_var( $email , FILTER_VALIDATE_EMAIL ) ) {
				  	$email_err[] = "Invalid email format.";
				}
			}

			if ( empty( $password ) )
			{
				$pass_err[] = "Password cannot be empty.";
			}

			if ( empty( $name_err ) && empty( $email_err) && empty( $pass_err ) )
			{
				$mailcatcher = @new Mailcatcher(array(
					"from"        => $email ,
					"fromname"    => $name
				));

				$status = true;
				$response = "Thank you for your enquiry, we have received your message.";
			}
			else
			{
				$status = false;
				$response = "";
			}

	        wp_send_json( array( 'name_err' => $name_err , 'email_err' => $email_err , 'pass_err' => $pass_err , 'status' => $status , 'response' => $response ) );
	    }
	}
}

new TechnicalInterview();

<?php
/*
Plugin Name: I-Agree
Plugin URI: http://wordpress.org/extend/plugins/i-agree/
Description: Force your users to agree to your terms when they login.
Version: 0.2.1
Author: Michael Stursberg
Author URI: 
*/



// As part of WP authentication process, call our function
add_filter('wp_authenticate_user', 'wp_authenticate_user_acc', 99999, 2);

function wp_authenticate_user_acc($user, $password) {
	 $dbfail = get_option('ia_fail');
	      // See if the checkbox #login_accept was checked
    if ( isset( $_REQUEST['login_accept'] ) && $_REQUEST['login_accept'] == 'on' ) {
        // Checkbox on, allow login
        return $user;
    } else {
        // Did NOT check the box, do not allow login
        $error = new WP_Error();
        $error->add('did_not_accept', $dbfail );
        return $error;
    }
}

// As part of WP login form construction, call our function
add_filter ( 'login_form', 'login_form_acc' );

function login_form_acc(){
	$dbtermm = get_option('ia_termm');

    // Add an element to the login form, which must be checked
    echo '<br><label><input type="checkbox" name="login_accept" id="login_accept" />&nbsp;'.$dbtermm.'</label></br></br>';
}

add_action('admin_menu', 'i_agree_options');
function i_agree_options() {
  
  add_options_page('i_agree', 'I Agree (Options)', 'manage_options', 'my-unique-identifier2', 'iaoptions');
 
}

		function iaoptions() {
		  
			include('ia-options.php');
		}

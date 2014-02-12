<?php 
	    if($_POST['ia_hidden'] == 'Y') {
			//Form data sent
			 
            $dbfail = $_POST['ia_fail'];
          $dbtermm = stripslashes($dbfail);
            update_option('ia_fail', $dbfail);
          
          $dbtermm = $_POST['ia_termm'];
         $dbtermm = stripslashes($dbtermm);
            update_option('ia_termm', $dbtermm);
	
			 ?> 
		
			<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
			<?php
		} else {
			//Normal page display
			$dbfail = get_option('ia_fail');
		  $dbtermm = get_option('ia_termm');
		 
			
		}
	?>
	
<style>
.mes {
color: red;
}
form {
width: 725px;
}
textarea {
clear: right;
float: right;
}
input[type="submit"] {
margin-top: 117px;
}
</style>
<div class="wrap">

			<?php    echo "<h2>" . __( 'I Agree', 'ai_trdom' ) . "</h2>"; ?>
			
			<form name="ia_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
				<input type="hidden" name="ia_hidden" value="Y">
				<?php    echo "<h4>" . __( 'Settings', 'ia_trdom' ) . "</h4>"; ?>
				<p><?php _e("Failed to agree error message: " ); ?><input type="text" name="ia_fail" value="<?php echo $dbfail; ?>" size="20"></br><?php _e("<span class='mes'>This is the text that shows when the visitor trys to login and fails to click the check box</span>" ); ?></p>
			
				<p><?php _e("Message: " ); ?><textarea  name="ia_termm" cols="80" rows="10" ><?php echo $dbtermm; ?></textarea></br><?php _e("<span class='mes'>This is the text that goes right after the checkbox</span>" ); ?></p>

			
				<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Update Options', 'ia_trdom' ) ?>" />
				</p><br>
				<strong>NOTE:</strong>This plugin has been discontinued. It has been replace by an improved version called “Agreeable”. You can download it here: <a href=”http://wordpress.org/plugins/agreeable/”> http://wordpress.org/plugins/agreeable/</a> 

			</form>

		</div>
	
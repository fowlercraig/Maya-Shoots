<?php
if ( is_user_logged_in() ) {

	$menuParameters = array(
		'theme_location'	=> 'logged-in',
		'container'       => false,
		'echo'            => false,
		'items_wrap'      => '%3$s',
		'depth'           => 0,
	);
	echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
	?>
	<span class="wrap">
		<a id="btnDashboard" class="modal" href="#dashboard">Dashboard</a>
		<?php wp_loginout(); ?>
	</span>
	<?php 
} else {
	
	$menuParameters = array(
		'theme_location'	=> 'logged-in',
		'container'       => false,
		'echo'            => false,
		'items_wrap'      => '%3$s',
		'depth'           => 0,
	);
	echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );

	?>
	<span class="wrap">
		<a id="btnSignup" class="modal" href="#dashboard">Signup</a>
		<a id="btnLogin" class="modal" href="#dashboard">Login</a>
	</span>
	<?php 
	
}
?>
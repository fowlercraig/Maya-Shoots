<div id="dashboard" class="frame zoom-anim-dialog mfp-hide login">
	<div id="login-slider">
		<header>
			<a href="#1" class="link">Login</a>
			<a href="#2" class="link">Signup</a>
		</header>
		<div class="slides_container">
			<div class="slide"><?php do_shortcode('[devpress-login-form]'); ?></div>
			<div class="slide"><?php  echo do_shortcode('[gravityform id="1" name="Footer Contact Form" title="false" description="false" ajax="true"]');?></div>
		</div>
	</div>
</div>
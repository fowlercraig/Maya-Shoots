<div id="dashboard" class="frame zoom-anim-dialog mfp-hide dashboard">
	<?php $author_id = get_the_author_meta( 'ID' ); ?>
	<!--<h1>
		<?php global $current_user;
		      get_currentuserinfo();
		      echo '' . $current_user->user_firstname . "\n";
		      echo '' . $current_user->user_lastname . "\n";
		?>'s Dashboard
		<span><?php the_field('pentest_status', 'user_'. $author_id); ?></span>
	</h1>
	<p>
		This is dummy copy. It is not meant to be read. 
		It has been placed here solely to demonstrate the look 
		and feel of finished, typeset text. Only for show. 
		He who searches for meaning here will be sorely disappointed.
	</p>-->
	<img src="<?php bloginfo('template_directory'); ?>/images/dbreal.png" />
</div>
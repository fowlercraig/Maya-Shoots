<?php if($post->post_content=="") : ?>

<!-- Do stuff with empty posts (or leave blank to skip empty posts) -->

<?php else : ?>

  <div class="item description">
  	<?php the_content(); ?>
  </div>

<?php endif; ?>
	
	<?php 
	    $args = array(
	    	'post_type' => 'attachment',
	    	'posts_per_page' => -1,
	    	'orderby' => 'menu_order',
	    	'numberposts' => null,
	    	'post_status' => null,
	    	'post_parent' => $post->ID
	    ); 
	    $attachments = get_posts($args);
                                
		  if ($attachments) {     
		        $redirFrom = 0;
		        if(isset($_GET['redirFrom'])) {
		            $redirFrom = $_GET['redirFrom'];
		        }
	    	foreach ($attachments as $attachment) {
	    	     $medSrcArr = wp_get_attachment_image_src($attachment->ID, 'medium');		    	 
	    	     $largeSrcArr = wp_get_attachment_image_src($attachment->ID, 'large');	    	 
                 ?>
	    		
	    		<?php include('item-photo.php'); ?>
	    		
	    		<?php
	    	}
	    } ?>
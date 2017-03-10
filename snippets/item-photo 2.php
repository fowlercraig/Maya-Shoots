<div class="item image bit-3">
	<a href="<?php the_permalink(); ?>">
	<span class="thumb">
		<?php if ( has_post_thumbnail() ) { ?>
		<?php the_post_thumbnail('large'); ?>
		<?php }?>
	</span>
	<h3 class="entry-title"><?php the_title(); ?></h3>
	</a>
</div>
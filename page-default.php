<?php Themewrangler::setup_page();get_header(/***Template Name: Default Page*/); ?>

<section id="project" role="main" class="frame">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('frame'); ?>>

	<div class='bit-75'>
	   <?php  if ( has_post_thumbnail() ) { ?>
		<div class="thumbnail"><?php the_post_thumbnail('large'); ?></div>
		<?php }?>
		<?php the_content(); ?>
	</div>

</article>
<?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>
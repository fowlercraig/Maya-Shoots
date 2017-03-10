<?php Themewrangler::setup_page();get_header(); ?>
<section id="project" role="main" class="frame">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>

<?php $images = get_field('project_gallery'); ?>
<?php if( $images ): ?>
<section class="grid photo-gallery frame">

<?php foreach( $images as $image ): ?>
   <figure class="item image bit-4">
   <a href="<?php echo $image['sizes']['large']; ?>" data-effect="mfp-move-horizontal">
   <span class="thumb"><img src="<?php echo $image['sizes']['project-thumb']; ?>" alt="<?php echo $image['alt']; ?>" /></span>
   </a>
   </figure>

<?php endforeach; ?>
</section><!-- Gallery-->
<?php endif; ?>

</article><!-- <?php the_title(); ?>-->
<?php endwhile; endif; ?>
</section><!-- Project-->

<?php get_footer(); ?>
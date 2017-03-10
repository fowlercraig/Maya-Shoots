<?php Themewrangler::setup_page();get_header(); ?>
<section id="index" role="main">
<article id="post" class="clear">

<?php $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; // setup pagination

$the_query = new WP_Query( array( 
'post_type'			=> 'page',
'paged'				=> $paged,
'order'				=> 'ASC',
'post_parent'		=> 8,
'orderby'			=> 'menu_order',
'posts_per_page'	=> 1)
);

while ( $the_query->have_posts() ) : $the_query->the_post();
include('snippets/item-photo-index.php');
endwhile;

wp_reset_postdata(); // Rest Data
?>

</article>	
</section>

<?php get_footer(); ?>
<?php
// Get all the gallery images
$query_images_args = array(
    'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
);
?>

<?php
$query_images = new WP_Query( $query_images_args );
$images = array();
foreach ( $query_images->posts as $attachment) {
    $meta = get_post_meta($attachment->ID);
    if(isset($meta['_isFeatured']) && $meta['_isFeatured'][0] == 1) {
        //$images[]= wp_get_attachment_url( $image->ID );
        $medSrcArr = wp_get_attachment_image_src($attachment->ID, 'medium');
        // Does this attachment belong to a parent
        $parent = false;
        if($attachment->post_parent > 0) {
            $parent = get_post($attachment->post_parent);
        }
        // do parents exist?
        ?>
        <?php include('item-photo.php'); ?>
        <?php
    }
}

?>
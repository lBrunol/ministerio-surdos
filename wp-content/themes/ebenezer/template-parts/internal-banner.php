<?php
    if( !is_home() ) {
        if( is_page() || is_single() ){
            $title = get_the_title();
            $description = get_the_excerpt();
            $image_url = get_the_post_thumbnail_url();
        } else {
            $title = !empty( ebenezer_get_the_archive_title() ) ? ebenezer_get_the_archive_title() : 'Ministério Ebenézer';
            $description = !empty( ebenezer_get_the_archive_description() ) ? ebenezer_get_the_archive_description() : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        }
    }
?>
<?php if( isset( $image_url ) && $image_url && get_the_category( get_the_ID() )[0] -> slug !== 'videos' ) : ?>
    <section class="internal-banner -image" style="background-image: url('<?php echo $image_url; ?>')">
<?php else : ?>
    <section class="internal-banner">
<?php endif; ?>
    <div class="container _text-center">
        <h2 class="title"><?php echo $title; ?></h2>
        <p class="description"><?php echo $description; ?></p>
    </div>
</section>
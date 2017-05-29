<?php 
    $banners = new WP_Query( array(
        'post_type' => 'banners',
        'posts_per_page' => 20,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'banner_active',
                'value' => 'true',
                'compare' => '='
            )
        )
    ) );

    if ( $banners -> have_posts() ) :			
?>
<section class="_section-site">
    <div class="container">
        <div class="owl-carousel home-banner">
            <?php while( $banners -> have_posts() ) : $banners -> the_post();
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                $target = !empty( get_post_meta( get_the_ID(), 'banner_target', true ) ) ? '_blank' : '_self';
                $link = get_post_meta( get_the_ID(), 'banner_link', true );
            ?>
                <div class="item">
                    <?php if ( !empty( $link ) ) : ?>
                        <a href="<?php echo $link; ?>" target="<?php echo $target; ?>" tabindex="-1">
                    <?php endif; ?>
                        <img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(); ?>" class="_img-responsive" />
                    <?php if ( !empty( $link ) ) : ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
		</div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
    </div>
</section>
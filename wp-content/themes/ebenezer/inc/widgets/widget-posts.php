<?php 
    class ebenezer_posts_widget extends WP_Widget {
        function __construct(){
            parent::__construct( 'ebenezer_posts_widget', 'Últimos Posts', array(
                'description' => 'Lista os últimos posts do site'
            ) );
        }

        public function widget( $args, $instance ){
            
            global $post;

            $artigos = get_posts(array(
                'numberposts' => 5,
                'category' => get_category_by_slug( 'artigos' ) -> term_id,
                'meta_query' => array(
                    array(
                        'key' => 'post_visible_crosslink',
                        'compare' => 'NOT EXISTS'
                    )
                )
            ));

            if( $artigos && !( add_query_arg() === "/artigos/") ) : ?>
                <div class="_section-site">
                    <h2><span class="icon-article"></span> Últimos artigos</h2>
                    <ul class="list-events -bordergray -article">
                        <?php foreach ( $artigos as $artigo ) : ?>
                        <?php 
                            $post_content = wp_trim_words( $artigo -> post_excerpt, 10, '...' );                        
                            if ( !$post_content ) {
                                $post_content = wp_trim_words( $artigo -> post_content, 10, '...' );
                            }
                        ?>
                            <li class="list-events-item">
                                <a href="<?php echo get_permalink( $artigo -> ID ); ?>" class="list-events-link"><?php echo $artigo -> post_title; ?></a>
                                <p class="list-events-text"><?php echo $post_content; ?></p>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            <?php endif;
        }
    }

    function load_ebenezer_posts_widget() {
        register_widget( 'ebenezer_posts_widget' );
    }
    add_action( 'widgets_init', 'load_ebenezer_posts_widget' );
?>
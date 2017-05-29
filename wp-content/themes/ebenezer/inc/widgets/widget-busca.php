<?php
    class ebenezer_search_widget extends WP_Widget {
        function __construct(){
            parent::__construct( 'ebenezer_search_widget', 'Busca', array(
                'description' => 'Apresenta um formulário simples para buscas no site.'
            ) );
        }

        public function widget( $args, $instance ) {
        ?>
            <form role="search" method="get" class="form-search _section-site" action="<?php echo get_home_url(); ?>">
                <div class="input-group -full" aria-describedby="searchInfo">
                    <span class="sr-text" id="searchInfo">Aqui você pode buscar as informações do site.</span>
                    <input type="search" name="s" placeholder="O que você procura?" class="form-control icon-search" value="<?php get_search_query(); ?>" >
                    <div class="input-group-addon">
                        <button type="submit" class="input-group-button icon-search" title="Buscar"></button>
                    </div>
                </div>
            </form>        
        <?php
        }
    }

    function load_ebenezer_search_widget() {
        register_widget( 'ebenezer_search_widget' );
    }
    add_action( 'widgets_init', 'load_ebenezer_search_widget' );
?>
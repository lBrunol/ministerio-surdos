<?php 
    class ebenezer_eventos_widget extends WP_Widget {
        function __construct(){
            parent::__construct( 'ebenezer_eventos_widget', 'Próximos eventos', array(
                'description' => 'Lista os próximos eventos'
            ) );
        }

        public function widget( $args, $instance ){

            $current_date = new DateTime();
            $inicial_date = $current_date -> format('Y-m-d');
            $final_date = $current_date -> format('Y-m-t');

            $events = get_posts(array(
                'numberposts' => 3,
                'post_type' => 'eventos',
                'orderby' => 'event_date',
                'order' => 'asc',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'event_date',
                        'value' => $inicial_date,
                        'compare' => '>='
                    ),
                    array(
                        'key' => 'event_date',
                        'value' => $final_date,
                        'compare' => '<='
                    ),
                )
            ));

            if( $events ) : ?>
                <div class="_section-site">
                    <h2><span class="icon-calendar"></span> Próximos eventos</h2>
                    <ul class="list-events -border">
                        <?php foreach ( $events as $event ) : ?>
                        <?php 
                            $event_date = get_post_meta( $event -> ID, 'event_date', true );
                            $event_hour = get_post_meta( $event -> ID, 'event_hour', true );
                            $event_realization = date('d/m/Y', strtotime( $event_date ) );
                            if( $event_hour){
                                $event_realization .= ' - ' . $event_hour;
                            }
                        ?>
                            <li class="list-events-item">
                                <span class="list-events-date"><?php echo  $event_realization; ?></span>
                                <a href="/eventos/#<?php echo $event -> post_name; ?>" class="list-events-link"><span class="list-events-icon icon-angle-right"></span> <?php echo $event -> post_title; ?></a>                            
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            <?php endif;
        }
    }

    function load_ebenezer_eventos_widget() {
        register_widget( 'ebenezer_eventos_widget' );
    }
    add_action( 'widgets_init', 'load_ebenezer_eventos_widget' );
?>
<?php
    if( isset( $_GET['mes'] ) && isset( $_GET['ano'] ) ) {

        //Pega os parâmetros da url
        $year = $_GET['ano'];
        $month = $current_month = $_GET['mes'];

        //Transforma os parâmetros em uma data correspondente ao primeiro dia do mês
        $str_date = $year . '-' . $month . '-01';

        //Recupera o primeiro dia e o último do mês pasado via parâmetro
        $inicial_date = strtotime( $str_date );
        $final_date = date( 'Y-m-t', $inicial_date );
        $inicial_date = date( 'Y-m-d', $inicial_date );        
    } else {
        $current_date = new DateTime();
        $current_month = $current_date -> format('m');
        $inicial_date = $current_date -> format('Y-m-01');
        $final_date = $current_date -> format('Y-m-t');
    }

    $events = get_posts(array(
        'post_type' => 'eventos',
        'numberposts' => 100,
        'orderby' => 'event_date',
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

    $months = array(
        array(
            'name' => 'Janeiro',
            'number' => '01'
        ),
        array(
            'name' => 'Fevereiro',
            'number' => '02'
        ),
        array(
            'name' => 'Março',
            'number' => '03'
        ),
        array(
            'name' => 'Abril',
            'number' => '04'
        ),
        array(
            'name' => 'Maio',
            'number' => '05'
        ),
        array(
            'name' => 'Junho',
            'number' => '06'
        ),
        array(
            'name' => 'Julho',
            'number' => '07'
        ),
        array(
            'name' => 'Agosto',
            'number' => '08'
        ),
        array(
            'name' => 'Setembro',
            'number' => '09'
        ),
        array(
            'name' => 'Outubro',
            'number' => '10'
        ),
        array(
            'name' => 'Novembro',
            'number' => '11'
        ),
        array(
            'name' => 'Dezembro',
            'number' => '12'
        )
    );

    $name_current_month = array_values( array_filter( $months, function($val) use($current_month){
        return $val['number'] == $current_month;
    }));

?>
<div class="content-card">
    <?php foreach( $months as $month ) : ?>
        <div class="card-site -heightdefault"><a aria-label="Ir para eventos do mês de <?php echo $month['name']; ?>" href="<?php echo get_the_permalink(); ?>?mes=<?php echo $month['number']; ?>&ano=<?php echo date('Y'); ?>" class="card-site-hover<?php echo $current_month == $month['number'] ? ' -active' : ''; ?>"><?php echo $month['name']; ?></a></div>
    <?php endforeach ?>
</div>
<h2>Eventos para o mês de <?php echo $name_current_month[0]['name']; ?></h2>
<?php
    if( $events ) : 
        foreach( $events as $key => $event ) :

            $event_subtitle = get_post_meta( $event -> ID, 'event_subtitle', true );
            $event_description = get_post_meta( $event -> ID, 'event_description', true );
            $event_date = get_post_meta( $event -> ID, 'event_date', true );
            $event_hour = get_post_meta( $event -> ID, 'event_hour', true );
            $event_in = get_post_meta( $event -> ID, 'event_in', true );    	
            $event_link = get_post_meta( $event -> ID, 'event_link', true );    	
            $event_facebook = get_post_meta( $event -> ID, 'event_facebook', true );
            $event_twitter = get_post_meta( $event -> ID, 'event_twitter', true );
            $event_gplus = get_post_meta( $event -> ID, 'event_gplus', true );
            $event_linkedin = get_post_meta( $event -> ID, 'event_linkedin', true );
            $event_instagram = get_post_meta( $event -> ID, 'event_instagram', true );
            $event_image = wp_get_attachment_image_src( get_post_thumbnail_id( $event -> ID ), 'full' );
?>
    <?php if( $key % 2 === 0 ) 
        echo '<div class="row">';
    ?>
    <div class="col-md-6">
        <div class="photo-card" id="<?php echo $event -> post_name; ?>">
            <?php if( $event_image ) : ?>
                <div class="photo-card-image">
                    <img src="<?php echo $event_image[0]; ?>" alt="">
                </div>
            <?php endif; ?>
            <div class="photo-card-heading">
                <h2 class="photo-card-title"><?php echo $event -> post_title; ?></h2>
                <?php if( $event_subtitle ) : ?><h3 class="photo-card-subtitle"><?php echo $event_subtitle; ?></h3><?php endif; ?>
            </div>
            <div class="photo-card-description">
                <?php if( $event_description ) : ?><p><?php echo $event_description; ?></p><?php endif; ?>
                <?php if( $event_date || $event_hour || $event_in || $event_link ) : ?>
                    <div class="fake-list list">
                        <?php if( $event_date ) : ?><div class="fake-list-item"><span class="icon-calendar"></span> <time datetime="<?php echo $event_date; ?>"><?php echo mysql2date( 'd \d\e F \d\e Y', $event_date ); ?></time></div><?php endif; ?>
                        <?php if( $event_hour ) : ?><div class="fake-list-item"><span class="icon-clock"></span> <?php echo $event_hour; ?></div><?php endif; ?>
                        <?php if( $event_in ) : ?><div class="fake-list-item"><span class="icon-money"></span> <?php echo $event_in; ?></div><?php endif; ?>
                        <?php if( $event_link ) : ?><div class="fake-list-item"><span class="icon-link"></span> <a href="<?php echo $event_link; ?>" target="_blank">Link do evento</a></div><?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if( $event_date || $event_hour || $event_in || $event_link ) : ?>
                <ul class="list-inline _text-right">
                    <?php if( $event_facebook ) : ?><li class="list-inline-item social-link -default"><a href="<?php echo $event_facebook; ?>" class="list-inline-link social-link-link"><span class="icon-facebook"></span></a></li><?php endif; ?>
                    <?php if( $event_twitter ) : ?><li class="list-inline-item social-link -default"><a href="<?php echo $event_twitter; ?>" class="list-inline-link social-link-link"><span class="icon-twitter"></span></a></li><?php endif; ?>
                    <?php if( $event_linkedin ) : ?><li class="list-inline-item social-link -default"><a href="<?php echo $event_linkedin; ?>" class="list-inline-link social-link-link"><span class="icon-linkedin"></span></a></li><?php endif; ?>
                    <?php if( $event_instagram ) : ?><li class="list-inline-item social-link -default"><a href="<?php echo $event_instagram; ?>" class="list-inline-link social-link-link"><span class="icon-instagram"></span></a></li><?php endif; ?>
                    <?php if( $event_gplus ) : ?><li class="list-inline-item social-link -default"><a href="<?php echo $event_gplus; ?>" class="list-inline-link social-link-link"><span class="icon-gplus"></span></a></li><?php endif; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if( $key % 2 !== 0 ) 
        echo '</div>';    
    ?>
    <?php endforeach; ?>
<?php else : ?>
    <p>Não existem eventos cadastrados neste mês.</p>
<?php endif; ?>
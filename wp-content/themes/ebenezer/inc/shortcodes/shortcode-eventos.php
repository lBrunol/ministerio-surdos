<?php 
/**
 * Adiciona um shortcode de eventos
 */
function eventos_shortcode() {
    
    ob_start();

    require get_template_directory() . '/template-parts/content-eventos.php';
    $template = ob_get_contents();

    ob_end_clean();

    return $template;
}

add_shortcode( 'eventos', 'eventos_shortcode' );

?>
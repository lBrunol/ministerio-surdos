<?php

/**
 * Shortcodes utilizados no editor
 */
function video_youtube_shortcode( $attr ) {
    $data = '';    

    if( $attr ) {
        $url = isset( $attr['url'] ) ? $attr['url'] : false;
        $width = isset( $attr['width'] ) ? $attr['width'] : '';
        $height = isset( $attr['height'] ) ? $attr['height'] : '';

        if( $width ) {
            $width = 'width="' . $width . '"';
        }

        if( $height ) {
            $height = 'height="' . $height . '"';
        }

        if( $url ) {
            $data = '<div class="embed-responsive"><iframe class="embed-responsive-media" src="https://www.youtube.com/embed/' . $url . '" ' .  $width . ' '. $height . ' frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>';
        }

        return $data;
    }
}

add_shortcode( 'video-youtube', 'video_youtube_shortcode' );

?>
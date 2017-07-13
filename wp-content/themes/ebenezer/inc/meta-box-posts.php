<?php

    add_action( 'add_meta_boxes', 'posts_custom_meta_box' );

    function posts_custom_meta_box() {        
        add_meta_box(
            'meta_box_posts',
            'Outras opções',
            'posts_custom_meta',
            'post',
            'normal',
            'high'
        );
    }
    
    function posts_custom_meta() {

        global $post;

        $post_visible_crosslink = get_post_meta( $post -> ID, 'post_visible_crosslink', true );

    ?>
    <div class="form-field"> 
        <input name="post_visible_crosslink" type="checkbox" value="true" <?php if( $post_visible_crosslink ) echo 'checked' ?> />
        <label for="post_visible_crosslink">Ocultar do crosslink</label>
    </div>
    
    <?php
    }

    add_action( 'save_post', 'posts_save_custom_meta' );

    function posts_save_custom_meta( $post_id ){
        if (!isset( $_POST['_inline_edit'] )){
            if ( get_post_type( $post_id ) == 'post' ) {
                ebenezer_save_post_meta( $post_id, 'post_visible_crosslink', isset( $_POST['post_visible_crosslink'] ) ? true : false );
            }
        }
    }
?>
<?php 

/**
 * Tipo de conteúdo personalizado: Eventos
 *
 * Eventos do Ebenézer
 *
 * @package ebenezer
 */

function custom_type_eventos() {

	// Define os textos que serão exibidos no admin
	$labels = array(
		'name' => 'Eventos',
        'singular_name' => 'Evento',
        'add_new' => 'Adicionar Novo',
        'add_new_item' => 'Novo Evento',
        'edit_item' => 'Editar Evento',
        'new_item' => 'Novo Evento',
        'view_item' => 'Ver Evento',
        'search_items' => 'Procurar Evento',
        'not_found' =>  'Nenhum Evento encontrado',
        'not_found_in_trash' => 'Nenhum Evento encontrado na lixeira',
        'menu_name' => 'Eventos',
        'all_items' => 'Todos os Eventos'
	);

    // Define as configurações
    $args = array(
        'labels' => $labels,
        'capability_type' => 'page',
        'public' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title', 'thumbnail'),
		'register_meta_box_cb' => 'eventos_meta_box',
        'rewrite' => false,
        'has_archive' => true,
        'query_var' => false,
        'delete_with_user' => false
    );

    register_post_type( 'eventos', $args );
}

add_action('init', 'custom_type_eventos');

// Adiciona um metabox no template de páginas para informar autor, data e veículo com link
function eventos_meta_box() {        
    add_meta_box(
        'meta_box_eventos',
        'Eventos',
        'eventos_meta',
        'eventos',
        'normal',
        'high'
    );
}

function eventos_meta(){
	global $post;

    $event_subtitle = get_post_meta( $post -> ID, 'event_subtitle', true );
    $event_description = get_post_meta( $post -> ID, 'event_description', true );
    $event_date = get_post_meta( $post -> ID, 'event_date', true );
    $event_hour = get_post_meta( $post -> ID, 'event_hour', true );
    $event_in = get_post_meta( $post -> ID, 'event_in', true );    	
    $event_link = get_post_meta( $post -> ID, 'event_link', true );    	
    $event_facebook = get_post_meta( $post -> ID, 'event_facebook', true );
    $event_twitter = get_post_meta( $post -> ID, 'event_twitter', true );
    $event_gplus = get_post_meta( $post -> ID, 'event_gplus', true );
    $event_linkedin = get_post_meta( $post -> ID, 'event_linkedin', true );
    $event_instagram = get_post_meta( $post -> ID, 'event_instagram', true );

	?>
    
    <div class="form-field">
        <label for="event_subtitle">Subtítulo</label>
        <input type="text" name="event_subtitle" id="event_subtitle" value="<?php echo $event_subtitle; ?>" />
    </div>

    <div class="form-field">
        <label for="event_description">Descrição</label>
        <textarea rows="3" name="event_description" id="event_description"><?php echo $event_description; ?></textarea>
    </div>

    <div class="form-field">
        <label for="event_date">Data</label>
        <input type="date" name="event_date" id="event_date" value="<?php echo $event_date; ?>" />
    </div>

    <div class="form-field">
        <label for="event_hour">Horário</label>
        <input type="text" name="event_hour" id="event_hour" value="<?php echo $event_hour; ?>" />
    </div>

    <div class="form-field">
        <label for="event_in">Entrada</label>
        <input type="text" name="event_in" id="event_in" value="<?php echo $event_in; ?>" />
    </div>

    <div class="form-field">
        <label for="event_link">Link</label>
        <input type="text" name="event_link" id="event_link" value="<?php echo $event_link; ?>" />
    </div>

    <div class="form-field">
        <label for="event_facebook">Facebook</label>
        <input type="text" name="event_facebook" id="event_facebook" value="<?php echo $event_facebook; ?>" />
    </div>

    <div class="form-field">
        <label for="event_twitter">Twitter</label>
        <input type="text" name="event_twitter" id="event_twitter" value="<?php echo $event_twitter; ?>" />
    </div>

    <div class="form-field">
        <label for="event_gplus">Google+</label>
        <input type="text" name="event_gplus" id="event_gplus" value="<?php echo $event_gplus; ?>" />
    </div>

    <div class="form-field">
        <label for="event_linkedin">Linkedin</label>
        <input type="text" name="event_linkedin" id="event_linkedin" value="<?php echo $event_linkedin; ?>" />
    </div>

    <div class="form-field">
        <label for="event_instagram">Instagram</label>
        <input type="text" name="event_instagram" id="event_instagram" value="<?php echo $event_instagram; ?>" />
    </div>

    <?php 
}

add_action( 'save_post', 'save_eventos_post' );

function save_eventos_post( $post_id ){
    
    if (!isset( $_POST['_inline_edit'] )){
        if ( get_post_type( $post_id ) == 'eventos' ) {

            $fields = array(
                array(
                    'field' => 'event_subtitle',
                    'value' => isset( $_POST['event_subtitle'] ) ?  $_POST['event_subtitle'] : false
                ),
                array(
                    'field' => 'event_description',
                    'value' => isset( $_POST['event_description'] ) ?  $_POST['event_description'] : false
                ),
                array(
                    'field' => 'event_date',
                    'value' => isset( $_POST['event_date'] ) ?  $_POST['event_date'] : false
                ),
                array(
                    'field' => 'event_hour',
                    'value' => isset( $_POST['event_hour'] ) ?  $_POST['event_hour'] : false
                ),
                array(
                    'field' => 'event_in',
                    'value' => isset( $_POST['event_in'] ) ?  $_POST['event_in'] : false
                ),
                array(
                    'field' => 'event_link',
                    'value' => isset( $_POST['event_link'] ) ?  $_POST['event_link'] : false
                ),
                array(
                    'field' => 'listar_convenios',
                    'value' => isset( $_POST['listar_convenios'] ) ?  $_POST['listar_convenios'] : false
                ),
                array(
                    'field' => 'event_facebook',
                    'value' => isset( $_POST['event_facebook'] ) ?  $_POST['event_facebook'] : false
                ),
                array(
                    'field' => 'event_twitter',
                    'value' => isset( $_POST['event_twitter'] ) ?  $_POST['event_twitter'] : false
                ),
                array(
                    'field' => 'event_gplus',
                    'value' => isset( $_POST['event_gplus'] ) ?  $_POST['event_gplus'] : false
                ),
                array(
                    'field' => 'event_linkedin',
                    'value' => isset( $_POST['event_linkedin'] ) ?  $_POST['event_linkedin'] : false
                ),
                array(
                    'field' => 'event_instagram',
                    'value' => isset( $_POST['event_instagram'] ) ?  $_POST['event_instagram'] : false
                ),
            );
            
            //Chama a função para salvar os posts meta
            foreach( $fields as $field ){
                ebenezer_save_post_meta( $post_id, $field['field'], $field['value'] );
            }
        }
    }
}

?>
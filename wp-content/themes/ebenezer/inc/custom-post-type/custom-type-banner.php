<?php 

/**
 * Tipo de conteúdo personalizado: Banner
 *
 * Banners que são exibidos na tela inicial do site
 *
 * @package Hcor
 */

function custom_type_banner() {

    // Define os textos que serão exibidos no admin
	$labels = array(
        'name' => 'Banners',
        'singular_name' => 'Banner',
        'add_new' => 'Adicionar Novo',
        'add_new_item' => 'Novo Banner',
        'edit_item' => 'Editar Banner',
        'new_item' => 'Novo Banner',
        'view_item' => 'Ver Banner',
        'search_items' => 'Procurar Banner',
        'not_found' =>  'Nenhum Banner encontrado',
        'not_found_in_trash' => 'Nenhum Banner encontrado na lixeira',
        'menu_name' => 'Banners',
        'all_items' => 'Todos os Banners'
    );

    // Define as configurações
	$args = array(
		'labels' => $labels,
		'capability_type' => 'page',
        'public' => false,
        'show_ui' => true,
        'show_in_rest' => false,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-format-image',
		'supports' => array( 'title', 'thumbnail'),
        'register_meta_box_cb' => 'banner_meta_box',
        'rewrite' => false,
        'query_var' => false,
        'delete_with_user' => false
	);

	register_post_type( 'banners', $args );
}

add_action('init', 'custom_type_banner');

// Adiciona uma meta box pra inserir conteúdo personalizado
function banner_meta_box() {        
    add_meta_box(
        'meta_box_banner',
        'Configurações do Banner',
        'banner_meta',
        'banners',
        'normal',
        'high'
    );
}

// Configura os campos da meta box e imprime na tela do admin
function banner_meta(){
    global $post;
    
    $banner_target = get_post_meta( $post -> ID, 'banner_target', true );
    $banner_link = get_post_meta( $post -> ID, 'banner_link', true );
    $banner_active = get_post_meta( $post -> ID, 'banner_active', true );    
    
?>
    <div class="form-field">
        <label for="banner_link">Link</label><br>
        <input type="text" name="banner_link" id="banner_link" value="<?php echo $banner_link; ?>" />
    </div>
    <br>
    <div class="form-field">
        <input type="checkbox" name="banner_target" id="banner_target" value="_blank" <?php if ( $banner_target ) echo 'checked'; ?> />
        <label for="banner_target">Abrir link em uma nova guia</label>
    </div>
    <br>
    <div class="form-field">
        <input type="checkbox" name="banner_active" id="banner_active" value="true" <?php if ( $banner_active ) echo 'checked'; ?> />
        <label for="banner_active">Ativo</label>
    </div>    
<?php
}

// Salva os dados do meta box ao salvar o depoimento
add_action( 'save_post', 'save_banner_post' );

function save_banner_post( $post_id ) {
    if (!isset( $_POST['_inline_edit'] )){
        if ( get_post_type( $post_id ) == 'banners' ) {

            $fields = array(
                array(
                    'field' => 'banner_target',
                    'value' => $_POST['banner_target']
                ),
                array(
                    'field' => 'banner_link',
                    'value' => $_POST['banner_link']
                ),
                array(
                    'field' => 'banner_active',
                    'value' => $_POST['banner_active']
                )
            );
            
            //Chama a função para salvar os posts meta
            foreach( $fields as $field ){
                ebenezer_save_post_meta( $post_id, $field['field'], $field['value'] );
            }
        }
    }
}

?>
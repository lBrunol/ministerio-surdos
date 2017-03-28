<?php
/**
 * Renderiza o breadcrumbs do site
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hospital_do_Coração
 */

/**
 * Retorna um array com toda a estrutura de páginas e posts do site
 */
function ebenezer_get_breadcrumbs() {
    global $post;

    $bread = array();

    if ( is_page() ) {
        $type = 'page';
    } else if ( is_tax() ) {
        $type = 'tax';
	} else if ( is_archive() ) {
        $type = 'archive';
    } else if ( is_single() ) {
        $type = 'single';
    }

	//Adiciona a home no bread
    if ( isset( $type ) ) {
        array_push( $bread, array(
            'title' => 'Home',
            'slug' => get_home_url()
        ) );
    } else {
        return false;
    }

	//Pega o post type atual
	$post_type = get_post_type();
	//Pega o slug do archive
	$slug_archive = get_post_type_archive_link( get_post_type() );
	//Pega aos dados do archive
	$archive_data = ebenezer_get_post_type_data();

    if ( $type == 'page' ) {
		//Adiciona os ancestrais ao bread caso a página possua
        ebenezer_get_bread_array( $bread, get_ancestors( $post -> ID, $type ) );
		$title = get_the_title( $post -> ID );

    } else if ( $type == 'archive' ) {
        $title = $archive_data -> label;

	} else if ( $type == 'tax' ) {
		$tax = get_queried_object();
        $title = $tax -> name;
    } else if ( $type == 'single' ) {

        $archive_data = ebenezer_get_post_type_data( $post -> ID );
        $title = get_the_title( $post -> ID );
		
		//Adiciona o archive no bread
        array_push( $bread, array(
            'title' => $archive_data -> label,
            'slug' => $slug_archive
        ) );
		
    }

	//Adiciona a página atual no bread
    if ( isset( $title ) ) {
        array_push( $bread, array(
            'title' => $title,
            'slug' => null
        ) );
    }

    return $bread;
}

function ebenezer_get_bread_array( &$bread, $ancestors, $post_id = false ) {
    if ( $ancestors ) {
        for ( $i = count( $ancestors ) - 1; $i >= 0; $i-- ) {

            array_push( $bread, array(
                'title' => get_the_title( $ancestors[$i] ),
                'slug' => get_permalink( $ancestors[$i] )
            ) );
        }
    }

	if( $post_id ) {
		array_push( $bread, array(
			'title' => get_the_title( $post_id ),
			'slug' => get_permalink( $post_id )
		) );
	}

}
$bread = ebenezer_get_breadcrumbs();
?>
<?php if ( $bread ) : ?>
    <ul class="bread-site">
    <?php foreach ( $bread as $key => $item ) : ?>
        <li class="item">
            <?php if ( $item['slug'] ) : ?>
                <a href="<?php echo $item['slug']; ?>" class="link" title="<?php echo $item['title']; ?>">				
            <?php endif; ?>

            <span <?php if( count( $bread ) - 1 === $key ) echo 'class="php-active"'; ?>><?php echo $item['title']; ?></span>

            <?php if ( $item['slug'] ) : ?>
                </a>
            <?php endif; ?>
			<?php if( count( $bread ) - 1 !== $key ) : ?><span class="icon icon-down-dir"><?php endif; ?>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
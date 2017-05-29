<?php
/**
 * Renderiza o breadcrumbs do site
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ebenezer
 */

/**
 * Retorna um array com toda a estrutura de páginas e posts do site
 */
function ebenezer_get_breadcrumbs() {
    global $post;

    $bread = array();

    if ( is_page() ) {
        $type = 'page';
    } else if ( is_category() ) {
        $type = 'cat';
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

    if ( $type == 'page' ) {
		//Adiciona os ancestrais ao bread caso a página possua
        ebenezer_get_bread_array( $bread, get_ancestors( $post -> ID, $type ) );
		$title = get_the_title( $post -> ID );

    } else if ( $type == 'cat' ) {
        $title = single_cat_title( '', false );        
    } else if ( $type == 'single' ) {

        $tax = get_the_category( $post -> ID );
        $title = get_the_title( $post -> ID );

        if( $tax ){
            //Adiciona a categoria no bread
            array_push( $bread, array(
                'title' => $tax[0] -> cat_name,
                'slug' => get_term_link( $tax[0] )
            ) );
        }
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

function ebenezer_render_breadcrumbs( $bread ) {
    if ( $bread ) : ?>
        <ul class="bread-site">
            <?php foreach ( $bread as $key => $item ) : ?>
                <li class="bread-site-item">
                    <?php if ( $item['slug'] ) : ?>
                        <a href="<?php echo $item['slug']; ?>" class="bread-site-link" title="<?php echo $item['title']; ?>">				
                    <?php endif; ?>

                    <span <?php if( count( $bread ) - 1 === $key ) echo 'class="php-active"'; ?>><?php echo $item['title']; ?></span>

                    <?php if ( $item['slug'] ) : ?>
                        </a>
                    <?php endif; ?>
                    <?php if( count( $bread ) - 1 !== $key ) : ?><span class="bread-site-icon icon-down-dir"><?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif;
}
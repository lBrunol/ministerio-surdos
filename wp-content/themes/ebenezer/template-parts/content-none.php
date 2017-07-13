<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ebenezer
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<p>Não existem posts para esta categoria.</p>
	</header>

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ebenezer' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p>Desculpe, mas nada relacionado a sua pesquisa foi encontrado.</p>
		<?php
		endif; ?>
	</div>
</section>

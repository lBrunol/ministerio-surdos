<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ebenezer
 */

get_header(); ?>
<div class="util-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-5">
               <nav class="container-bread">
					<ul class="bread-site">
						<li class="bread-site-item">
							<a href="<?php echo get_home_url(); ?>" class="bread-site-link" title="Home"><span>Home</span></a>
							<span class="bread-site-icon icon-down-dir"></span>
						</li>
						<li class="bread-site-item">
                    		<span class="php-active">Busca</span>
                         </li>
                    </ul>
				</nav>
            </div>
            <div class="col-md-5 _text-right">
                <nav class="accessibility-nav">
                    <ul class="accessibility-list">
                        <li class="accessibility-list-item"><button class="accessibility-list-button js-font-default" type="button" aria-hidden="true" title="Redefinir tamanho padrão"><span class="sr-text">Redefinir tamanho padrão</span>A</button></li>
                        <li class="accessibility-list-item"><button class="accessibility-list-button js-font-increase" type="button" aria-hidden="true" title="Aumentar tamanho da fonte"><span class="sr-text">Aumentar tamanho da fonte</span>A+</button></li>
                        <li class="accessibility-list-item"><button class="accessibility-list-button js-font-decrease" type="button" aria-hidden="true" title="Diminuir tamanho da fonte"><span class="sr-text">Diminuir tamanho da fonte</span>A-</button></li>
                        <li class="accessibility-list-item"><button class="accessibility-list-button js-high-contrast" type="button" aria-hidden="true" title="Ativar/Desativar alto contraste"><span class="sr-text">Ativar/Desativar alto contraste</span><span class="accessibility-list-icon icon-adjust"></span></button></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<article class="internal-content -marginbottom" id="maincontent" tab-index="-1">
					<?php
					
					if ( have_posts() ) : ?>

						<h1>Resultados para: <?php echo get_search_query(); ?></h1>

						<?php
						global $post;
						while ( have_posts() ) :
							the_post();
							$post_id = get_the_ID();
							$post_title = get_the_title();
							$post_content = wp_trim_words( get_the_excerpt(), 50, ' [..]' );

							if ( !$post_content ) {
								$post_content = wp_trim_words( get_the_content(), 50, ' [..]' );
							}
							
							$post_link = esc_url( get_permalink() );

						?>
							<div class="post-summary -internal">
								<div class="content">
									<h2 class="title">
										<a href="<?php echo $post_link; ?>">
											<?php echo $post_title; ?>
										</a>
									</h2>
									<div class="summary">
										<p><?php echo strip_shortcodes( $post_content ); ?></p>
									</div>								
								</div>
							</div>								
						<?php								
						endwhile;
						$pages = paginate_links( array(
								'prev_next' => false,
								'type' => 'array'));
						if( $pages ) :
						?>
							<div class="_margin-top-25">
								<ul class="pagination-site">
									<?php foreach( $pages as $page ) : ?>
										<li class="item"><?php echo str_replace( 'page-numbers', 'link', str_replace( 'current', '-is-active', $page ) ); ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
					<?php else : ?>
						<h1>Nada encontrado</h1>
						<p>Para a busca por <strong>"<?php echo get_search_query(); ?>"</strong></p>
					<?php endif; ?>
				</article>
			</div>
			<div class="col-md-3">
				<?php get_sidebar(); ?>
				<aside class="_section-site">
					<h2><span class="icon-facebook-squared"></span> Nossa página</h2>
					<div class="fb-page" data-href="https://www.facebook.com/mandebem.noenem" data-tabs="timeline" data-width="255" data-height="255" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"></div>
				</aside>
			</div>
		</div>
	</div>
<?php
get_footer();

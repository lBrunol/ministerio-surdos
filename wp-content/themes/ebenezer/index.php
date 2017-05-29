<?php
/**
 * Arquivo da página inicial do site
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ebenezer
 */

get_header(); ?>

	<?php require_once get_template_directory() . '/template-parts/home-banner.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="_section-site">
					<h1><span class="icon-user"></span> Quem somos</h1>
					<img src="<?php echo get_template_directory_uri(); ?>/images/quem-somos.jpg" alt="Quem somos" class="_center-block _img-responsive" />
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam facilisis augue et vehicula hendrerit. Praesent volutpat, felis ac tincidunt cursus, diam quam tristique arcu, eget consequat dui orci et turpis.</p>
					<p>Vestibulum ultrices consectetur nisi placerat bibendum. Vivamus eget ipsum a ante eleifend blandit et eget mauris.</p>
					<p class="_btn-margin"><a href="/sobre-nos/" class="btn-default">Saiba mais sobre nós</a>
				</div>
			</div>
			<aside class="col-md-3">
				<?php dynamic_sidebar( 'home_sidebar' ); ?>
			</aside>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h1><span class="icon-cog"></span> Cursos e Serviços</h1>
				<div class="row">
					<div class="col-md-4">
						<div class="info-icon">
							<span class="info-icon-icon icon-sign-language"></span>
							<h2 class="info-icon-title">Curso de Libras</h2>
							<p class="info-icon-text">Para contribuir na interação comunicação entre surdos e ouvintes.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info-icon">
							<span class="info-icon-icon icon-address-card"></span>
							<h2 class="info-icon-title">Contrate um surdo</h2>
							<p class="info-icon-text">Para desenvolver o papel social da inclusão em todas as áreas. <a href="/fale-conosco/">Clique aqui</a> e entre em contato conosco.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info-icon">
							<span class="info-icon-icon icon-interpretation"></span>
							<h2 class="info-icon-title">Interpretação</h2>
							<p class="info-icon-text">Serviços de apoio as empresas para interpretação da Língua de Sinais.</p>
						</div>
					</div>
				</div>
			</div>
		</div>            
		<?php 
			$artigos = get_posts(array(
                'numberposts' => 2,
                'category' => 3
            ));
		?>
		<div class="row">
            <?php if( $artigos ) : ?>
				<div class="col-md-9">
					<div class="_section-site">
						<h1><span class="icon-newspaper"></span> Artigos</h1>
						<div class="row">
							<?php foreach ( $artigos as $artigo ) : ?>
							<?php 
								$post_content = wp_trim_words( $artigo -> post_excerpt, 20, '...' );
								$post_dates = ebenezer_get_post_date( $artigo -> ID );
								if ( !$post_content ) {
									$post_content = wp_trim_words( $artigo -> post_content, 20, '...' );
								}
							?>
								<div class="col-md-6">
									<article class="post-summary">
										<div class="date"><span class="icon-calendar-empty"><span> <time datetime="<?php echo $post_dates['date_complete']; ?>"><?php echo $post_dates['date_friendly']; ?></time></div>
										<h2 class="title"><?php echo $artigo -> post_title; ?></h2>
										<?php if( get_the_tag_list( $artigo -> ID ) ) : ?>
											<?php echo $tags_list = get_the_tag_list( '<ul class="list-categories"><li class="list-categories-item">', '</li><li class="list-categories-item">', '</li></ul>' ); ?>	
										<?php endif; ?>								
										<p class="text"><?php echo $post_content; ?></p>
										<a href="<?php echo get_permalink( $artigo -> ID ); ?>" class="link">Continue Lendo <span class="sr-text"><?php echo $artigo -> post_title; ?></span></a>
									</article>
								</div>
							<?php endforeach; wp_reset_postdata(); ?>
						</div>
						<p class="_btn-margin _text-right"><a href="/artigos/" class="btn-default">Veja mais</a></p>
					</div>
				</div>
			<?php endif; ?>
			<aside class="col-md-3">
				<div class="_section-site">
					<h2><span class="icon-facebook-squared"></span> Nossa página</h2>
				</div>
			</aside>
		</div>
		<?php 
			$videos = get_posts(array(
                'numberposts' => 4,
                'category' => 4
            ));
		?>
		<?php if( $videos ) : ?>
		<div class="row">
			<div class="col-md-12">
				<h1><span class="icon-video"></span> Vídeos</h1>
				<div class="row">
					<div class="col-md-7">
						<div class="video-site">
							<a href="<?php echo get_permalink( $videos[0] -> ID ); ?>" class="video-site-link" title="<?php echo get_permalink( $videos[0] -> ID ); ?>" title="<?php echo $videos[0] -> post_title; ?>">
								<img src="<?php echo get_the_post_thumbnail_url( $videos[0] -> ID, 'full' ); ?>" alt="" class="video-site-image _img-responsive" />
							</a>	
							<div class="video-site-label">
								<div class="video-site-description">
									<h2 class="video-site-title"><a href="<?php echo get_permalink( $videos[0] -> ID ); ?>" class="video-site-link js-link"><?php echo $videos[0] -> post_title; ?></a></h2>
								</div>
							</div>
						</div>
					</div>
					<?php if( count( $videos ) > 1 ) : ?>
						<div class="col-md-5">
							<div class="list-videos">
								<?php for ( $i=1; $i < count( $videos ); $i++ ) : ?>
									<?php $video_date = ebenezer_get_post_date( $videos[$i] -> ID ); ?>
									<div class="video-item">
										<a href="<?php echo get_permalink( $videos[$i] -> ID ); ?>" class="video-item-link">
											<img src="<?php echo get_the_post_thumbnail_url( $videos[$i] -> ID, 'thumb_video_home' ); ?>" alt="<?php echo $videos[$i] -> post_title; ?>" class="video-item-image" />
										</a>
										<div class="video-item-content">
											<h2 class="video-item-title"><a href="<?php echo get_permalink( $videos[$i] -> ID ); ?>" class="video-item-link"><?php echo $videos[$i] -> post_title; ?></a></h2>
											<div class="video-item-date"><span class="icon-calendar-empty"><span> <time datetime="<?php echo $video_date['date_complete']; ?>"><?php echo $video_date['date_friendly']; ?></time></div>
										</div>
									</div>
								<?php endfor; ?>
								<a href="/videos/" class="list-videos-more">Veja mais vídeos</a>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>

<?php
get_footer();

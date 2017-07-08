<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ebenezer
 */

get_header(); ?>

	<?php require_once get_template_directory() . '/template-parts/internal-banner.php'; ?>	
	<?php require_once get_template_directory() . '/template-parts/util-bar.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="internal-content" id="maincontent" tab-index="-1">
					<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post(); ?>
							<article class="post-summary -internal">
								<?php 
									$post_content = wp_filter_nohtml_kses( wp_trim_words( get_the_excerpt(), 100, ' [..]' ) );
									$post_thumbnail = get_the_post_thumbnail();
									$post_title = get_the_title();
									$is_video = get_queried_object() -> slug === 'videos';
									
									if ( !$post_content ) {
										$post_content = wp_filter_nohtml_kses( wp_trim_words( get_the_content(), 100, ' [..]' ) );
									}
									$post_link = esc_url( get_permalink() );
								?>
								<?php if( $post_thumbnail ) : ?>
									<div class="image">
										<?php if( $is_video ) : ?><div class="video-site -article"><?php endif; ?>
											<a href="<?php echo $post_link; ?>" class="video-site-link">
												<?php if( $is_video ) : ?><span class="video-site-icon icon-play-circled2" aria-hidden="true"></span><?php endif; ?>
												<?php the_post_thumbnail( 'thumb_post' ); ?>
											</a>
										<?php if( $is_video ) : ?></div><?php endif; ?>
									</div>
								<?php endif; ?>	
								<div class="content">
									<header>		
										<?php if ( 'post' === get_post_type() ) : $post_dates = ebenezer_get_post_date(); ?>
											<div class="date">
												<span class="icon-calendar-empty"></span>
												<span>
													<time datetime="<?php echo $post_dates['date_complete']; ?>"><?php echo $post_dates['date_friendly']; ?></time>
												</span>			
											</div>
										<?php endif; ?>
										<h1 class="title"><a href="<?php echo $post_link; ?>"><?php echo $post_title; ?></a></h1>
										<?php if( get_the_tag_list() ) : ?>
											<?php echo $tags_list = get_the_tag_list( '<ul class="list-categories"><li class="list-categories-item">', '</li><li class="list-categories-item">', '</li></ul>' ); ?>	
										<?php endif; ?>
									</header>

									<div class="summary">
										<?php
											if( $is_video ) 
												$text = "Veja o vídeo"; 
											else 
												$text = "Continue Lendo…";

											echo $post_content;
											echo '<p><a href="' . $post_link . '" class="more-link">'. $text . ' <span class="sr-text">'. $post_title . '</span></a></p>';

											wp_link_pages( array(
												'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ebenezer' ),
												'after'  => '</div>',
											) );
										?>
									</div>
								</div>
							</article>

						<?php endwhile;
						$pagination = paginate_links(array(
							'prev_next' => false,
							'type' => 'array'
						));
						if( $pagination ) : ?>
							<ul class="pagination-site">
								<?php foreach( $pagination as $item ) : ?>
									<?php $item = str_replace( 'page-numbers', 'pagination-site-link', str_replace( 'current', '-is-active', $item ) ); ?>
									<li class="pagination-site-item"><?php echo $item; ?></a>
								<?php endforeach; ?>
							</ul>
						<?php endif;
						else :
							get_template_part( 'template-parts/content', 'none' );
					endif; ?>
				</div>
			</div>
			<div class="col-md-3">
				<?php get_sidebar(); ?>
				<!--<aside class="_section-site">
					<h2><span class="icon-facebook-squared"></span> Nossa página</h2>
					<div class="fb-page" data-href="https://www.facebook.com/mandebem.noenem" data-tabs="timeline" data-width="255" data-height="255" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"></div>
				</aside>-->
			</div>
		</div>
	</div>
<?php

get_footer();
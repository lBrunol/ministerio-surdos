<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ebenezer
 */

get_header(); ?>
	<?php require_once get_template_directory() . '/template-parts/internal-banner.php'; ?>	
	<?php require_once get_template_directory() . '/template-parts/util-bar.php'; ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<article class="internal-content" id="maincontent" tab-index="-1">
						<header>
							<h1><?php the_title(); ?></h1>
						</header>
						<?php the_content(); ?>
					</article>						
				</div>				
				<aside class="col-md-3">
					<?php get_sidebar(); ?>
					<!--<div class="_section-site">
						<h2><span class="icon-facebook-squared"></span> Nossa página</h2>
						<div class="fb-page" data-href="https://www.facebook.com/mandebem.noenem" data-tabs="timeline" data-width="255" data-height="255" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"></div>
					</div>-->
				</aside>
			</div>
		</div>
		<div class="floater-site -gallery -large">
			<div class="floater-site-dialog">
				<div class="floater-site-content">
					<button type="button" class="close"><i class="icon icon-cancel"></i></button>
					<div class="floater-gallery">
						<button class="js-left-gallery floater-gallery-icon -left" type="button"><i class="icon icon-angle-left"></i></button>
						<img src="/wp-content/themes/ebenezer/images/loader-white.svg" alt="" class="floater-gallery-image -loader" />
						<img src="javascript:;" alt="" class="floater-gallery-image -photo js-hidden" />
						<p class="floater-gallery-message js-hidden">Não foi possível carregar a imagem</p>
						<button class="js-right-gallery floater-gallery-icon -right" type="button"><i class="icon icon-angle-right"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="floater-background"></div>
	<?php endwhile; ?>
<?php
get_footer();

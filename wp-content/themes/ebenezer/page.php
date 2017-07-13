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
	<?php endwhile; ?>
<?php
get_footer();

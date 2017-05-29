<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;
				?>
				</div>
			</div>
			<aside class="col-md-3">
				<?php get_sidebar(); ?>
				<div class="_section-site">
					<h2><span class="icon-facebook-squared"></span> Nossa página</h2>
					<div class="fb-page" data-href="https://www.facebook.com/mandebem.noenem" data-tabs="timeline" data-width="255" data-height="255" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"></div>
				</div>
			</aside>
		</div>
	</div>

<?php
get_footer();

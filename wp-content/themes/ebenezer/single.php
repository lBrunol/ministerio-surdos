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
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php
get_footer();

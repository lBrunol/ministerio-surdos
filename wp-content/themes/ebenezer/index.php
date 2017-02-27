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
				<div>
					<h1><span class="icon-user"></span> Quem somos</h1>
					<img src="<?php echo get_template_directory_uri(); ?>/images/quem-somos.jpg" alt="Quem somos" class="_center-block _img-responsive" />
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam facilisis augue et vehicula hendrerit. Praesent volutpat, felis ac tincidunt cursus, diam quam tristique arcu, eget consequat dui orci et turpis.</p>
					<p>Vestibulum ultrices consectetur nisi placerat bibendum. Vivamus eget ipsum a ante eleifend blandit et eget mauris.</p>
					<p class="_btn-margin"><a href="#" class="btn-default">Saiba mais sobre nós</a>
				</div>
			</div>
			<div class="col-md-3">

			</div>
		</div>
	</div>

<?php
get_footer();

<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ebenezer
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<article class="internal-content -marginbottom">
				<h1>Página não encontrada</h1>
				<p>Verifique se o endereço informado na URL não está errado, ou tente fazer uma busca pela página desejada.</p>
				<div class="row">
					<form role="search" method="get" class="form-search _section-site" action="<?php echo get_home_url(); ?>">
						<div class="input-group -full" aria-describedby="searchInfo">
							<span class="sr-text" id="searchInfo">Aqui você pode buscar as informações do site.</span>
							<input type="search" name="s" placeholder="O que você procura?" class="form-control icon-search" value="<?php get_search_query(); ?>" >
							<div class="input-group-addon">
								<button type="submit" class="input-group-button icon-search" title="Buscar"></button>
							</div>
						</div>
					</form>
				</div>
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

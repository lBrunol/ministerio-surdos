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
					<form action="javascript:void(0);" class="form-search _section-site">
						<div class="input-group -full" aria-describedby="searchInfo">
							<span class="sr-text" id="searchInfo">Aqui você pode buscar as informações do site.</span>
							<input type="text" placeholder="O que você procura?" class="form-control icon-search" />
							<div class="addon">
								<button class="button icon-search" title="Buscar"></button>
							</div>
						</div>
					</form>
					<div class="_section-site">
						<h2><span class="icon-article"></span> Mais lidos</h2>
						<ul class="list-events -bordergray -article">
							<li class="item">
								<a href="#" class="link">O mundo dos Surdos</a>
								<p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							</li>
							<li class="item">
								<a href="#" class="link">Semana do surdo - Crispiniano Soares</a>
								<p class="text">Quam iure vel sed, eum saepe nam excepturi tenetur nobis...</p>
							</li>
							<li class="item">
								<a href="#" class="link">Dia do Surdo</a>
								<p class="text">Distinctio aperiam eveniet, modi laborum animi a, officiis..</p>
							</li>
						</ul>
					</div>
					<div class="_section-site">
						<h2><span class="icon-calendar"></span> Próximos eventos</h2>
						<ul class="list-events -border">
							<li class="item">
								<span class="date">11/02/2017 - 17h</span>
								<a href="#" class="link"><span class="icon icon-angle-right"></span> Encontro de casais</a>
							</li>
							<li class="item">
								<span class="date">25/02/2017 - 14h</span>
								<a href="#" class="link"><span class="icon icon-angle-right"></span> Reunião mensal</a>
							</li>
							<li class="item">
								<span class="date">26/02/2017 - 18h30</span>
								<a href="#" class="link"><span class="icon icon-angle-right"></span> Comemoração dos aniversariantes do mês</a>
							</li>
						</ul>
					</div>
					<div class="_section-site">
						<h2><span class="icon-facebook-squared"></span> Nossa página</h2>
					</div>
				</aside>
			</div>
		</div>
	<?php endwhile; ?>		
<?php
get_footer();

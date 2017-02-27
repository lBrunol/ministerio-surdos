<?php
/**
 * Header do site
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ebenezer
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="jump-to">
	<a href="#maincontent" class="link">Ir até o conteúdo principal</a>
	<a href="#mainnav" class="link">Ir até o menu principal</a>
	<a href="#footer" class="link">Ir até o rodapé</a>
</div>
<div class="wrapper-site">
	<header class="header-site">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-xs-6">
					<a href="#" class="logo-site"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Ministério Ebenézer" class="_img-responsive"></a>
				</div>
				<div class="col-xs-6 __invisible-lg _text-right">
					<div class="navbar-control">
						<p class="text">Menu</p>
						<button type="button" class="navbar-toggle" aria-expanded="false" aria-label="Mostrar menu">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>
				<div class="col-md-10">
					<span class="sr-text">Menu Principal</span>
					<nav class="container-nav" id="mainnav" tabindex="-1">
						<ul class="nav-site">
							<li class="item"><a href="#" class="link">Sobre nós</a></li>
							<li class="item"><a href="#" class="link">Cursos e serviços</a></li>
							<li class="item"><a href="#" class="link">Programação</a></li>
							<li class="item"><a href="#" class="link">Vídeos</a></li>
							<li class="item"><a href="#" class="link">Artigos</a></li>
							<li class="item"><a href="#" class="link">Eventos</a></li>
							<li class="item"><a href="#" class="link">Nossa localização</a></li>
							<li class="item"><a href="#" class="link">Fale Conosco</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>

<?php
/**
 * Header do site
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ebenezer
 */

?>
<?php
	global $wp;
	$main_menu_items = wp_get_nav_menu_items( wp_get_nav_menu_object( 'principal' ) );
	$current_url = home_url( add_query_arg( array(), $wp -> request ) ) . '/';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<!--<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=1579593055401422";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>-->
<div class="jump-to">
	<a href="#maincontent" class="jump-to-link">Ir até o conteúdo principal</a>
	<a href="#mainnav" class="jump-to-link">Ir até o menu principal</a>
	<a href="#footer" class="jump-to-link">Ir até o rodapé</a>
</div>
<div class="wrapper-site">
	<header class="header-site">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-xs-6">
					<a href="/" class="logo-site"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Ministério Ebenézer" class="_img-responsive"></a>
				</div>
				<div class="col-xs-6 __invisible-lg _text-right">
					<div class="navbar-control">
						<p class="navbar-control-text">Menu</p>
						<button type="button" class="navbar-toggle" aria-expanded="false" aria-label="Mostrar menu">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>
				<?php if( $main_menu_items ) : ?>
				<div class="col-lg-10">
					<ul class="accessibility-list -home">
						<li class="accessibility-list-item">
							<button class="accessibility-list-button js-high-contrast" type="button" aria-hidden="true" title="Ativar/Desativar alto">
								<span class="accessibility-list-text">Alto contraste</span>
								<span class="sr-text">Ativar/Desativar alto contraste</span>
								<span class="accessibility-list-icon icon-adjust"></span>
							</button>
						</li>
					</ul>
					<span class="sr-text">Menu Principal</span>
					<nav class="container-nav" id="mainnav" tabindex="-1">
						<ul class="nav-site">
							<?php foreach( $main_menu_items as $item ) : ?>
								<?php if( (int) $item -> menu_item_parent === 0 ) : ?>
									<li class="nav-site-item">
										<a href="<?php echo $item -> url; ?>" class="nav-site-link<?php if( strpos( $current_url, $item -> url  ) !== false ) echo ' -active'; ?>" <?php if( $item -> target === '_blank' ) echo 'target="_blank"'; ?>><?php echo $item -> title; ?></a>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</nav>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</header>

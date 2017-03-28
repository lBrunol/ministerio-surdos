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
				<div class="_section-site">
					<h1><span class="icon-user"></span> Quem somos</h1>
					<img src="<?php echo get_template_directory_uri(); ?>/images/quem-somos.jpg" alt="Quem somos" class="_center-block _img-responsive" />
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam facilisis augue et vehicula hendrerit. Praesent volutpat, felis ac tincidunt cursus, diam quam tristique arcu, eget consequat dui orci et turpis.</p>
					<p>Vestibulum ultrices consectetur nisi placerat bibendum. Vivamus eget ipsum a ante eleifend blandit et eget mauris.</p>
					<p class="_btn-margin"><a href="#" class="btn-default">Saiba mais sobre nós</a>
				</div>
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
				<div>
					<h2><span class="icon-calendar"></span> Próximos eventos</h2>
					<ul class="list-events -border">
						<li class="item">
							<span class="date">11/02/2017 - 17h</span>
							<a href="#" class="link"><span class="icon icon-angle-right"> Encontro de casais</a>
						</li>
						<li class="item">
							<span class="date">25/02/2017 - 14h</span>
							<a href="#" class="link"><span class="icon icon-angle-right"> Reunião mensal</a>
						</li>
						<li class="item">
							<span class="date">26/02/2017 - 18h30</span>
							<a href="#" class="link"><span class="icon icon-angle-right"> Comemoração dos aniversariantes do mês</a>
						</li>
					</ul>
				</div>
			</aside>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h1><span class="icon-cog"></span> Cursos e Serviços</h1>
				<div class="row">
					<div class="col-md-4">
						<div class="info-icon">
							<span class="icon icon-sign-language"></span>
							<h2 class="title">Curso de Libras Grátis</h2>
							<p class="text">Nós oferecemos cursos de libras grátis para a comunidade. Você pode aprender do básico ao avançado, <a href="#">clique aqui</a> e saiba como participar.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info-icon">
							<span class="icon icon-address-card"></span>
							<h2 class="title">Indicação de deficientes auditivos para o mercado de trabalho</h2>
							<p class="text">Caso sua empresa possua vagas para deficientes auditivos, entre em <a href="#">contato conosco</a>.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info-icon">
							<span class="icon icon-interpretation"></span>
							<h2 class="title">Interpretação de Libras/Português</h2>
							<p class="text">Se você necessita de interpretação de português para libras em eventos, palestras e reuniões <a href="#">clique aqui</a> e saiba como contratar.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<div class="_section-site">
					<h1><span class="icon-newspaper"></span> Artigos</h1>
					<div class="row">
						<div class="col-md-6">
							<article class="post-summary">
								<div class="date"><span class="icon-calendar-empty"><span> <time datetime="2017/02/04">04/02/2017</time></div>
								<h2 class="title">O mundo dos Surdos</h2>
								<ul class="list-categories">
									<li class="item">Cultura</li>
									<li class="item">Aprendizagem</li>
									<li class="item">Arte</li>
								</ul>
								<p class="text">Um grupo de alunas do curso de Educomunicação da Escola de Comunicações e Artes da Universidade de São Paulo (ECA-USP) produziu em 2014 o vídeo “O mundo dos surdos: nosso breve mergulho”.</p>
								<a href="#" class="link">Continue Lendo...</a>
							</article>
						</div>
						<div class="col-md-6">
							<article class="post-summary">
								<div class="date"><span class="icon-calendar-empty"><span> <time datetime="2017/02/02">02/02/2017</time></div>
								<h2 class="title">Semana do surdo - Crispiniano Soares</h2>
								<ul class="list-categories">
									<li class="item">Cultura</li>
									<li class="item">Eventos</li>
								</ul>
								<p class="text">A EPG Crispiniano Soares, uma escola polo para a surdez no município de Guarulhos (SP), realizará entre os dias 26 e 28 de setembro de 2016 a sua 9º Semana do Surdo...</p>
								<a href="#" class="link">Continue Lendo...</a>
							</article>
						</div>
					</div>
					<p class="_btn-margin _text-right"><a href="#" class="btn-default">Veja mais</a></p>
				</div>
			</div>
			<aside class="col-md-3">
				<div class="_section-site">
					<h2><span class="icon-facebook-squared"></span> Nossa página</h2>
				</div>
			</aside>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h1><span class="icon-video"></span> Vídeos</h1>
				<div class="row">
					<div class="col-md-7">
						<div class="video-site">
							<a href="#" class="link" data-videoid="Iqej4uP7ogI" aria-label="Reproduzir vídeo - Curso de Libras - Módulo Prático: Aula 1 - Saudações e Apresentações">
								<img src="<?php echo get_template_directory_uri(); ?>/images/curso-libras-modulo-3.jpg" alt="" class="image _img-responsive" />
								<span class="icon icon-play-circled2" aria-hidden="true"></span>
							</a>
							<div class="embed-responsive embed">
							</div>							
							<div class="label">
								<div class="description">
									<h2 class="title"><a href="#" class="link js-link">Curso de Libras - Módulo Prático: Aula 1 - Saudações e Apresentações</a></h2>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="list-videos">
							<div class="video-item">
								<a href="#" class="link">
									<img src="<?php echo get_template_directory_uri(); ?>/images/curso-libras-iniciante.jpg" alt="Curso de Libras Iniciantes - Alfabeto Manual e Números - Aula 1 - Prof. Luiz Albérico Falcão" />
								</a>
								<div class="content">
									<h2 class="title"><a href="#" class="link">Curso de Libras Iniciantes - Alfabeto Manual e Números - Aula 1 - Prof. Luiz Albérico Falcão</a></h2>
									<div class="date"><span class="icon-calendar-empty"><span> <time datetime="2017/02/02">02/02/2017</time></div>
								</div>
							</div>
							<div class="video-item">
								<a href="#" class="link">
									<img src="<?php echo get_template_directory_uri(); ?>/images/aprenda-libras.jpg" alt="Aprenda LIBRAS com eficiência e rapidez (vocabulários básicos) " />
								</a>
								<div class="content">
									<h2 class="title"><a href="#" class="link">Aprenda LIBRAS com eficiência e rapidez (vocabulários básicos)</a></h2>
									<div class="date"><span class="icon-calendar-empty"><span> <time datetime="2017/01/29">29/01/2017</time></div>
								</div>
							</div>
							<div class="video-item">
								<a href="#" class="link">
									<img src="<?php echo get_template_directory_uri(); ?>/images/curso-libras.jpg" alt="Curso de Libras - Módulo Prático: Aula 2 - Família - HD" />
								</a>
								<div class="content">
									<h2 class="title"><a href="#" class="link">Curso de Libras - Módulo Prático: Aula 2 - Família - HD</a></h2>
									<div class="date"><span class="icon-calendar-empty"><span> <time datetime="2017/01/26">26/01/2017</time></div>
								</div>
							</div>
							<a href="#" class="more">Veja mais vídeos</a>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>

<?php
get_footer();

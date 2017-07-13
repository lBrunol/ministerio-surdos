<?php
/**
 * Rodapé do site
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ebenezer
 */

?>
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
		<footer class="footer-site" id="footer" tab-index="-1">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<p class="phrase">Se a educação sozinha não transforma a sociedade, sem<br> ela tampouco a sociedade muda.</p>
					</div>
					<div class="col-md-5">
						<!--<p class="facebook"><a href="#" target="_blank"><span class="icon-facebook-official"></span> Acesse nossa página no Facebook</a></p>-->
						<p class="location"><span class="icon-location"></span> <strong>R. Canutama, 326 - Vila Barros, Guarulhos - SP</strong></p>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</div>	
</body>
</html>
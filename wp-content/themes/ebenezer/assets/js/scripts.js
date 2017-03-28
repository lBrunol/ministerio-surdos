var _SCREENLG = 1200;
var _SCREENMD = 992;
var _SCREENSM = 768;
var _SCREENVS = 520;

var Menu = function(){

    var self = this;
	self.$navbarToggle = $('.navbar-toggle');
    self.$wrapperSite = $('.wrapper-site');
	self.$navSite = $('.nav-site');
	self.$menuFixIe = $('.js-ie .nav-site');
	self.classActive = 'js-active-menu';
	self.classActiveNavSite = 'js-active';
	self.classFixOverflow = '_overflow-hidden';
	self.classNoOpacity = '_no-opacity';

	self.init = function(){

		if(!!self.$navbarToggle){
			self.$navbarToggle.on('click', function(){
				self.$wrapperSite.toggleClass(self.classActive);

				if(!self.$wrapperSite.hasClass(self.classActive)){
					setTimeout(function(){
						$('body').removeClass(self.classFixOverflow);
						self.$navSite.removeClass(self.classActiveNavSite);
						self.$navbarToggle.attr('aria-label','Mostrar menu');
						self.$menuFixIe.addClass(self.classNoOpacity);
					}, 500);
				} else {			
					$('body').addClass(self.classFixOverflow);
					self.$navSite.addClass(self.classActiveNavSite);
					self.$navbarToggle.attr('aria-label','Fechar menu');
					self.$menuFixIe.removeClass(self.classNoOpacity);
				}
			});
		}

		/**
		* Adiciona uma classe no body caso o navegador seja o internet explorer
		*/
		if(!!isInternetExplorer()) {
			$('body').addClass('js-ie');
			self.$menuFixIe.addClass(self.classNoOpacity);
		}

		$('body').on('keyup', function(e){
			if(self.$wrapperSite.hasClass(self.classActive)){
				if(e.keyCode == 27){
					self.$navbarToggle.trigger('click');
				}
			}
		});

	}

	self.init();

	$(window).on('resize', function(){
		if(validaTela(_SCREENLG)) {
			$('body').removeClass(self.classFixOverflow);
			self.$wrapperSite.removeClass(self.classActive);
			self.$menuFixIe.removeClass(self.classNoOpacity);
		}
	});
}

var HomeBanner = function(){
	var self = this;

	self.$homeBanner = $('.home-banner');
	self.leftButton = '.js-left-banner';
	self.rightButton = '.js-right-banner';
	
	self.init = function(){
		self.$homeBanner.owlCarousel({
			loop: true,
			navigation: true,
			navigationText: ["<span class='sr-text'>Ir para o banner anterior</span><button class='js-left-banner' type='button'><i class='icon icon-angle-left'></i></button>", "<span class='sr-text'>Ir para o próximo banner</span><button type='button' class='js-right-banner'><i class='icon icon-angle-right'></i></button>"],
			pagination: true,
			responsive: true,
			singleItem: true,
			stopOnHover: true
		});
	}

	$('body').on('click', self.leftButton, function(e){
		e.stopPropagation();

		var owl = self.$homeBanner.data('owlCarousel');

		if(typeof owl !== typeof undefined){
			owl.prev();
		}
	});

	$('body').on('click', self.rightButton, function(e){
		e.stopPropagation();

		var owl = self.$homeBanner.data('owlCarousel');

		if(typeof owl !== typeof undefined){
			owl.next();
		}
	});

	//Habilita a navegação por teclado no banner da home
	$('body').on('keyup', function(e){

		var owl = self.$homeBanner.data('owlCarousel');

		if(typeof owl !== typeof undefined){
			if (e.keyCode == 37) {
            	owl.prev();
        	} else if (e.keyCode == 39) {
            	owl.next();
			}
		}
	});

	self.init();
}

var AccessibilityFeatures = function(){

	$('.js-font-default').on('click', function(){
		$('html').css('font-size', 16);
	});

	//Aumentar/Diminuir o tamanho da fonte
    $('.js-font-increase').on('click', function(){
        var currentSize = parseInt($('html').css('font-size'));

        if(currentSize != 32){
            currentSize += 2;
            $('html').css('font-size', currentSize);
        }
    });

    $('.js-font-decrease').on('click', function(){
        var currentSize = parseInt($('html').css('font-size'));

        if(currentSize != 10){
            currentSize -= 2;
            $('html').css('font-size', currentSize);
        }
    });

    //Escala cinza na página
    $('.js-high-contrast').on('click', function(){
        $('body').toggleClass('-grayscale');
    });
}

$(function(){
	var menu = new Menu();
	var homeBanner = new HomeBanner();
	var accessibilityFeatures = new AccessibilityFeatures();
});

/*
* Adiciona uma classe ao elemento html, indicando se o dispositvo é touch-screen.
 */
(function checkTouch() {
    if ("ontouchstart" in document.documentElement || (window.DocumentTouch && document instanceof DocumentTouch)) {
        document.documentElement.className += ' touch';
        isTouch = true;
    } else {
        document.documentElement.className += ' no-touch';
        isTouch = false;
    }
})();

/**
* Verifica se o navegador é o internet explorer. A função não retornará false caso o navegador seja o EDGE.
* @return number|boolean retorna o número da vesão caso seja internet explorer e false caso seja outro navegador
*/
function isInternetExplorer(){var match = navigator.userAgent.match(/(?:MSIE |Trident\/.*; rv:)(\d+)/);return match ? parseInt(match[1]) : false;}

/**
* Verifica a largura da tela
* @param int valor inteiro que será comparado a largura do objeto window na função.
* @return boolean retorna true caso o parâmetro seja menor que a largura da tela e false caso contrário.
*/
function validaTela(largura) {return jQuery(window).width() >= largura;}
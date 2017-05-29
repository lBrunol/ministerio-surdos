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
			autoPlay: 4000,
			loop: true,
			navigation: true,
			navigationText: ["<span class='sr-text'>Ir para o banner anterior</span><button class='js-left-banner' type='button'><i class='icon icon-angle-left'></i></button>", "<span class='sr-text'>Ir para o próximo banner</span><button type='button' class='js-right-banner'><i class='icon icon-angle-right'></i></button>"],
			pagination: true,
			responsive: true,
			singleItem: true,
			stopOnHover: true
		});
	}

	$(self.leftButton).on('click', function(e){
		e.stopPropagation();

		var owl = self.$homeBanner.data('owlCarousel');

		if(typeof owl !== "undefined"){
			owl.prev();
		}
	});

	$(self.rightButton).on('click', function(e){
		e.stopPropagation();

		var owl = self.$homeBanner.data('owlCarousel');

		if(typeof owl !== "undefined"){
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
		if(localStorage.getItem('highContrast')){
			localStorage.removeItem('highContrast');
		} else {
			localStorage.setItem('highContrast', true);			
		}
    });
}

$(function(){
	var menu = new Menu();
	var homeBanner = new HomeBanner();
	var accessibilityFeatures = new AccessibilityFeatures();

	if(localStorage.getItem('highContrast')){
		$('body').addClass('-grayscale');
	} else {
		$('body').removeClass('-grayscale');
	}
	
	// Formulários
    $('.wpcf7-form').on('DOMNodeInserted', function (e) {
        if ($(e.target).hasClass('wpcf7-not-valid-tip')) {
            $(e.target).addClass('message-site -error');
            $(e.target).parent().parent().addClass('-error');
        }

        if ($(e.target).hasClass('wpcf7-mail-sent-ok'))
            $('.wpcf7-form .message').html('<div class="info-box -base">' + $(e.target).text() + '</div>');

        if ($(e.target).hasClass('wpcf7-validation-errors'))
            $('.wpcf7-form .message').remove();
    });


    $('.wpcf7-submit').on('click', function () {
		$('.wpcf7-form .ajax-loader').addClass('_animation-fade');
        $('.wpcf7-form .alert').remove();
        $('.wpcf7-form .form-group').removeClass('has-error');
    });

	$('.gallery-item').on('click', function(e){
		e.preventDefault();
		e.stopPropagation();
		$(this).siblings().removeClass('js-active');
		$(this).addClass('js-active');
		if(!$('body').hasClass('floater-open'))
			openFloater();
		$('body').addClass('floater-gallery-open');
		loadFloaterImage($(this));
		showControls($(this));
	});

	$('.floater-gallery .js-left-gallery').on('click', function(){
		var $items = $('.gallery .gallery-item');
		var itemsLength = $items.length;
		var pos;

		$items.each(function(index, el){
			if($(this).hasClass('js-active'))
				pos = index;
		});

		if(pos !== undefined && !isNaN(pos)){
			showControls($($items[pos - 1]));
			$($items[pos - 1]).trigger('click');
		}
	});

	$('.floater-gallery .js-right-gallery').on('click', function(){
		var $items = $('.gallery .gallery-item');
		var itemsLength = $items.length;
		var pos;

		$items.each(function(index, el){
			if($(this).hasClass('js-active'))
				pos = index;
		});

		if(pos !== undefined && !isNaN(pos)){
			showControls($($items[pos + 1]));
			$($items[pos + 1]).trigger('click');
		}
	});

	var showControls = function($el){

		var $items = $el.parent().find('.gallery-item');
		var itemsLength = $items.length;
		var pos = 0;

		$items.each(function(index, el){
			if($(this).hasClass('js-active'))
				pos = index;
		});

		$('.floater-gallery .js-left-gallery, .floater-gallery .js-right-gallery').removeClass('js-hidden');
		
		if(itemsLength > 1){
			if(pos === 0){
				$('.floater-gallery .js-left-gallery').addClass('js-hidden');
			}
			if(pos === itemsLength - 1){
				$('.floater-gallery .js-right-gallery').addClass('js-hidden');
			}
		} else {
			$('.floater-gallery .js-left-gallery, .floater-gallery .js-right-gallery').addClass('js-hidden');
		}
	}

	$('.floater-site .floater-site-dialog').on('click', function(e){
		e.stopPropagation();
	});

	$('.floater-site.-gallery').on('floater.hide', function(){
		$('body').removeClass('floater-gallery-open');
		$('.floater-gallery .floater-gallery-image.-loader').removeClass('js-hidden');
		$('.floater-gallery .floater-gallery-image.-photo').attr('src','javascript:;').addClass('js-hidden');
		$('.gallery .gallery-item').removeClass('js-active');
		$('.floater-gallery .js-left-gallery, .floater-gallery .js-right-gallery').removeClass('js-hidden');
	});

	$('.floater-site .close').on('click', function(e){
		e.preventDefault();
		closeFloater($(this));
	});

	var openFloater = function(){
		$('.floater-background, .floater-site').addClass('js-active');
		$('body').addClass('floater-open');
	}

	$('body').on('click', function(){
		if($(this).hasClass('floater-open'))
			closeFloater('.floater-site');
	})
	.on('keyup', function(e){
		if($(this).hasClass('floater-open') && e.keyCode == 27)
			closeFloater('.floater-site');
		if($(this).hasClass('floater-gallery-open') && e.keyCode == 37)
			$('.floater-gallery .js-left-gallery').trigger('click');
		if($(this).hasClass('floater-gallery-open') && e.keyCode == 39)
			$('.floater-gallery .js-right-gallery').trigger('click');

	});

	var closeFloater = function(instance){
		var $floater = "";

		if(typeof instance === 'undefinded'){
			return false;
		}else if(typeof instance === 'string'){
			$floater = $(instance);
		} else if(typeof instance === 'object'){
			$floater = $(instance).closest('.floater-site');
		}

		if($floater instanceof jQuery){
			$floater.trigger('floater.hidden');
			$floater.removeClass('js-active');
			setTimeout(function(){
				$('.floater-background').removeClass('js-active');
				$('body').removeClass('floater-open');
				$floater.trigger('floater.hide');
			}, 300);
		} else {
			return false;
		}
	}

	var loadFloaterImage = function($el){
		if($el !== undefined){
			var $image = $el.find('img');
			var src = $image.attr('src');
			var ext = src.split('.').pop();
			srcLargeImage = '';

			$('.floater-gallery .floater-gallery-image.-loader').removeClass('js-hidden');
			$('.floater-gallery .floater-gallery-image.-photo').addClass('js-hidden');
			
			if(ext.length == 3)
				srcLargeImage = src.substring(0, src.length - 12);
			else if(ext.length == 4)
				srcLargeImage = src.substring(0, src.length - 13);

			if(!!srcLargeImage)
				srcLargeImage = srcLargeImage + '.' + ext;
			else
				srcLargeImage = src;

			getAsyncImage(srcLargeImage).then(function(src){
				$('.floater-gallery .floater-gallery-image.-loader').addClass('js-hidden');
				$('.floater-gallery .floater-gallery-image.-photo').attr('src', src).removeClass('js-hidden');
			}).catch(function(){
				$('.floater-gallery .floater-gallery-message').removeClass('js-hidden');
				$('.floater-gallery .floater-gallery-image.-loader').addClass('js-hidden');
			});
		}
	}

});

function getAsyncImage(url, beforeStart){
	return new Promise(function(resolve, reject){
		var image = new Image();

		if(beforeStart !== undefined)
			beforeStart();

		image.onload = function(){
			resolve(url);
		};

		image.onerror = function(){
			reject(url);
		};
		
		image.src = url;

	});
}

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
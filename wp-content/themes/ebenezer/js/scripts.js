function getAsyncImage(e,a){return new Promise(function(t,s){var l=new Image;void 0!==a&&a(),l.onload=function(){t(e)},l.onerror=function(){s(e)},l.src=e})}function isInternetExplorer(){var e=navigator.userAgent.match(/(?:MSIE |Trident\/.*; rv:)(\d+)/);return!!e&&parseInt(e[1])}function validaTela(e){return jQuery(window).width()>=e}var _SCREENLG=1200,_SCREENMD=992,_SCREENSM=768,_SCREENVS=520,Menu=function(){var e=this;e.$navbarToggle=$(".navbar-toggle"),e.$wrapperSite=$(".wrapper-site"),e.$navSite=$(".nav-site"),e.$menuFixIe=$(".js-ie .nav-site"),e.classActive="js-active-menu",e.classActiveNavSite="js-active",e.classFixOverflow="_overflow-hidden",e.classNoOpacity="_no-opacity",e.init=function(){e.$navbarToggle&&e.$navbarToggle.on("click",function(){e.$wrapperSite.toggleClass(e.classActive),e.$wrapperSite.hasClass(e.classActive)?($("body").addClass(e.classFixOverflow),e.$navSite.addClass(e.classActiveNavSite),e.$navbarToggle.attr("aria-label","Fechar menu"),e.$menuFixIe.removeClass(e.classNoOpacity)):setTimeout(function(){$("body").removeClass(e.classFixOverflow),e.$navSite.removeClass(e.classActiveNavSite),e.$navbarToggle.attr("aria-label","Mostrar menu"),e.$menuFixIe.addClass(e.classNoOpacity)},500)}),isInternetExplorer()&&($("body").addClass("js-ie"),e.$menuFixIe.addClass(e.classNoOpacity)),$("body").on("keyup",function(a){e.$wrapperSite.hasClass(e.classActive)&&27==a.keyCode&&e.$navbarToggle.trigger("click")})},e.init(),$(window).on("resize",function(){validaTela(_SCREENLG)&&($("body").removeClass(e.classFixOverflow),e.$wrapperSite.removeClass(e.classActive),e.$menuFixIe.removeClass(e.classNoOpacity))})},HomeBanner=function(){var e=this;e.$homeBanner=$(".home-banner"),e.leftButton=".js-left-banner",e.rightButton=".js-right-banner",e.init=function(){e.$homeBanner.owlCarousel({autoPlay:4e3,loop:!0,navigation:!0,navigationText:["<span class='sr-text'>Ir para o banner anterior</span><button class='js-left-banner' type='button'><i class='icon icon-angle-left'></i></button>","<span class='sr-text'>Ir para o próximo banner</span><button type='button' class='js-right-banner'><i class='icon icon-angle-right'></i></button>"],pagination:!0,responsive:!0,singleItem:!0,stopOnHover:!0})},$(e.leftButton).on("click",function(a){a.stopPropagation();var t=e.$homeBanner.data("owlCarousel");"undefined"!=typeof t&&t.prev()}),$(e.rightButton).on("click",function(a){a.stopPropagation();var t=e.$homeBanner.data("owlCarousel");"undefined"!=typeof t&&t.next()}),$("body").on("keyup",function(a){var t=e.$homeBanner.data("owlCarousel");"undefined"!=typeof t&&(37==a.keyCode?t.prev():39==a.keyCode&&t.next())}),e.init()},AccessibilityFeatures=function(){$(".js-font-default").on("click",function(){$("html").css("font-size",16)}),$(".js-font-increase").on("click",function(){var e=parseInt($("html").css("font-size"));32!=e&&(e+=2,$("html").css("font-size",e))}),$(".js-font-decrease").on("click",function(){var e=parseInt($("html").css("font-size"));10!=e&&(e-=2,$("html").css("font-size",e))}),$(".js-high-contrast").on("click",function(){$("body").toggleClass("-grayscale"),localStorage.getItem("highContrast")?localStorage.removeItem("highContrast"):localStorage.setItem("highContrast",!0)})};$(function(){new Menu,new HomeBanner,new AccessibilityFeatures;localStorage.getItem("highContrast")?$("body").addClass("-grayscale"):$("body").removeClass("-grayscale"),$(".wpcf7-form").on("DOMNodeInserted",function(e){$(e.target).hasClass("wpcf7-not-valid-tip")&&($(e.target).addClass("message-site -error"),$(e.target).parent().parent().addClass("-error")),$(e.target).hasClass("wpcf7-mail-sent-ok")&&$(".wpcf7-form .message").html('<div class="info-box -base">'+$(e.target).text()+"</div>"),$(e.target).hasClass("wpcf7-validation-errors")&&$(".wpcf7-form .message").remove()}),$(".wpcf7-submit").on("click",function(){$(".wpcf7-form .ajax-loader").addClass("_animation-fade"),$(".wpcf7-form .alert").remove(),$(".wpcf7-form .form-group").removeClass("has-error")}),$(".gallery-item").on("click",function(t){t.preventDefault(),t.stopPropagation(),$(this).siblings().removeClass("js-active"),$(this).addClass("js-active"),$("body").hasClass("floater-open")||a(),$("body").addClass("floater-gallery-open"),s($(this)),e($(this))}),$(".floater-gallery .js-left-gallery").on("click",function(){var a,t=$(".gallery .gallery-item");t.length;t.each(function(e,t){$(this).hasClass("js-active")&&(a=e)}),void 0===a||isNaN(a)||(e($(t[a-1])),$(t[a-1]).trigger("click"))}),$(".floater-gallery .js-right-gallery").on("click",function(){var a,t=$(".gallery .gallery-item");t.length;t.each(function(e,t){$(this).hasClass("js-active")&&(a=e)}),void 0===a||isNaN(a)||(e($(t[a+1])),$(t[a+1]).trigger("click"))});var e=function(e){var a=e.parent().find(".gallery-item"),t=a.length,s=0;a.each(function(e,a){$(this).hasClass("js-active")&&(s=e)}),$(".floater-gallery .js-left-gallery, .floater-gallery .js-right-gallery").removeClass("js-hidden"),t>1?(0===s&&$(".floater-gallery .js-left-gallery").addClass("js-hidden"),s===t-1&&$(".floater-gallery .js-right-gallery").addClass("js-hidden")):$(".floater-gallery .js-left-gallery, .floater-gallery .js-right-gallery").addClass("js-hidden")};$(".floater-site .floater-site-dialog").on("click",function(e){e.stopPropagation()}),$(".floater-site.-gallery").on("floater.hide",function(){$("body").removeClass("floater-gallery-open"),$(".floater-gallery .floater-gallery-image.-loader").removeClass("js-hidden"),$(".floater-gallery .floater-gallery-image.-photo").attr("src","javascript:;").addClass("js-hidden"),$(".gallery .gallery-item").removeClass("js-active"),$(".floater-gallery .js-left-gallery, .floater-gallery .js-right-gallery").removeClass("js-hidden")}),$(".floater-site .close").on("click",function(e){e.preventDefault(),t($(this))});var a=function(){$(".floater-background, .floater-site").addClass("js-active"),$("body").addClass("floater-open")};$("body").on("click",function(){$(this).hasClass("floater-open")&&t(".floater-site")}).on("keyup",function(e){$(this).hasClass("floater-open")&&27==e.keyCode&&t(".floater-site"),$(this).hasClass("floater-gallery-open")&&37==e.keyCode&&$(".floater-gallery .js-left-gallery").trigger("click"),$(this).hasClass("floater-gallery-open")&&39==e.keyCode&&$(".floater-gallery .js-right-gallery").trigger("click")});var t=function(e){var a="";return"undefinded"!=typeof e&&("string"==typeof e?a=$(e):"object"==typeof e&&(a=$(e).closest(".floater-site")),a instanceof jQuery&&(a.trigger("floater.hidden"),a.removeClass("js-active"),setTimeout(function(){$(".floater-background").removeClass("js-active"),$("body").removeClass("floater-open"),a.trigger("floater.hide")},300),void 0))},s=function(e){if(void 0!==e){var a=e.find("img"),t=a.attr("src"),s=t.split(".").pop();srcLargeImage="",$(".floater-gallery .floater-gallery-image.-loader").removeClass("js-hidden"),$(".floater-gallery .floater-gallery-image.-photo").addClass("js-hidden"),3==s.length?srcLargeImage=t.substring(0,t.length-12):4==s.length&&(srcLargeImage=t.substring(0,t.length-13)),srcLargeImage?srcLargeImage=srcLargeImage+"."+s:srcLargeImage=t,getAsyncImage(srcLargeImage).then(function(e){$(".floater-gallery .floater-gallery-image.-loader").addClass("js-hidden"),$(".floater-gallery .floater-gallery-image.-photo").attr("src",e).removeClass("js-hidden")}).catch(function(){$(".floater-gallery .floater-gallery-message").removeClass("js-hidden"),$(".floater-gallery .floater-gallery-image.-loader").addClass("js-hidden")})}}}),function(){"ontouchstart"in document.documentElement||window.DocumentTouch&&document instanceof DocumentTouch?(document.documentElement.className+=" touch",isTouch=!0):(document.documentElement.className+=" no-touch",isTouch=!1)}();
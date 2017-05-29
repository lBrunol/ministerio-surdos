$(function() {
    function e(e) {
        new YT.Player(e, {
            events: {
                onReady: s
            }
        })
    }
    function s(e) {
        console.log(typeof YT), e.target.playVideo()
    }

    $(".video-site .js-link").on("click", function(e, s) {
        e.preventDefault();
        var n = void 0 === s ? $(this) : s,
            o = n.data("videoid"),
            t = document.createElement("script"),
            i = document.getElementsByTagName("script")[0];

        t.async = !0, t.src = "https://www.youtube.com/iframe_api", i.parentNode.insertBefore(t, i), n.append('<div class="site-preloader -youtube"></div>'), n.closest(".video-site").find(".embed-responsive").append('<iframe id="' + o + '" class="embed-responsive-media video" src="https://www.youtube.com/embed/' + o + '?version=3&enablejsapi=1&rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>');

        var a = setInterval(function() {
            "undefined" != typeof YT && "object" == typeof YT && 1 === YT.loaded && (console.log(YT), n.trigger("loadedYT", [o, n]), clearInterval(a))
        }, 50);

    }), $(".video-site .js-link").on("loadedYT", function(s, n, o) {
        var t = void 0 === o ? $(this) : o;
        e(n), t.find(".icon").addClass("js-active"), t.closest(".video-site").find(".video-site-label").addClass("js-hidden"), t.closest(".video-site").find(".site-preloader.-youtube").remove(), setTimeout(function() {
            t.addClass("js-hidden"), t.closest(".video-site").find(".embed").addClass("js-visible")
        }, 500)
    }), $(".video-site .video-site-label .js-link").on("click", function(e) {
        e.preventDefault();
        var s = $(this).closest(".video-site").find(".js-link");
        s.hasClass("js-hidden") || $(".video-site .js-link").trigger("click", [s])
    })
});
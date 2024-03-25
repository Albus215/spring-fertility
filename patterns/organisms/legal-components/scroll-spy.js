export default class ScrollSpy {
    constructor() {
        const sSpyMenu = $('[data-sspy-menu]');
        if (sSpyMenu.length) {
            let lastId,
                topMenu = $(".header-nav"),
                topMenuHeight = 110,
                // All list items
                menuItems = sSpyMenu.find("a"),
                menuItemActive = "active",
                // Anchors corresponding to menu items
                scrollItems = menuItems.map(function () {
                    var item = $('[data-section-uid="' + $(this).attr("href") + '"]');
                    if (item.length) {
                        return item;
                    }
                });

            // Bind click handler to menu items
            // so we can get a fancy scroll animation
            // -- Smooth scroll

            $('a[href*="#section-"]').on('click', function (event) {
                event.preventDefault();
                // if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $('[data-section-uid="' + $(this).attr("href") + '"]');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - topMenuHeight + 10
                    }, 1000);
                    // return false;
                }
                // }
            });

            // Bind to scroll
            $(window).scroll(function () {
                // Get container scroll position
                let fromTop = $(this).scrollTop() + topMenuHeight;

                // Get id of current scroll item
                let cur = scrollItems.map(function () {
                    if ($(this).offset().top < fromTop)
                        return this;
                });
                // Get the id of the current element
                cur = cur[cur.length - 1];
                let id = cur && cur.length ? cur.attr('data-section-uid') : "";

                if (lastId !== id) {
                    lastId = id;
                    // Set/remove active class
                    menuItems
                        .parent().removeClass(menuItemActive)
                        .end().filter("[href='" + id + "']").parent().addClass(menuItemActive);
                    window.location.hash = id;
                }
            });

            $(window).load(function () {
                if (window.location.hash !== '' && window.location.hash !== '#') {
                    var target = $('[data-section-uid="' + window.location.hash + '"]');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - topMenuHeight + 10
                        }, 1000);
                    }
                }
            });

            console.dir ($(window).width());

            if ($(window).width() >= 992) {
                var $window = $(window);
                var $sidebar = $("[data-sspy-menu]");
                var $sidebarHeight = $sidebar.innerHeight();
                var $footerOffsetTop = $("footer").offset().top;
                var $sidebarOffset = $sidebar.offset();

                $window.scroll(function () {
                    if ($window.scrollTop() >= $sidebarOffset.top - topMenuHeight) {
                        $sidebar.addClass("fixed");
                    } else {
                        $sidebar.removeClass("fixed");
                    }
                });
            }
        }
    }
}

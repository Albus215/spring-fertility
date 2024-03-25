/**
 * Class to add JS associated with the Navbar
 */
export default class Navbar {
    /**
     * Creates a new instance of a Navbar object.
     *
     * @param {object} el - DOM Element
     */
    constructor(el) {
        this.el = el;
        this.$el = $(el);
        this.latestKnownScroll = 0;
        this.ticking = false;
        this.$search = this.$el.find('.navbar-search');
        this.$searchInput = this.$el.find('.navbar-search__input');
        this.$searchToggle = this.$el.find('[data-toggle-search]');
        this.$searchClose = this.$el.find('[data-navbar-search-close]');
        this.$openMobileMenu = this.$el.find('#mb-open-menu');
        this.$closeMobileMenu = $('.extramenu-close');
        this.currentScrollPosition = 0;
        this.events();
    }

    /**
     * Attaches the events associated with Navbar object
     */
    events() {
        if (this.$el.hasClass('home-navbar')) {
            $(window).on('scroll', this.onScroll.bind(this));
        } else {
            $(window).on('scroll', this.onScrollSimple.bind(this));
        }
        this.$searchToggle.click(this.onClick.bind(this));
        this.$searchClose.click(this.onClickClose.bind(this));
        this.$openMobileMenu.click(this.mobileMenuOpen.bind(this));
        this.$closeMobileMenu.click(this.mobileMenuClose.bind(this));
    }

    /**
     * Scroll event attaching to `window`
     */
    onScroll() {
        this.latestKnownScroll = window.pageYOffset;
        const currentScroll = this.latestKnownScroll;

        if (currentScroll > 40) {
            this.$el.addClass('white-nav').addClass('scrolled-nav').removeClass('home-navbar');
        } else {
            this.$el.removeClass('white-nav').removeClass('scrolled-nav').addClass('home-navbar');
        }
    }
    onScrollSimple() {
        this.latestKnownScroll = window.pageYOffset;
        const currentScroll = this.latestKnownScroll;

        if (currentScroll > 40) {
            this.$el.addClass('scrolled-nav');
        } else {
            this.$el.removeClass('scrolled-nav');
        }
    }

    /**
     * On Click Handler
     * @param {object} e - DOM Event
     */
    onClick(e) {
        e.preventDefault();
        this.$searchInput.focus();
        this.$el.addClass('navbar--search-opened');
    }

    /**
     * On Click Close Handler
     * @param {object} e - DOM Event
     */
    onClickClose() {
        this.$searchInput.val('');
        this.$el.removeClass('navbar--search-opened');
    }

    /**
     * Click mobile menu handler
     * @param {object} e - DOM Event
     */
    mobileMenuOpen() {
        this.currentScrollPosition = window.pageYOffset;
        window.scrollTo(0, 0);
        $(document.body).toggleClass('navbar--mobile-menu-open');
    }

    /**
     * Click mobile menu handler
     * @param {object} e - DOM Event
     */
    mobileMenuClose() {
        if (this.currentScrollPosition) {
            window.scrollTo(0, this.currentScrollPosition);
        }
        $(document.body).removeClass('navbar--mobile-menu-open');
    }

    /**
     * Ticks between available animation frames
     */
    requestTick() {
        if (!this.ticking) {
            requestAnimationFrame(this.update.bind(this));
        }
    }

    /**
     * Performs UI Updates based on scroll position
     */
    update() {

    }
}

/**
 * Function to show a second Menu to the window.
 *
 * @param {object} el - DOM element.
 */
export default class ShowExtraMenu {
    /**
     * Createa an instance of the ExtraMenu module
     *
     * @param {object} el - DOM Element
     */
    constructor(el) {
        // --
        // -- Search form appearence
        // --
        $('a[href*="#search-toggle"]').on('click', function () {
            event.preventDefault();
            $('.navbar-top-info__search').toggleClass('open');
            $('a[href*="#search-toggle"]').toggleClass('active');
        });

        this.$el = $(el);
        this.$exMenu = $('.nav-extramenu');
        this.events();
    }

    /**
     * Attach all events
     */
    events() {
        this.$el.on('click', (e) => {
            e.preventDefault();
            this.$exMenu.addClass('openExtraMenu');
        });
    }
}

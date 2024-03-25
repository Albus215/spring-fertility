/**
 * Handles the scrolling of the hero on click
 */
export default class HeroScroll {
  /**
   * Creates a new instance of HeroScroll
   *
   * @param {object} el - DOM Element
   */
  constructor( el ) {
    this.el = el;
    this.$el = $( el );
    this.$parentHero = this.$el.parents( '.o__hero-non-profit' );
    this.events();
  }

  /**
   * Binds events to the `el`
   */
  events() {
    this.$el.on( 'click', this.clickHandler.bind( this ) );
  }

  /**
   * Handles the clicking of the `el`
   */
  clickHandler() {
    $( 'html, body' ).animate(
      { scrollTop: this.$parentHero.height() + 600 },
      750,
      'swing'
    );
  }
}

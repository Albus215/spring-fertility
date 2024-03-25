import Flickity from 'flickity';

/**
 * Class that attaches to a Home Slider
 */
export default class HomeSlider {
  /**
   * Creates an instance of HomeSlider
   *
   * @param {object} el - DOM Element
   */
  constructor( el ) {
    this.el = el;
    this.$el = $( el );
    this.slider = new Flickity( this.el, {
      setGallerySize: false,
      wrapAround: true,
      pageDots: false
    });
  }
}

import Flickity from 'flickity';

/**
 * Class that attaches to a Testimonial Slider
 */
export default class TestimonialSlider {
  /**
   * Creates an instance of TestimonialSlider
   *
   * @param {object} el - DOM Element
   */
  constructor( el ) {
    this.el = el;
    this.$el = $( el );
    this.slider = new Flickity( this.el, {
      prevNextButtons: false
    });
  }
}

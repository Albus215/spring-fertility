import Swiper, { Navigation } from "swiper";

/**
 * Class that attaches to a Testimonial Slider
 */
export default class TestimonialSliderNew {
  /**
   * Creates an instance of TestimonialSlider
   */
  constructor() {
    let slider_items = $('[data-tstm-slider-new]');
    if (slider_items.length) {
      slider_items.each(function (idx, el) {
        let slider = $(el);
        console.log(slider.find('.swiper-button-next')[0])
        new Swiper(el, {
          modules: [Navigation],
          direction: 'horizontal',
          loop: false,
          slidesPerView: 1,
          navigation: {
            nextEl: slider.find('.swiper-button-next')[0],
            prevEl: slider.find('.swiper-button-prev')[0],
          },
        });
      });
    }
  }
}

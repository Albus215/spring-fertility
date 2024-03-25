/**
 * Function to attach the ExtraMenu behavior.
 *
 * @param {object} el - DOM element.
 */
export default class HideExtraMenu {
  /**
   * Createa an instance of the ExtraMenu module
   *
   * @param {object} el - DOM Element
   */
  constructor( el ) {
    this.$el = $( el );
    this.$HeroVideoModal = $( '.herovideo-modal' );
    this.events();
  }

  /**
   * Attach all events
   */
  events() {
    this.$el.on( 'click', () => {
      this.$HeroVideoModal.modal();
    });
  }
}

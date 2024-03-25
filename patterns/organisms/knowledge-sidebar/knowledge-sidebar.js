/**
 * Function to attach the KnowledgeSidebar behavior.
 *
 * @param {object} el - DOM element.
 */
export default class KnowledgeSidebar {
  /**
   * Createa an instance of the KnowledgeSidebar module
   *
   * @param {object} el - DOM Element
   */
  constructor( el ) {
    this.$el = $( el );
    this.onLoad();
  }

  /**
   * This will get the current pathname and hash
   * and find the corresponding topic/subtitle on
   * the sidebar to set them to active.
   */
  onLoad() {
    var thisUrl = window.location.pathname;

    thisUrl = thisUrl.split( '/' );
    var toplevelid = `#c${thisUrl[2]}`;
    var sublevelid = `#c${thisUrl[3]}`;
    var sublevelclass = `.h${thisUrl[3]}`;
    var sublevelactive = `#h${thisUrl[3]} > a`;
    
    $( toplevelid ).addClass( 'in' );
    $( sublevelid ).addClass( 'in' );
    $( sublevelclass ).addClass( 'sub_actv' );
    $( sublevelactive ).addClass( 'sub_actv' ).attr( 'aria-expanded', 'true' );

  }
}

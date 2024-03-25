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
    var hash = window.location.hash;

    thisUrl = thisUrl.split( '/' );
    var toplevelid = `#c${thisUrl[2]}`;
    var sublevelid = `#c${thisUrl[3]}`;

    $( sublevelid ).addClass( 'sub_actv' );

    $( toplevelid ).addClass( 'in' );
    $( sublevelid )
      .addClass( 'in' )
      .prev().addClass( 'sub_actv' )
      .children( 'span' ).removeClass( 'glyphicon-menu-right' ).addClass( 'glyphicon-menu-down' );

    $( hash ).addClass( 'sub_actv' );
  }
}

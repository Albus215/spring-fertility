const CountUp = require( 'countup.js' );
// require('jquery-waypoints');
// import 'waypoints';
// require( 'waypoints/lib/jquery.waypoints.min' );

/**
 * Class to add JS associated with the Metrics module in the HomePage
 */
export default class AnimateNumbers {
  /**
   * Creates a new instance of the metrics container.
   *
   * @param {object} el - DOM Element
   */
  constructor( el ) {
    this.el = el;
    this.$el = $( el );
    if ( !this.el.length ) {
      return;
    }
    this.$numbers = this.$el.find( '.m__metric-item-box-number.animation' );
    this.$topNumber = 0;
    this.$animatedNumber = '';
    this.events();

  }

  /**
  * Attach all events
  */
  events() {

    // $( this.el ).waypoint({
    //   handler: ( direction ) => {
    //     if ( direction === 'down' ) {
    //       this.animateNumbers();
    //     }
    //   },
    //   offset: '60%'
    // });
  }

  /**
   * On Click Handler
   * @param {object} e - DOM Event
   */
  animateNumbers() {
    $.each( this.$numbers, function launchAnimation( index, value ) {
      this.$topNumber = $( value ).attr( 'data-endnumber' );
      this.$animatedNumber = new CountUp( value, 0, this.$topNumber, 0, 4 );
      this.$animatedNumber.start();
    });
  }

}

/**
 * Class that handles sharing of current page in social networks
 */
export default class SocialButtons {
  /**
   * New instance of SocialButtons
   */
  constructor() {
    this.socialWindowRef = null;
    this.openWindow = this.openWindow.bind( this );
    this.init();
  }

  /**
   * Initializes behavior of Social Buttons
   */
  init() {
    const self = this;

    $( '[data-social-share-facebook]' ).click( ( e ) => {
      e.preventDefault();
      const url = self.buildFacebookURL();
      self.openWindow( url );
    });

    $( '[data-social-share-twitter]' ).click( ( e ) => {
      e.preventDefault();
      const url = self.buildTwitterURL();
      self.openWindow( url, { height: 253 });
    });

    $( '[data-social-share-google]' ).click( ( e ) => {
      e.preventDefault();
      const url = self.buildGoogleURL();
      self.openWindow( url, { height: 505, width: 515 });
    });

    $( '[data-social-share-email]' ).click( ( e ) => {
      e.preventDefault();
      let url = $( e.target ).attr( 'href' ) ||
        $( e.target ).closest( 'a' ).attr( 'href' );
      url += `?subject=${self.pageTitle()}&body=${self.pageUrl()}`;
      self.openWindow( encodeURI( url ) );
    });
  }



  /**
   * Builds facebook sharing url
   *
   * @returns {string} - Facebook share URL
   */
  buildFacebookURL() {
    return `https://www.facebook.com/sharer/sharer.php?u= + ${this.pageUrl()}`;
  }

  /**
   * Builds twitter sharing url
   *
   * @returns {string} - Twitter share URL
   */
  buildTwitterURL() {
    return `https://twitter.com/intent/tweet?url=${this.pageUrl()}&text=${this.pageTitle()}`;
  }

  /**
   * Builds google sharing url
   *
   * @returns {string} - Google share URL
   */
  buildGoogleURL() {
    const escapedURL = encodeURIComponent( this.pageUrl() );
    return `https://plus.google.com/share?url=${escapedURL}`;
  }

  /**
   * Returns current page url
   *
   * @returns {string} - Current Page Url
   */
  pageUrl() {
    return window.location.href;
  }

  /**
   * Returns current page url
   *
   * @returns {string} - Current Page Title
   */
  pageTitle() {
    return document.title;
  }

  /**
   * Opens a new window on demand
   *
   * @param {string} url - Url of the new window
   * @param {object} options - Options for the new window
   */
  openWindow( url, options = {}) {
    const width = options.width || 575;
    const height = options.height || 400;
    const left = ( window.outerWidth - width ) / 2;
    const top = ( window.outerHeight - height ) / 2;
    const opts = `status=1,width=${width},height=${height},top=${top},left=${left}`;

    if ( this.socialWindowRef && !this.socialWindowRef.closed ) {
      this.socialWindowRef.close();
    }
    setTimeout( () => {
      this.socialWindowRef = window.open( url, 'A17', opts );
      this.socialWindowRef.opener = null;
    }, 250 );
  }
}

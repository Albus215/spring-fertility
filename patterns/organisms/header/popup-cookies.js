// new CookiesPolicy({
//   popup: '.cookies-p',
//   btn: '.cookies-p__btn',
//   activeClass: 'open',
// });
const store = require('store');
/**
 * Store Some values
 */
export default class CookiesPolicySimplified {
  constructor(atts) {
    this.popup = atts.popup ? $(atts.popup) : [];
    this.close = atts.close ? $(atts.close) : [];
    this.hash_key = (typeof atts.hash_key !== 'undefined' && atts.hash_key !== '') ? atts.hash_key : 'cookies_accept_hash';
    if (this.popup.length && this.close.length) {
      this.popupActiveClass = atts.activeClass || 'active';
      this.popupHash = this.popup.attr('data-popup-hash');

      this.close.on('click', this.onCloseClick.bind(this));

      let popupHashStored = store.get(this.hash_key);
      if (popupHashStored !== this.popupHash) {
        this.popupOpen();
      }
    }
  }

  popupOpen() {
    this.popup.addClass(this.popupActiveClass);
  }

  popupClose() {
    this.popup.removeClass(this.popupActiveClass);
  }

  onCloseClick(e) {
    e.preventDefault();
    store.set(this.hash_key, this.popupHash);
    this.popupClose();
  }
}

// new CookiesPolicy({
//   popup: '.cookies-p',
//   btn: '.cookies-p__btn',
//   activeClass: 'open',
// });
const store = require('store');
/**
 * Store Some values
 */
export default class CookiesPolicy {
  constructor(atts) {
    this.popup = atts.popup ? $(atts.popup) : [];
    this.btn = atts.btn ? $(atts.btn) : [];
    this.close = atts.close ? $(atts.close) : [];
    this.hash_key = (typeof atts.hash_key !== 'undefined' && atts.hash_key !== '') ? atts.hash_key : 'popup_info_hash';
    if (this.popup.length && this.btn.length && this.close.length) {
      this.popupActiveClass = atts.activeClass || 'active';
      this.popupActiveClassBody = atts.activeClassBody || 'header-popup-is-active';
      this.popupHash = this.popup.attr('data-popup-hash');

      // this.btn.on('click', this.onBtnClick.bind(this));
      this.close.on('click', this.onCloseClick.bind(this));

      let popupHashStored = store.get(this.hash_key);
      if (popupHashStored !== this.popupHash) {
        this.popupOpen();
      }
    }
  }

  popupOpen() {
    $('body').addClass(this.popupActiveClassBody);
    this.popup.addClass(this.popupActiveClass);
  }

  popupClose() {
    $('body').removeClass(this.popupActiveClassBody);
    this.popup.removeClass(this.popupActiveClass);
  }

  onCloseClick(e) {
    e.preventDefault();
    store.set(this.hash_key, this.popupHash);
    this.popupClose();
  }
}

/**
 * Class to add JS associated with the Navbar
 */
export default class NavPrimary {
  constructor() {
    this.navEl = $('[data-mobile-nav]');
    this.navToggle = $('[data-mobile-nav-toggle]');
    this.navSubmenuToggle = this.navEl.find('.nav-item-has-sub > a');
    this.navToggleClass = 'on';

    this.navToggle.on('click', this.onMobileNavToggle.bind(this));
    this.navSubmenuToggle.on('click', this.onSubmenuToggle);
  }

  onMobileNavToggle(event) {
    event.preventDefault();
    if (!this.navEl.hasClass(this.navToggleClass)) {
      this.navEl.addClass(this.navToggleClass);
      this.navToggle.addClass(this.navToggleClass);
    } else {
      this.navEl.removeClass(this.navToggleClass);
      this.navToggle.removeClass(this.navToggleClass);
    }
  }

  onSubmenuToggle(event) {
    event.preventDefault();
    let item = $(this).parent();
    let submenu = item.find('> .nav-item-sub');
    if (!item.hasClass('on')) {
      item.addClass('on');
      submenu.slideDown();
    } else {
      item.removeClass('on');
      submenu.slideUp();
    }
  }

}

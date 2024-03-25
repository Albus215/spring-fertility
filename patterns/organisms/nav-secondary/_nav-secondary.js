export default class NavSecondary {
  constructor(vars) {
    this.navElement = $('[data-role="nav-secondary"]');

    if (this.navElement.length) {
      this.window = $(window);

      // scrollSticky vars
      this.navElementStickyClass = vars.stickyClass;
      this.navElementTopOffsetToSticky = vars.offsetToSticky;
      this.navElementTop = this.navElement.offset().top;

      this.navElementSpacer = $('[data-role="nav-secondary-spacer"]');
      this.navElementSpacer.hide();

      // scrollSpyVars
      this.navElementSpyActiveClass = vars.spyActiveClass;
      this.navElementTopOffsetSpy = vars.offsetScrollSpy;
      this.navMenuItems = this.navElement.find('a');
      this.navScrollItems = this.navElement.find('a').map(function () {
        let href = $(this).attr("href");
        if (href.indexOf('#') !== 0) return;
        let item = $('[data-href="' + href + '"]');

        if (item.length) {
          return item;
        }
      });
      this.navSpyLastId = '';

      let currentHash = window.location.hash;
      setTimeout(function () {
        if (currentHash !== '' && currentHash !== '#') this.smoothScrollTo(currentHash);
      }.bind(this), 600);

      // bind handlers
      this.onScrollSpy();
      this.window.on('scroll', this.onScrollSticky.bind(this));
      this.window.on('scroll', this.onScrollSpy.bind(this));
      this.navMenuItems.on('click', this.smoothScroll.bind(this));
    }
  }

  onScrollSticky() {
    if (this.window.scrollTop() + this.navElementTopOffsetToSticky >= this.navElementTop) {
      this.navElement.addClass(this.navElementStickyClass);
      this.navElementSpacer.show();
    } else {
      this.navElement.removeClass(this.navElementStickyClass);
      this.navElementSpacer.hide();
    }
  }

  onScrollSpy() {
    let fromTop = this.window.scrollTop() + this.navElementTopOffsetSpy;

    let cur = this.navScrollItems.map(function () {
      if ($(this).offset().top < fromTop) return this;
    });
    cur = cur[cur.length - 1];
    let id = cur && cur.length ? cur.attr('data-href') : "";

    if (this.navSpyLastId !== id) {
      this.navSpyLastId = id;
      this.navMenuItems
        .parent().removeClass(this.navElementSpyActiveClass)
        .end().filter("[href='" + id + "']").parent().addClass(this.navElementSpyActiveClass);
      if (id !== '') window.location.href = id;
    }
  }

  smoothScroll(e) {
    let href = $(e.target).attr("href");
    this.smoothScrollTo(href);
    e.preventDefault();
  }

  smoothScrollTo(href) {
    let target = '[data-href="' + href + '"]',
      offsetTop = href === "#" ? 0 : $(target).offset().top - this.navElementTopOffsetSpy + 1;
    $('html, body').stop().animate({
      scrollTop: offsetTop
    }, 800);
  }
}


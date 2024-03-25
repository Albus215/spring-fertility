export default class HorizontalScrollSection {
  constructor() {
    this.section = $('[data-hs-section]');
    this.sectionBox = $('[data-hs-section-box]');
    this.sectionContent = $('[data-hs-section-content]');

    if (this.section.length && this.sectionBox.length && this.sectionContent.length) {

      this.wnd = $(window);

      this.renewVariables();
      this.makeBoxSticky();
      this.makeContentMove();

      this.wnd.on('resize', () => {
        this.renewVariables();
      });

      this.wnd.on('scroll', () => {
        this.makeBoxSticky();
        this.makeContentMove();
      });
    }
  }

  renewVariables() {
    this.section.css('height', this.getSectionHeight(this.sectionContent.get(0)) + 'px');

    this.scrollPointA = this.section.offset().top;
    this.scrollPointB = this.scrollPointA + this.section.outerHeight() - window.innerHeight;
  }

  getSectionHeight(ref) {
    return Math.round(ref.scrollWidth - window.innerWidth + window.innerHeight);
  }

  makeBoxSticky() {
    if (this.wnd.scrollTop() >= this.scrollPointA && this.wnd.scrollTop() <= this.scrollPointB) {
      this.sectionBox.addClass('fix')
    } else {
      this.sectionBox.removeClass('fix')
    }
    if (this.wnd.scrollTop() > this.scrollPointB) {
      this.sectionBox.addClass('abs-B');
    } else {
      this.sectionBox.removeClass('abs-B');
    }
    if (this.wnd.scrollTop() < this.scrollPointA) {
      this.sectionBox.addClass('abs-A');
    } else {
      this.sectionBox.removeClass('abs-A');
    }
  }

  makeContentMove() {
    let scrollX = Math.round(this.sectionBox.offset().top - this.scrollPointA);
    this.sectionContent.css('transform', 'translateX(-' + scrollX + 'px)');
  }

}

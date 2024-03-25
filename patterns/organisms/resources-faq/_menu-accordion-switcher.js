import SlimSelect from 'slim-select';

export default class MenuAccordionSwitcher {
  constructor() {
    this.maSelect = $('[data-role="menu-accordion"]');
    if (this.maSelect.length) {
      this.maBoxes = this.maSelect.each(function (idx, selectEl) {
        this.processMaBoxes($(selectEl));
        new SlimSelect({
          showSearch: false,
          select: selectEl,
        });
      }.bind(this));
      this.maSelect.on('change', this.onSelectMenu.bind(this));
    }
  }

  processMaBoxes(select) {
    let currentBox = $(select.val());
    select.find('option').each(function (idx, optionEl) {
      let box = $(optionEl.value);
      if (box.length) {
        if (box.is(currentBox)) {
          box.slideDown();
        } else {
          box.slideUp();
        }
      }
    });
  }

  onSelectMenu(e) {
    e.preventDefault();
    this.processMaBoxes($(e.target));
  }


}


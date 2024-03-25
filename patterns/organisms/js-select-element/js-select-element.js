export default class JsSelectElement {
  constructor() {
    this.selectEls = $('[data-js-sel]');
    if (this.selectEls.length) {
      this.selectEls.each(function () {
        let sel = $(this);
        let selVal = sel.val();
        let $_sel = $('<div data-js-sel-box class="' + sel.attr('class') + '"></div>');
        let $_selHeader = $('<div data-js-sel-header></div>');
        let $_selOptionsBox = $('<ul data-js-sel-options></ul>');
        sel.find('option').each(function () {
          let selOption = $(this);
          let selOptionActive = (selOption.attr('value') === selVal) ? 'active' : '';
          $_selOptionsBox.append('<li data-js-sel-option="' + selOption.attr('value') + '" ' + ' class="' + selOptionActive + '">' + selOption.text() +'</li>');
          if (selOptionActive === 'active') $_selHeader.text(selOption.text());
        });

        $_sel.insertAfter(sel);
        $_sel.append($_selHeader);
        $_sel.append($_selOptionsBox);
        $_sel.find('[data-js-sel-options]').hide();
        sel.hide();
      });

      $('[data-js-sel-header]').on('click', this.onHeaderClick);
      $('[data-js-sel-option]').on('click', this.onOptionClick);
      $('[data-js-sel]').on('change', this.onSelectChange);
    }
  }

  onHeaderClick(event) {
      let selectBox = $(this).closest('[data-js-sel-box]');
      if (selectBox.hasClass('on')) {
        selectBox.removeClass('on');
        selectBox.find('[data-js-sel-options]').slideUp();
      } else {
        selectBox.addClass('on');
        selectBox.find('[data-js-sel-options]').slideDown();
      }
  }

  onOptionClick(event) {
    let curOption = $(this);
    let curVal = curOption.attr('data-js-sel-option');
    let curTxt = curOption.text();

    let selectBox = curOption.closest('[data-js-sel-box]');
    let optionsBox = selectBox.find('[data-js-sel-options]');
    let header = selectBox.find('[data-js-sel-header]');
    let selectEl = selectBox.siblings('[data-js-sel]');

    optionsBox.find('.active').removeClass('active');
    curOption.addClass('active');

    selectBox.removeClass('on');
    optionsBox.slideUp();

    header.text(curTxt);
    selectEl.val(curVal).change();
  }

  onSelectChange() {
    let selectEl = $(this);
    let selectBox = selectEl.siblings('[data-js-sel-box]');
    let header = selectBox.find('[data-js-sel-header]');

    let curVal = selectEl.val();
    let curTxt = selectBox.find('[data-js-sel-option="' + curVal + '"]').text();

    header.text(curTxt);
    selectBox.find('[data-js-sel-option]').removeClass('active');
    selectBox.find('[data-js-sel-option="' + curVal + '"]').addClass('active');
  }
}

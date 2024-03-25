function simpleTabsSwitch(curTabItem) {
  let curTabTarget = curTabItem.attr('data-s-tab-target');
  let curTabBox = curTabItem.closest('[data-s-tab]');
  let curTabDD = curTabBox.find('[data-s-tab-dd]');

  curTabDD.val(curTabTarget).change();

  curTabBox.find('[data-s-tab-target].active').removeClass('active');
  curTabBox.find('[data-s-tab-id].active').removeClass('active');

  curTabItem.addClass('active');
  curTabBox.find('[data-s-tab-id="' + curTabTarget + '"]').addClass('active');

  curTabBox.trigger('s-tab:switch');
}

export default class SimpleTabs {
  constructor() {
    this.tabTarget = $('[data-s-tab-target]');
    this.tabDD = $('[data-s-tab-dd]');
    if (this.tabTarget.length) {
      this.tabTarget.on('click', this.onTabClick);
    }
    if (this.tabDD.length) {
      this.tabDD.on('change', this.onDDChange);
    }

  }

  onTabClick(event) {
    let curTabItem = $(this);
    let curTabTarget = curTabItem.attr('data-s-tab-target');
    let curTabBox = curTabItem.closest('[data-s-tab]');
    let curTabDD = curTabBox.find('[data-s-tab-dd]');

    curTabDD.val(curTabTarget).change();

    // simpleTabsSwitch(curTabItem);
  }

  onDDChange(event) {
    let curTabDD = $(this);
    let curTabTarget = curTabDD.val();
    let curTabBox = curTabDD.closest('[data-s-tab]');
    let curTabItem = curTabBox.find('[data-s-tab-target="' + curTabTarget + '"]');

    curTabBox.find('[data-s-tab-target].active').removeClass('active');
    curTabBox.find('[data-s-tab-id].active').removeClass('active');

    curTabItem.addClass('active');
    curTabBox.find('[data-s-tab-id="' + curTabTarget + '"]').addClass('active');

    curTabBox.trigger('s-tab:switch');
  }
}

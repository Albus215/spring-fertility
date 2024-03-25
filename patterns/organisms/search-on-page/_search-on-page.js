/*
 * jQuery throttle / debounce - v1.1 - 3/7/2010
 * http://benalman.com/projects/jquery-throttle-debounce-plugin/
 *
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */

// (function(b,c){var $=b.jQuery||b.Cowboy||(b.Cowboy={}),a;$.throttle=a=function(e,f,j,i){var h,d=0;if(typeof f!=="boolean"){i=j;j=f;f=c}function g(){var o=this,m=+new Date()-d,n=arguments;function l(){d=+new Date();j.apply(o,n)}function k(){h=c}if(i&&!h){l()}h&&clearTimeout(h);if(i===c&&m>e){l()}else{if(f!==true){h=setTimeout(i?k:l,i===c?e-m:e)}}}if($.guid){g.guid=j.guid=j.guid||$.guid++}return g};$.debounce=function(d,e,f){return f===c?a(d,e,false):a(d,f,e!==false)}})(this);
function debounce(f, ms) {
  let isCooldown = false;
  return function () {
    if (isCooldown) return;
    f.apply(this, arguments);
    isCooldown = true;
    setTimeout(() => isCooldown = false, ms);
  };
}

/**
 * SearchOnPage
 */
export default class SearchOnPage {

  constructor() {
    this.form = {
      element: $('[data-role="sop-form"]'),
      input: $('[data-role="sop-input"]'),
    };
    if (this.form.element.length) {
      this.result = $('[data-role="sop-results"]');
      this.resultNum = $('[data-role="sop-results-n"]');
      this.resultTerm = $('[data-role="sop-results-t"]');
      this.resultClear = $('[data-role="sop-results-x"]');
      this.notFound = $('[data-role="sop-nf"]');
      this.hideOnSearch = $('[data-role="sop-hide-on-search"]');

      this.searchTerms = $('[data-role="sop-term-group"]').map(function () {
        let termGroup = $(this);
        let terms = termGroup.find('[data-role="sop-term"]').map(function () {
          let term = $(this);
          return {
            isFound: true,
            element: term,
            title: term.find('[data-role="sop-term-title"]').text().trim().toLowerCase(),
            description: term.find('[data-role="sop-term-description"]').text().trim().toLowerCase(),
          };
        });
        return {
          isFound: true,
          element: termGroup,
          terms: terms,
        }
      });

      this.form.element.on('submit', this.search.bind(this));
      this.form.input.on('keyup', this.search.bind(this));
      // this.form.input.on('keyup', debounce(this.search.bind(this), 500));
      this.form.input.on('focus', this.smoothScroll);
      this.resultClear.on('click', this.clear.bind(this));
    }
  }

  clear(e) {
    this.form.input.val('');
    this.form.input.trigger('keyup');
    e.preventDefault();
  }

  search(e) {
    if (this.form.input.val() !== '') {
      if (this.hideOnSearch.length) this.hideOnSearch.hide();
      let term = this.form.input.val().trim();
      this.filterResults(term);
      this.displayResults();
      this.displayTermOfResults(term)
    } else {
      this.resetResults();
      this.displayResults();
      this.notFound.hide();
      this.result.hide();
      if (this.hideOnSearch.length) this.hideOnSearch.show();
    }
    e.preventDefault();
  }

  filterResults(searchPhrase) {
    searchPhrase = searchPhrase.trim().toLowerCase();
    for (let i = 0; i < this.searchTerms.length; i++) {
      let isFound = false;
      for (let j = 0; j < this.searchTerms[i].terms.length; j++) {
        this.searchTerms[i].terms[j].isFound =
          this.searchTerms[i].terms[j].title.indexOf(searchPhrase) !== -1 ||
          this.searchTerms[i].terms[j].description.indexOf(searchPhrase) !== -1;
        if (this.searchTerms[i].terms[j].isFound) isFound = true;
      }
      this.searchTerms[i].isFound = isFound;
    }
  }

  resetResults() {
    for (let i = 0; i < this.searchTerms.length; i++) {
      this.searchTerms[i].isFound = true;
      for (let j = 0; j < this.searchTerms[i].terms.length; j++) {
        this.searchTerms[i].terms[j].isFound = true;
      }
    }
  }

  displayResults() {
    let foundQty = 0;
    for (let i = 0; i < this.searchTerms.length; i++) {
      if (this.searchTerms[i].isFound) {
        this.searchTerms[i].element.show();
        for (let j = 0; j < this.searchTerms[i].terms.length; j++) {
          if (this.searchTerms[i].terms[j].isFound) {
            this.searchTerms[i].terms[j].element.show();
            foundQty++;
          } else {
            this.searchTerms[i].terms[j].element.hide();
          }
        }
      } else {
        this.searchTerms[i].element.hide();
      }
    }
    this.displayNumberOfResults(foundQty)
  }

  displayNumberOfResults(numberOfResults) {
    numberOfResults = parseInt(numberOfResults);
    if (numberOfResults) {
      this.notFound.hide();
      this.result.show();
      this.resultNum.text(numberOfResults);
    } else {
      this.notFound.show();
      this.result.hide();
    }
  }

  displayTermOfResults(term) {
    term = term ? term : '';
    if (term) {
      this.resultTerm.text(term);
    }
  }

  smoothScroll() {
    let href = '#o__sop';
    let offsetTop = href === "#" ? 0 : $(href).offset().top - 110 + 1;
    $('html, body').stop().animate({
      scrollTop: offsetTop
    }, 800);
    e.preventDefault();
  }

}

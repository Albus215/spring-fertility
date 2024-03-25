const ProgressBar = require('progressbar.js');

if (typeof Object.assign != 'function') {
  Object.assign = function (target, varArgs) { // .length of function is 2
    'use strict';
    if (target == null) { // TypeError if undefined or null
      throw new TypeError('Cannot convert undefined or null to object');
    }

    var to = Object(target);

    for (var index = 1; index < arguments.length; index++) {
      var nextSource = arguments[index];

      if (nextSource != null) { // Skip over if undefined or null
        for (var nextKey in nextSource) {
          // Avoid bugs when hasOwnProperty is shadowed
          if (Object.prototype.hasOwnProperty.call(nextSource, nextKey)) {
            to[nextKey] = nextSource[nextKey];
          }
        }
      }
    }
    return to;
  };
}

const ageDatasets = {
  spring: function (age) {

    age = parseInt(age);
    if (age < 30) {
      return 0.169;
    } else if (age === 30) {
      return 0.1669;
    } else if (age === 31) {
      return 0.1643;
    } else if (age === 32) {
      return 0.1603;
    } else if (age === 33) {
      return 0.1573;
    } else if (age === 34) {
      return 0.1458;
    } else if (age === 35) {
      return 0.1292;
    } else if (age === 36) {
      return 0.1266;
    } else if (age === 37) {
      return 0.1211;
    } else if (age === 38) {
      return 0.065;
    } else if (age === 39) {
      return 0.0525;
    } else if (age === 40) {
      return 0.043;
    } else if (age === 41) {
      return 0.035;
    } else if (age === 42) {
      return 0.0296;
    }
    return 0.0139;

    // age = parseInt(age);
    // if (age < 30) {
    //   return 0.1756;
    // } else if (age === 30) {
    //   return 0.1734;
    // } else if (age === 31) {
    //   return 0.1707;
    // } else if (age === 32) {
    //   return 0.1666;
    // } else if (age === 33) {
    //   return 0.1634;
    // } else if (age === 34) {
    //   return 0.1515;
    // } else if (age === 35) {
    //   return 0.1313;
    // } else if (age === 36) {
    //   return 0.1287;
    // } else if (age === 37) {
    //   return 0.1231;
    // } else if (age === 38) {
    //   return 0.0687;
    // } else if (age === 39) {
    //   return 0.0556;
    // } else if (age === 40) {
    //   return 0.0455;
    // } else if (age === 41) {
    //   return 0.037;
    // } else if (age === 42) {
    //   return 0.0313;
    // }
    // return 0.0147;

  },

  doyle: function (age) {
    // console.log('DOYLE')
    if (age < 30) {
      return 0.082;
    } else if (age < 35) {
      return 0.08;
    } else if (age >= 35 && age <= 37) {
      return 0.073;
    } else if (age >= 38 && age <= 40) {
      return 0.045;
    }
    return 0.025;
  },

  cobo: function (age) {
    // console.log('COBO')
    if (age <= 35) {
      return 0.066;
    } else if (age === 36 || age === 37) {
      return 0.061;
    } else if (age === 38 || age === 39) {
      return 0.056;
    }
    return 0.018;
  },
};

export default class EggCalculatorComparison {
  constructor(vars) {
    /**
     * Values from Form
     */
    this.form = $(vars.form);
    if (!this.form.length) return;
    this.form_egg_qty = $(vars.form).find(vars.form_egg_qty);
    this.form_age = $(vars.form).find(vars.form_age);
    this.form_prior_pregnancy = $(vars.form).find(vars.form_prior_pregnancy);

    /**
     * Result Elements
     */
    const progressBarParams = {
      color: '#30b2df',
      trailColor: 'transparent',
      // This has to be the same size as the maximum width to
      // prevent clipping
      strokeWidth: 4,
      trailWidth: 2,
      easing: 'easeInOut',
      duration: 1500,
      text: {
        autoStyleContainer: false,
        style: {
          color: '#093249',
          position: 'absolute',
          left: '50%',
          top: '50%',
          padding: 0,
          margin: 0,
          transform: {
            prefix: true,
            value: 'translate(-50%, -50%)'
          }
        }
      },
      from: {color: '#30b2df', width: 4},
      to: {color: '#30b2df', width: 4},
      // Set default step function for all animate calls
      // step: function (state, circle) {
      //   circle.path.setAttribute('stroke', state.color);
      //   circle.path.setAttribute('stroke-width', state.width);
      //   var value = Math.round(circle.value() * 100);
      //   if (value === 0) {
      //     circle.setText('0%');
      //   } else {
      //     circle.setText(value + '%');
      //   }
      // }
    };

    this.result_chance_live_birth = [];
    $(vars.results_chance_live_birth).each(function (idx, el) {
      let result_circle = $(el);
      let el_info = $(vars.results_chance_live_birth_info + '[data-calc-item=' + idx + ']')[0];
      let result_circle_color = result_circle.attr('data-calc-color') || '#30b2df';
      let result_show_comparison = parseInt(result_circle.attr('data-calc-show-comparison'));
      let result_circle_params = Object.assign({}, progressBarParams);
      result_circle_params.color = result_circle_color;
      result_circle_params.from = {color: result_circle_color, width: 4};
      result_circle_params.to = {color: result_circle_color, width: 4};

      let result_circle_params_info = Object.assign({}, result_circle_params);
      result_circle_params_info.trailColor = '#e2e3ea';

      result_circle_params.trailColor = '#e2e3ea';
      // result_circle_params.strokeWidth += idx;
      // if (result_circle_params.strokeWidth > 6) result_circle_params.strokeWidth = 6;

      let theObj = {
        id: parseInt(result_circle.attr('data-calc-item')),
        result: 0,
        show_comparison: result_show_comparison,
        result_txt: {},
        el: result_circle,
        dataset: result_circle.attr('data-calc-dataset'),

        progressBar: new ProgressBar.Circle(el, result_circle_params),
        progressBarInfo: new ProgressBar.Circle(el_info, result_circle_params_info),
      };
      theObj.progressBar.path.style.strokeLinecap = 'round';
      theObj.progressBarInfo.path.style.strokeLinecap = 'round';
      theObj.dataset_age_to_propability_fn = ageDatasets[theObj.dataset];

      this.result_chance_live_birth.push(theObj);
    }.bind(this));

    this.result_chance_2plus_children = [];
    $(vars.results_chance_2plus_children).each(function (idx, el) {
      let result_circle = $(el);
      let el_info = $(vars.results_chance_2plus_children_info + '[data-calc-item=' + idx + ']')[0];
      let result_circle_color = result_circle.attr('data-calc-color') || '#30b2df';
      let result_show_comparison = parseInt(result_circle.attr('data-calc-show-comparison'));
      let result_circle_params = Object.assign({}, progressBarParams);
      result_circle_params.color = result_circle_color;
      result_circle_params.from = {color: result_circle_color, width: 4};
      result_circle_params.to = {color: result_circle_color, width: 4};

      let result_circle_params_info = Object.assign({}, result_circle_params);
      result_circle_params_info.trailColor = '#e2e3ea';

      result_circle_params.trailColor = '#e2e3ea';
      // result_circle_params.strokeWidth += idx;
      // if (result_circle_params.strokeWidth > 6) result_circle_params.strokeWidth = 6;

      let theObj = {
        id: parseInt(result_circle.attr('data-calc-item')),
        result: 0,
        show_comparison: result_show_comparison,
        result_txt: {},
        el: result_circle,
        dataset: result_circle.attr('data-calc-dataset'),
        progressBar: new ProgressBar.Circle(el, result_circle_params),
        progressBarInfo: new ProgressBar.Circle(el_info, result_circle_params_info),
      };
      theObj.progressBar.path.style.strokeLinecap = 'round';
      theObj.progressBarInfo.path.style.strokeLinecap = 'round';

      this.result_chance_2plus_children.push(theObj);

    }.bind(this));

    $(vars.results_txt).each(function (idx, el) {
      let result_txt_el = $(el);
      this.result_chance_live_birth[idx].result_txt = result_txt_el.find(vars.results_txt_one);
      this.result_chance_2plus_children[idx].result_txt = result_txt_el.find(vars.results_txt_2plus);
    }.bind(this));

    if (this.form.length) {
      this.form.on('submit', this.formOnSubmitCompute.bind(this));
      this.calculatePropabolities();
    }
  }

  formOnSubmitCompute(event) {
    event.preventDefault();
    this.calculatePropabolities();
  }

  calculatePropabolities() {

    for (let i = 0; i < this.result_chance_live_birth.length; i++) {
      let results = this.computeBinomArrays(this.result_chance_live_birth[i].dataset_age_to_propability_fn);
      this.result_chance_live_birth[i].result = results.chance_live_birth;
      this.result_chance_2plus_children[i].result = results.chance_2plus_child;
    }

    this.displayResults();
  }


  renewVars(age_to_propability_fn) {
    /**
     * For calculations
     */
    this.g_n = 0;
    this.g_p = 0;
    this.pdfarr = [];
    this.cdfarr = [];
    this.pdfpairs = [];
    this.cdfpairs = [];
    this.ticks = [];

    this.propability_dist = [];
    this.cumulative_dist = [];
    this.one_minus_cumulative_dist = [];

    // parse form values
    let eggs_qty = parseInt(this.form_egg_qty.val()),
      age = parseInt(this.form_age.val()),
      // prior_pregnancy = !!parseInt(this.form_prior_pregnancy.val());
      prior_pregnancy = false;

    console.log(eggs_qty + ' , ' + age + ' , ' + prior_pregnancy);

    // eggs_qty -> Number of trials, n
    this.g_n = (eggs_qty > 0) ? eggs_qty : 10;

    // age -> Probability of success, p
    if ($.isFunction(age_to_propability_fn)) { // custom age-to-propability function
      this.g_p = age_to_propability_fn(age);
    } else { // default logic
      if (age < 35) {
        this.g_p = 0.05;
      } else if (age >= 35 && age <= 37) {
        this.g_p = 0.045;
      } else if (age >= 38 && age <= 39) {
        this.g_p = 0.04;
      } else if (age === 40) {
        this.g_p = 0.03;
      } else if (age >= 41) {
        this.g_p = 0.02;
      }
    }


    // prior_pregnancy -> Correct Probability of success, p (increase by 1% if true)
    if (prior_pregnancy) {
      this.g_p += 0.01;
    }
  }

  /**
   * @preserve binomial.js 1.0.1
   * Copyright (c) David Ireland, D.I. Management Services Pty Ltd
   * <http://www.di-mgt.com.au/>
   * @license Open source under the MIT license
   *
   * This is where magic happens
   */
  computeBinomArrays(age_to_propability_fn) {

    // -- renew vars
    this.renewVars(age_to_propability_fn);

    // -- compute binom arrays
    var r = this.g_n
      , a = this.g_p;
    this.pdfarr = [];
    this.cdfarr = [];
    this.pdfpairs = [];
    this.cdfpairs = [];
    this.ticks = [[-.25, ""]];
    for (var i, s, p, t, e = 0, f = 0; r >= f; f++) {
      if (0 == f) {
        s = 1,
          p = 1,
          t = 1;
        for (var d = 0; r - f > d; d++)
          t *= 1 - a
      } else
        s *= (r - f + 1) / f,
          p *= a,
          t /= 1 - a;
      i = s * p * t,
        e += i,
        this.pdfarr.push(i),
        this.cdfarr.push(e),
        this.pdfpairs.push([f, i]),
        this.cdfpairs.push([f, e]),
        this.ticks.push([f, f.toFixed(0)])
    }
    if (this.ticks.push([r + .25, ""]), r > 20) {
      var n = Math.floor(r / 2);
      this.ticks = [[-.25, ""], [0, "0"], [n, n.toFixed(0)], [r, r.toFixed(0)], [r + .25, ""]]
    }

    // -- get Results from binom arrays
    this.propability_dist = this.pdfarr;
    this.cumulative_dist = this.cdfarr;
    this.one_minus_cumulative_dist = [];
    for (let i = 0; i < this.cumulative_dist.length; i++)
      this.one_minus_cumulative_dist.push(1 - this.cumulative_dist[i]);

    let res_chance_live_birth = parseFloat(this.one_minus_cumulative_dist[0] * 100).toFixed(0);
    let res_chance_2plus_child = parseFloat(this.one_minus_cumulative_dist[1] * 100).toFixed(0);

    return {
      chance_live_birth: parseInt(res_chance_live_birth) === 100 ? 99 : res_chance_live_birth,
      chance_2plus_child: parseInt(res_chance_2plus_child) === 100 ? 99 : res_chance_2plus_child,
    };
  }

  resultCompareFn(a, b) {
    if (parseFloat(a.result) < parseFloat(b.result)) return 1;
    if (parseFloat(a.result) > parseFloat(b.result)) return -1;
    return 0;
  }

  resultFilterFn(input_array) {
    let output_array = [];
    for (let i = 0; i < input_array.length; i++) {
      if (input_array[i].show_comparison) {
        output_array.push(input_array[i]);
      }
    }
    output_array.sort(this.resultCompareFn);
    return output_array;
  }

  displayResults() {
    // console.dir('chance_live_birth');
    // console.dir(this.chance_live_birth);
    // console.dir('chance_1_child');
    // console.dir(this.chance_1_child);
    // console.dir('chance_2_child');
    // console.dir(this.chance_2_child);
    // console.dir('chance_3_child');
    // console.dir(this.chance_3_child);

    // -- sort results by 'result' value
    let comparison_result_chance_live_birth = this.resultFilterFn(this.result_chance_live_birth);
    let comparison_result_chance_2plus_children = this.resultFilterFn(this.result_chance_2plus_children);
    // console.dir(comparison_result_chance_live_birth);
    // console.dir(comparison_result_chance_2plus_children);
    let result_chance_live_birth_dump = this.result_chance_live_birth.slice();
    let result_chance_2plus_children_dump = this.result_chance_2plus_children.slice();

    this.result_chance_live_birth.sort(this.resultCompareFn);
    this.result_chance_2plus_children.sort(this.resultCompareFn);

    // console.dir(result_chance_live_birth_sorted);
    // console.dir(result_chance_2plus_children_sorted);

    // -- animate & display results
    for (let i = 0; i < this.result_chance_live_birth.length; i++) {
      // -- COMPARISON start
      if (typeof comparison_result_chance_live_birth[i] !== 'undefined') {
        // -- clear the text
        comparison_result_chance_live_birth[i].progressBar.setText('');
        comparison_result_chance_2plus_children[i].progressBar.setText('');
        // -- set circle animations
        comparison_result_chance_live_birth[i].progressBar.set(0);
        comparison_result_chance_live_birth[i].progressBar.animate(
          comparison_result_chance_live_birth[i].result / 100
        );
        comparison_result_chance_2plus_children[i].progressBar.set(0);
        comparison_result_chance_2plus_children[i].progressBar.animate(
          comparison_result_chance_2plus_children[i].result / 100
        );
        // -- set circle animations order
        comparison_result_chance_live_birth[i].el.css({'z-index': i * 10});
        comparison_result_chance_2plus_children[i].el.css({'z-index': i * 10});

        if (i === 0) comparison_result_chance_live_birth[i].progressBar.trail.style.opacity = 1;
        else comparison_result_chance_live_birth[i].progressBar.trail.style.opacity = 0;

        if (i === 0) comparison_result_chance_2plus_children[i].progressBar.trail.style.opacity = 1;
        else comparison_result_chance_2plus_children[i].progressBar.trail.style.opacity = 0;
      } else {
        // hide unused comparison elements
        // this.result_chance_live_birth[i].el.css({'opacity': '0'});
        this.result_chance_live_birth[i].progressBar.trail.style.opacity = 0;
        // this.result_chance_2plus_children[i].el.css({'display': 'none'});
        this.result_chance_2plus_children[i].progressBar.trail.style.opacity = 0;
      }
      // -- set text results
      this.result_chance_live_birth[i].result_txt.text(this.result_chance_live_birth[i].result + '%');
      this.result_chance_2plus_children[i].result_txt.text(this.result_chance_2plus_children[i].result + '%');
      // -- COMPARISON end

      // -- set info circle animations
      this.result_chance_live_birth[i].progressBarInfo.set(0);
      this.result_chance_live_birth[i].progressBarInfo.animate(
        this.result_chance_live_birth[i].result / 100
      );
      this.result_chance_2plus_children[i].progressBarInfo.set(0);
      this.result_chance_2plus_children[i].progressBarInfo.animate(
        this.result_chance_2plus_children[i].result / 100
      );
      // -- set info circle text
      this.result_chance_live_birth[i].progressBarInfo.setText(
        this.result_chance_live_birth[i].result + '%'
      );
      this.result_chance_2plus_children[i].progressBarInfo.setText(
        this.result_chance_2plus_children[i].result + '%'
      );
    }

    // -- set circle text results
    // console.dir(comparison_result_chance_live_birth);
    // console.dir(comparison_result_chance_live_birth[0]);
    // console.dir(comparison_result_chance_live_birth[0].progressBar);
    comparison_result_chance_live_birth[0].progressBar.setText(
      comparison_result_chance_live_birth[comparison_result_chance_live_birth.length - 1].result + '-' +
      comparison_result_chance_live_birth[0].result + '%'
    );

    comparison_result_chance_2plus_children[0].progressBar.setText(
      comparison_result_chance_2plus_children[comparison_result_chance_2plus_children.length - 1].result + '-' +
      comparison_result_chance_2plus_children[0].result + '%'
    );

    this.result_chance_live_birth = result_chance_live_birth_dump.slice();
    this.result_chance_2plus_children = result_chance_2plus_children_dump.slice();
  }
}

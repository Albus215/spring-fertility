const ProgressBar = require('progressbar.js');

if (typeof Object.assign != 'function') {
    Object.assign = function(target, varArgs) { // .length of function is 2
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

export default class EggCalculator {
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
            color: '#f68b6a',
            trailColor: '#e7e7e7',
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
            from: { color: '#f68b6a', width: 4 },
            to: { color: '#f68b6a', width: 4 },
            // Set default step function for all animate calls
            step: function(state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);
                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('0%');
                } else {
                    circle.setText(value + '%');
                }
            }
        };
        const progressBarParamsMain = Object.assign({}, progressBarParams);
        progressBarParamsMain.color = '#30b2df';
        progressBarParamsMain.from = { color: '#30b2df', width: 4 };
        progressBarParamsMain.to = { color: '#30b2df', width: 4 };

        console.dir(progressBarParams);
        console.dir(progressBarParamsMain);
        this.result_chance_live_birth = new ProgressBar.Circle(vars.result_chance_live_birth, progressBarParamsMain);
        this.result_chance_1_child = new ProgressBar.Circle(vars.result_chance_1_child, progressBarParams);
        this.result_chance_2_child = new ProgressBar.Circle(vars.result_chance_2_child, progressBarParams);
        this.result_chance_3_child = new ProgressBar.Circle(vars.result_chance_3_child, progressBarParams);

        if (this.form.length) {
            this.form.on('submit', this.formOnSubmitCompute.bind(this));
            this.calculatePropabolities();
        }
    }

    renewVars() {
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

        /**
         * For Results
         */
        this.chance_live_birth = 0;
        this.chance_1_child = 0;
        this.chance_2_child = 0;
        this.chance_3_child = 0;
    }

    formOnSubmitCompute( event ) {
        event.preventDefault();
        this.calculatePropabolities();
    }

    calculatePropabolities() {
        this.renewVars();

        // parse form values
        let eggs_qty = parseInt(this.form_egg_qty.val()),
            age = parseInt(this.form_age.val()),
            prior_pregnancy = !!parseInt(this.form_prior_pregnancy.val());

        // eggs_qty -> Number of trials, n
        this.g_n = (eggs_qty > 0) ? eggs_qty : 10;

        // age -> Probability of success, p
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

        // prior_pregnancy -> Correct Probability of success, p (increase by 1% if true)
        if (prior_pregnancy) {
            this.g_p += 0.01;
        }


        this.computeBinomArrays();
        this.getResultsFromBinomArrays();
        this.displayResults();
    }

    /**
     * @preserve binomial.js 1.0.1
     * Copyright (c) David Ireland, D.I. Management Services Pty Ltd
     * <http://www.di-mgt.com.au/>
     * @license Open source under the MIT license
     *
     * This is where magic happens
     */
    computeBinomArrays() {
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
    }

    getResultsFromBinomArrays() {
        this.propability_dist = this.pdfarr;
        this.cumulative_dist = this.cdfarr;
        this.one_minus_cumulative_dist = [];
        for (let i = 0; i < this.cumulative_dist.length; i++)
            this.one_minus_cumulative_dist.push(1 - this.cumulative_dist[i]);

        this.chance_live_birth = Math.round(this.one_minus_cumulative_dist[0] * 100);
        this.chance_1_child = Math.round(this.propability_dist[1] * 100);
        this.chance_2_child = Math.round(this.propability_dist[2] * 100);
        this.chance_3_child = Math.round(this.propability_dist[3] * 100);
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

        this.result_chance_live_birth.set(0);
        this.result_chance_1_child.set(0);
        this.result_chance_2_child.set(0);
        this.result_chance_3_child.set(0);

        this.result_chance_live_birth.animate( this.chance_live_birth / 100 );
        this.result_chance_1_child.animate( this.chance_1_child / 100 );
        this.result_chance_2_child.animate( this.chance_2_child / 100 );
        this.result_chance_3_child.animate( this.chance_3_child / 100 );
    }
}

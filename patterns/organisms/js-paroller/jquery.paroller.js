/**
 * jQuery plugin paroller.js v1.4.6
 * https://github.com/tgomilar/paroller.js
 * preview: https://tgomilar.github.io/paroller/
 **/
(function (factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        define('parollerjs', ['jquery'], factory);
    } else if (typeof module === 'object' && typeof module.exports === 'object') {
        module.exports = factory(require('jquery'));
    }
    else {
        factory(jQuery);
    }
})(function (jQuery) {
    'use strict';

    var working = false;
    var scrollAction = function() {
        working = false;
    };

    var setDirection = {
        bgVertical: function (elem, bgOffset) {
            return elem.css({'background-position': 'center ' + -bgOffset + 'px'});
        },
        bgHorizontal: function (elem, bgOffset) {
            return elem.css({'background-position': -bgOffset + 'px' + ' center'});
        },
        vertical: function (elem, elemOffset, transition, oldTransform) {
            (oldTransform === 'none' ? oldTransform = '' : true);
            return elem.css({
                '-webkit-transform': 'translateY(' + elemOffset + 'px)' + oldTransform,
                '-moz-transform': 'translateY(' + elemOffset + 'px)' + oldTransform,
                'transform': 'translate(0,' + elemOffset + 'px)' + oldTransform,
                'transition': transition,
                'will-change': 'transform'
            });
        },
        horizontal: function (elem, elemOffset, transition, oldTransform) {
            (oldTransform === 'none' ? oldTransform = '' : true);
            return elem.css({
                '-webkit-transform': 'translateX(' + elemOffset + 'px)' + oldTransform,
                '-moz-transform': 'translateX(' + elemOffset + 'px)' + oldTransform,
                'transform': 'translate(' + elemOffset + 'px, 0)' + oldTransform,
                'transition': transition,
                'will-change': 'transform'
            });
        }
    };

    var setMovement = {
        factor: function (elem, width, options) {
            var dataFactor = elem.data('paroller-factor');
            var factor = (dataFactor) ? dataFactor : options.factor;
            if (width < 576) {
                var dataFactorXs = elem.data('paroller-factor-xs');
                var factorXs = (dataFactorXs) ? dataFactorXs : options.factorXs;
                return (factorXs) ? factorXs : factor;
            }
            else if (width <= 768) {
                var dataFactorSm = elem.data('paroller-factor-sm');
                var factorSm = (dataFactorSm) ? dataFactorSm : options.factorSm;
                return (factorSm) ? factorSm : factor;
            }
            else if (width <= 1024) {
                var dataFactorMd = elem.data('paroller-factor-md');
                var factorMd = (dataFactorMd) ? dataFactorMd : options.factorMd;
                return (factorMd) ? factorMd : factor;
            }
            else if (width <= 1200) {
                var dataFactorLg = elem.data('paroller-factor-lg');
                var factorLg = (dataFactorLg) ? dataFactorLg : options.factorLg;
                return (factorLg) ? factorLg : factor;
            } else if (width <= 1920) {
                var dataFactorXl = elem.data('paroller-factor-xl');
                var factorXl = (dataFactorXl) ? dataFactorXl : options.factorXl;
                return (factorXl) ? factorXl : factor;
            } else {
                return factor;
            }
        },
        bgOffset: function (offset, factor) {
            return Math.round(offset * factor);
        },
        transform: function (offset, factor, windowHeight, height) {
            return Math.round((offset - (windowHeight / 2) + height) * factor);
        }
    };

    var clearPositions = {
        background: function (elem) {
            return elem.css({'background-position': 'unset'});
        },
        foreground: function (elem) {
            return elem.css({
                'transform' : 'unset',
                'transition' : 'unset'
            });
        }
    };

    jQuery.fn.paroller = function (options) {
        var windowHeight = jQuery(window).height();
        var documentHeight = jQuery(document).height();

        // default options
        var options = jQuery.extend({
            factor: 0, // - to +
            factorXs: 0, // - to +
            factorSm: 0, // - to +
            factorMd: 0, // - to +
            factorLg: 0, // - to +
            factorXl: 0, // - to +
            transition: 'transform .1s ease', // CSS transition
            type: 'background', // foreground
            direction: 'vertical' // horizontal
        }, options);

        return this.each(function () {
            var $this = jQuery(this);
            var width = jQuery(window).width();
            var offset = $this.offset().top;
            var height = $this.outerHeight();

            var dataType = $this.data('paroller-type');
            var dataDirection = $this.data('paroller-direction');
            var dataTransition = $this.data('paroller-transition');
            var oldTransform = $this.css('transform');

            var transition = (dataTransition) ? dataTransition : options.transition;
            var type = (dataType) ? dataType : options.type;
            var direction = (dataDirection) ? dataDirection : options.direction;
            var factor = 0;
            var bgOffset = setMovement.bgOffset(offset, factor);
            var transform = setMovement.transform(offset, factor, windowHeight, height);

            if (type === 'background') {
                if (direction === 'vertical') {
                    setDirection.bgVertical($this, bgOffset);
                }
                else if (direction === 'horizontal') {
                    setDirection.bgHorizontal($this, bgOffset);
                }
            }
            else if (type === 'foreground') {
                if (direction === 'vertical') {
                    setDirection.vertical($this, transform, transition, oldTransform);
                }
                else if (direction === 'horizontal') {
                    setDirection.horizontal($this, transform, transition, oldTransform);
                }
            }

          jQuery(window).on('resize', function () {
                var scrolling = jQuery(this).scrollTop();
                width = jQuery(window).width();
                offset = $this.offset().top;
                height = $this.outerHeight();
                factor = setMovement.factor($this, width, options);

                bgOffset = Math.round(offset * factor);
                transform = Math.round((offset - (windowHeight / 2) + height) * factor);

                if (! working) {
                    window.requestAnimationFrame(scrollAction);
                    working = true;
                }

                if (type === 'background') {
                    clearPositions.background($this);
                    if (direction === 'vertical') {
                        setDirection.bgVertical($this, bgOffset);
                    }
                    else if (direction === 'horizontal') {
                        setDirection.bgHorizontal($this, bgOffset);
                    }
                }
                else if ((type === 'foreground') && (scrolling <= documentHeight)) {
                    clearPositions.foreground($this);
                    if (direction === 'vertical') {
                        setDirection.vertical($this, transform, transition);
                    }
                    else if (direction === 'horizontal') {
                        setDirection.horizontal($this, transform, transition);
                    }
                }
            });

          jQuery(window).on('scroll', function () {
                var scrolling = jQuery(this).scrollTop();
                var scrollTop = jQuery(document).scrollTop();

                // if (scrollTop === 0) {
                //     factor = 0;
                // } else {
                    factor = setMovement.factor($this, width, options);
                // }

                bgOffset = Math.round((offset - scrolling) * factor);
                transform = Math.round(((offset - (windowHeight / 2) + height) - scrolling) * factor);

                if (! working) {
                    window.requestAnimationFrame(scrollAction);
                    working = true;
                }

                if (type === 'background') {
                    if (direction === 'vertical') {
                        setDirection.bgVertical($this, bgOffset);
                    }
                    else if (direction === 'horizontal') {
                        setDirection.bgHorizontal($this, bgOffset);
                    }
                }
                else if ((type === 'foreground') && (scrolling <= documentHeight)) {
                    if (direction === 'vertical') {
                        setDirection.vertical($this, transform, transition, oldTransform);
                    }
                    else if (direction === 'horizontal') {
                        setDirection.horizontal($this, transform, transition, oldTransform);
                    }
                }
            });
        });
    };
});

// const paroller = require('paroller.js');
import NavPrimary from '../organisms/nav-primary/_nav-primary';
import HeroScroll from '../organisms/hero-non-profit/hero-scroll';
// import HeroV5 from '../organisms/hero-v5/hero-v5';
// import Form from '../organisms/form-bac/form';
import TestimonialSlider from '../organisms/testimonials/testimonial-slider';
import HomeSlider from '../organisms/home-slider/home-slider';
import SocialShare from '../organisms/social/social-share';
import KnowledgeSidebar from '../organisms/knowledge-sidebar/knowledge-sidebar';
import knowledgeFaqHashtag from './knowledge-faq/knowledge-faq';

import AnimateNumbers from './home-metrics/home-metrics';
import EggCalculator from './calculator/egg-calculator';
import EggCalculatorComparison from './calculator/egg-calculator-comparison';

import TestimonialSliderNew from '../organisms/testimonials-new/testimonial-slider-new';

import NavSecondary from '../organisms/nav-secondary/_nav-secondary';
import HeaderPopup from '../organisms/header/popup';
import CookiesPolicySimplified from "./header/popup-cookies";
// import SearchOnPage from '../organisms/search-on-page/_search-on-page';
import SearchOnPageDeep from '../organisms/search-on-page/_search-on-page-deep';
import MenuAccordionSwitcher from '../organisms/resources-faq/_menu-accordion-switcher';

import LegalSimpleAccordion from "./legal-components/simple-accordion";
import LegalScrollSpy from "./legal-components/scroll-spy";

import SimpleTabs from "./js-tabs/js-tabs";
import HorizontalScrollSection from "./js-hs-section/js-hs-section";

import Swiper, { Navigation } from "swiper";
import JsEmbedVideoCover from "./js-embed-video-cover/js-embed-video-cover";
import JsSelectElement from "./js-select-element/js-select-element";

const store = require('store');
import rallax from 'rallax.js'

import SimpleBar from 'simpleBar';
import EventsOverview from "./events-overview/events-overview";

export default () => {


    new EventsOverview();

    new NavPrimary();
    new HorizontalScrollSection();
    new SimpleTabs();
    new HeroScroll($('.js-hero-scroll'));

    // new HeroV5();
    // new Form();
    if ($('.pb-hero-v5').attr('style')) {
        $('.pb-hero-v5').parent().parent().css('background-color', 'transparent');
    }
    if ($('.form-bac.gform_legacy_markup .gform_footer').length) {
        $('.form-bac.gform_legacy_markup .gform_footer').append($('.text-move-after-submit'));
    }

    new KnowledgeSidebar($('#knowledge'));
    new AnimateNumbers($('.o__home-metrics.animation'));
    new SocialShare();
    new JsEmbedVideoCover();
    new EggCalculator({
        form: '[data-calc-role="form"]',
        form_egg_qty: '[name="calc_eggs-qty"]',
        form_age: '[name="calc_age"]',
        form_prior_pregnancy: '[name="calc_prior-pregnancy"]',
        result_chance_live_birth: '[data-calc-role="chance_live_birth"]',
        result_chance_1_child: '[data-calc-role="chance_1_child"]',
        result_chance_2_child: '[data-calc-role="chance_2_child"]',
        result_chance_3_child: '[data-calc-role="chance_3_child"]',
    });
    new EggCalculatorComparison({
        form: '[data-calc-role="form-calc-comp"]',
        form_egg_qty: '[name="calc_eggs-qty"]',
        form_age: '[name="calc_age"]',
        form_prior_pregnancy: '[name="calc_prior-pregnancy"]',
        results_chance_live_birth: '[data-calc-role="item_chance_live_birth"]',
        results_chance_live_birth_info: '[data-calc-role="info_item_chance_live_birth"]',
        results_chance_2plus_children: '[data-calc-role="item_chance_2plus_children"]',
        results_chance_2plus_children_info: '[data-calc-role="info_item_chance_2plus_children"]',
        results_txt: '[data-calc-txt-item]',
        results_txt_one: '[data-calc-txt-item-number-1]',
        results_txt_2plus: '[data-calc-txt-item-number-2]',
    });
    $('.testimonials').each((i, el) => new TestimonialSlider(el));
    $('[data-home-slider]').each((i, el) => new HomeSlider(el));
    knowledgeFaqHashtag();

    new JsSelectElement();

    new TestimonialSliderNew();

    // new SearchOnPage();
    new SearchOnPageDeep();

    new MenuAccordionSwitcher();

    new NavSecondary({
        stickyClass: 'o__videos-nav-fixed',
        offsetToSticky: 60,
        offsetScrollSpy: 65,
        spyActiveClass: 'active',
    });

    new HeaderPopup({
        popup: '.header-popup',
        btn: '.header-popup__btn',
        close: '.header-popup__x',
    });

    new CookiesPolicySimplified({
        popup: '.cookies-popup',
        close: '.cookies-popup__ok',
        hash_key: 'cookies_accept_hash',
    });


    // home popover
    let homePopoverClose = $('[data-home-popover-close]');
    if (homePopoverClose.length) {
        if (store.get('home_popover') != true) {
            homePopoverClose.closest('.home-popover').addClass('on');
            homePopoverClose.on('click', function(event) {
                store.set('home_popover', true);
                $(this).closest('.home-popover').removeClass('on');
            });
        }
    }

    // let accordionContentBlocks = $('.o__rfaq-topic [data-role="accordion-content"]');
    // if (accordionContentBlocks.length) accordionContentBlocks.slideUp();

    new LegalSimpleAccordion();
    new LegalScrollSpy();

    // -- Workable
    setTimeout(() => {
        let workableBox = $('#whr_embed_hook');
        if (workableBox.length) {
            workableBox.find('.whr-title a').attr('target', '_blank');
        }
    }, 2000);

    // Swipers

    let testimonialSwiper = $('.testimonial-swiper');
    if (testimonialSwiper.length) {
        new Swiper(testimonialSwiper.get(0), {
            modules: [Navigation],
            direction: 'horizontal',
            loop: true,
            slidesPerView: 1,
            navigation: {
                nextEl: testimonialSwiper.find('.swiper-button-next').get(0),
                prevEl: testimonialSwiper.find('.swiper-button-prev').get(0),
            },
        });
    }

    // REVIEWS SWIPER start
    let reviewsSwiper = $('.reviews-slider__swiper');
    if (reviewsSwiper.length) {
        new Swiper(reviewsSwiper.get(0), {
            modules: [Navigation],
            direction: 'horizontal',
            loop: true,
            slidesPerView: 2,
            spaceBetween: 50,
            navigation: {
                nextEl: reviewsSwiper.find('.swiper-button-next').get(0),
                prevEl: reviewsSwiper.find('.swiper-button-prev').get(0),
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 50
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 50
                }
            }
        });
    }
    // REVIEWS SWIPER end

    let teamSwipers = $('.team-swiper');
    if (teamSwipers.length) {
        let teamSwiperObjects = [];

        for (let i = 0; i < teamSwipers.length; i++) {
            let tSwiper = $(teamSwipers[i]);
            teamSwiperObjects.push(
                new Swiper(tSwiper.find('.swiper-container').get(0), {
                    direction: 'horizontal',
                    loop: false,
                    observer: true,
                    observeParents: true,
                    slidesPerView: 4,
                    centerInsufficientSlides: true,
                    navigation: {
                        nextEl: tSwiper.find('.swiper-button-next').get(0),
                        prevEl: tSwiper.find('.swiper-button-prev').get(0),
                    },
                    breakpoints: {
                        480: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        760: {
                            slidesPerView: 2,
                            spaceBetween: 30
                        },
                        980: {
                            slidesPerView: 3,
                            spaceBetween: 40
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 40
                        }
                    },
                })
            );
        }
    }


    // --
    // -- Smooth Scroll
    // --
    $('a[href*="#id-"]').on('click', function(event) {
        event.preventDefault();
        let target = $($(this).attr("href"));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 60
            }, 1000);
        }
    });


    $('a[href*="#scroll-vw-"]').on('click', function(event) {
        event.preventDefault();
        let targetMultiplier = parseFloat($(this).attr("href").replace('#scroll-vw-', ''));
        let target = targetMultiplier * window.innerWidth + $(window).scrollTop();
        $('html, body').animate({
            scrollTop: target
        }, 1000);
    });

    // --
    // -- Smooth Scroll (Form BAC)
    // --
    if ($('.form-bac').length) {
        // console.log('form found!')
        $('html, body').animate({
            scrollTop: 0
        }, 100);
    } else {
        // console.log('form NOT found!')
    }

    // --
    // -- Form BAC Modal
    // --
    $('[data-fbac-modal-open]').on('click', function(event) {
        event.preventDefault();
        let m_target = $($(this).attr('data-fbac-modal-open'));
        if (m_target.length) m_target.addClass('on');
    });
    $('[data-fbac-modal-x], [data-fbac-modal-bg]').on('click', function(event) {
        event.preventDefault();
        let m_target = $(this).parents('[data-fbac-modal]');
        if (m_target.length) m_target.removeClass('on');
    });


    // --
    // -- Form BAC buttons & Progress Fix
    // --
    let fbac = $('.form-bac');
    let fbac_fix_els = $('.form-bac__call-us-btn, .form-bac .gf_progressbar_wrapper, .form-bac .gform_page .gform_page_footer');
    let fbac_w = $(window);

    fbac_w.on('resize scroll load', function(event) {
        if (fbac_w.outerWidth() >= 1200) {
            if (fbac.length && fbac.outerHeight() > (fbac_w.outerHeight() - 60)) {
                if ((fbac_w.scrollTop() + fbac_w.outerHeight()) < (fbac.offset().top + fbac.outerHeight())) {
                    fbac_fix_els.addClass('form-bac__fix');
                } else {
                    fbac_fix_els.removeClass('form-bac__fix');
                }
            }
        }
    });

    // --
    // -- Form BAC auto-proceed
    // --
    let fbac_auto_proceed_triggers = $('.form-bac__box-your-goals [type=radio], .form-bac__box-relationships [type=radio], .form-bac__box-state [type=radio], .form-bac__box-btn-lg [type=radio], .form-bac__box-provider-type [type=radio], .form-bac__box-appointment-type [type=radio], .form-bac__box-provider-selection [type=radio]');
    fbac_auto_proceed_triggers.on('change', function(event) {
        // console.log('clicked label')
        fbac.trigger('submit', [true]);
    });

    // --
    // -- Form BAC chat open
    // --
    $('.form-bac__call-us-btn').on('click', function(event) {
        event.preventDefault();
        $('.embeddedServiceHelpButton .uiButton.helpButtonEnabled').trigger('click');
        console.log('clicked here!');
    });

    // --
    // -- Calculator demo
    // --
    $('.pb-descr-i__demo-layer, .pb-descr-i__demo-layer-1, .pb-descr-i__demo-layer-2').on('click', function() {
        $('.pb-descr-i__demo-layer, .pb-descr-i__demo-layer-1, .pb-descr-i__demo-layer-2').fadeOut();
    });

    // --
    // -- Parallax
    // --
    // const parallax = rallax('.rallax', {
    //   speed: -0.2
    // })
    // console.dir(paroller)
    // if ($(window).width() >= 1200) {


    // --
    // -- Campaing tracking
    // --


    function getQueryStringParame(param) { // Function to extract parameters from URL string to JS variable
        let url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (let i = 0; i < url.length; i++) {
            let urlparam = url[i].split('=');
            if (urlparam[0].toLowerCase() == param) return urlparam[1];
        }
        return false;
    }

    // -- Remembering the CampaingID (no matter on what page we have the CID parameter in URL)

    let spring_cid_param = 'cid'; // Name of the URL Param
    let spring_cid_key = 'spring_campaing_id'; // Name of the param in Local Storage
    let spring_cid_key_exp = 'spring_campaing_id_exp'; // Name of the param for expiration date in Local Storage

    let spring_cid_val = getQueryStringParame(spring_cid_param); // CampaingID, extacted from the URL
    if (spring_cid_val != false) { // If we have CampaingID
        store.set(spring_cid_key, spring_cid_val); // Save CampaingID to Local Storage
        let spring_cid_exp_date = new Date((new Date).getTime() + 86400000 * 60); // Expiration date (60 days)
        store.set(spring_cid_key_exp, spring_cid_exp_date.toUTCString()); // Save Expiration date to Local Storage
    }

    // -- Inserting the Campaing ID to the Book a Consult form (form ID 'gform_2', input name 'input_14')

    let spring_cid_input = $('#gform_2 input[type="hidden"][name="input_14"], #gform_29 input[type="hidden"][name="input_15"]'); // Find our hidden input on the page
    if (spring_cid_input.length) { // If we found the needed input
        let spring_cid_val = store.get(spring_cid_key); // Extract CampaingID from Local Storage
        let spring_cid_exp = new Date(store.get(spring_cid_key_exp)); // Extract Expiration Date from Local Storage
        if (spring_cid_val != false && (new Date()) < spring_cid_exp) { // If CID exists & Expiration is not reached
            spring_cid_input.val(spring_cid_val); // Set CID to the hidden field
        } else { // If CID is empty or Expiration date is reached - clear Local Storage
            store.set(spring_cid_key, null);
            store.set(spring_cid_key_exp, null);
        }
    }


    // --
    // -- Team tabs - scroll
    // --
    // let team_tabs_els = $('[data-s-tab-id]');
    // let team_tab_param = getQueryStringParame('location');
    // if ($(window).width() < 800 && team_tabs_els.length && team_tab_param) {
    //   let team_tab_target = $('[data-s-tab-id="' + team_tab_param + '"]');
    //   setTimeout(() => {
    //     if (team_tab_target.length) {
    //       $('html, body').animate({
    //         scrollTop: team_tab_target.offset().top - 60
    //       }, 1);
    //     }
    //   }, 1000);
    // }
}
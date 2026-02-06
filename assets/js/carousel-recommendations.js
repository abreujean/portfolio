/**
 * Recommendations Carousel Component
 * SwiperJS carousel for testimonials/reviews
 *
 * @package Portfolio
 * @version 1.0.0
 */

(function() {
    'use strict';

    // ============================================================
    // RECOMMENDATIONS CAROUSEL MODULE
    // ============================================================

    /**
     * Recommendations Carousel Module
     * Encapsulates all testimonials carousel functionality
     */
    const RecommendationsCarousel = {
        /**
         * Configuration for the recommendations carousel
         */
        config: {
            autoplayDelay: 3000,
            autoplayDisableOnInteraction: false,
            spaceBetween: 32,
            swiper: null
        },

        /**
         * Initialize the recommendations carousel
         */
        init: function() {
            // Check if recommendations carousel exists
            if (!document.querySelector('.testimonials-swiper')) {
                return;
            }

            // Initialize Swiper instance
            this.initSwiper();
        },

        /**
         * Initialize SwiperJS for testimonials carousel
         */
        initSwiper: function() {
            this.config.swiper = new Swiper('.testimonials-swiper', {
                slidesPerView: 1,
                spaceBetween: this.config.spaceBetween,
                loop: false,
                autoplay: {
                    delay: this.config.autoplayDelay,
                    disableOnInteraction: this.config.autoplayDisableOnInteraction,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: this.config.spaceBetween,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: this.config.spaceBetween,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: this.config.spaceBetween,
                    },
                },
            });
        },

        /**
         * Get the swiper instance
         * @returns {Object} Swiper instance
         */
        getSwiper: function() {
            return this.config.swiper;
        },

        /**
         * Navigate to next slide
         * @param {number} speed - Transition speed in ms
         */
        slideNext: function(speed = 300) {
            if (this.config.swiper) {
                this.config.swiper.slideNext(speed);
            }
        },

        /**
         * Navigate to previous slide
         * @param {number} speed - Transition speed in ms
         */
        slidePrev: function(speed = 300) {
            if (this.config.swiper) {
                this.config.swiper.slidePrev(speed);
            }
        },

        /**
         * Go to specific slide
         * @param {number} index - Slide index
         * @param {number} speed - Transition speed in ms
         */
        slideTo: function(index, speed = 300) {
            if (this.config.swiper) {
                this.config.swiper.slideTo(index, speed);
            }
        },

        /**
         * Enable autoplay
         */
        autoplayStart: function() {
            if (this.config.swiper && this.config.swiper.autoplay) {
                this.config.swiper.autoplay.start();
            }
        },

        /**
         * Disable autoplay
         */
        autoplayStop: function() {
            if (this.config.swiper && this.config.swiper.autoplay) {
                this.config.swiper.autoplay.stop();
            }
        }
    };

    // ============================================================
    // INITIALIZATION
    // ============================================================

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            RecommendationsCarousel.init();
        });
    } else {
        RecommendationsCarousel.init();
    }

    // Export to global scope for external access
    window.RecommendationsCarousel = RecommendationsCarousel;

})();

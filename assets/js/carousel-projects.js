/**
 * Projects Carousel Component
 * SwiperJS carousel for portfolio projects with filter functionality
 *
 * @package Portfolio
 * @version 1.0.0
 */

(function() {
    'use strict';

    // ============================================================
    // PROJECTS CAROUSEL MODULE
    // ============================================================

    /**
     * Projects Carousel Module
     * Encapsulates all portfolio carousel functionality
     */
    const ProjectsCarousel = {
        /**
         * Configuration for the projects carousel
         */
        config: {
            autoplayDelay: 3000,
            autoplayDisableOnInteraction: false,
            spaceBetween: 5,
            navigationEnabled: true,
            swiper: null
        },

        /**
         * Initialize the projects carousel
         */
        init: function() {
            // Check if projects carousel exists
            if (!document.querySelector('.projects-swiper')) {
                return;
            }

            // Initialize Swiper instance
            this.initSwiper();

            // Initialize filter functionality
            this.initFilter();
        },

        /**
         * Initialize SwiperJS for projects carousel
         */
        initSwiper: function() {
            this.config.swiper = new Swiper('.projects-swiper', {
                slidesPerView: 1,
                spaceBetween: this.config.spaceBetween,
                centeredSlides: false,
                loop: false,
                slidesPerGroup: 1,
                autoplay: {
                    delay: this.config.autoplayDelay,
                    disableOnInteraction: this.config.autoplayDisableOnInteraction,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: false,
                },
                navigation: {
                    nextEl: '.carousel-nav.next',
                    prevEl: '.carousel-nav.prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: this.config.spaceBetween,
                        slidesPerGroup: 1,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: this.config.spaceBetween,
                        slidesPerGroup: 1,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: this.config.spaceBetween,
                        slidesPerGroup: 1,
                    },
                },
            });
        },

        /**
         * Initialize projects filter functionality
         * Filters slides by category (apps/sites)
         */
        initFilter: function() {
            const filterButtons = document.querySelectorAll('.projects-filter .filter-btn');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const filter = button.dataset.filter;

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');

                    // Filter slides
                    this.filterSlides(filter);

                    // Update swiper
                    if (this.config.swiper) {
                        this.config.swiper.update();
                    }
                });
            });
        },

        /**
         * Filter swiper slides by category
         * @param {string} filter - Category to filter by ('apps' or 'sites')
         */
        filterSlides: function(filter) {
            const slides = document.querySelectorAll('.swiper-slide');

            slides.forEach(slide => {
                const category = slide.dataset.category;

                if (filter === 'apps' && category === 'apps') {
                    slide.style.display = 'block';
                } else if (filter === 'sites' && category === 'sites') {
                    slide.style.display = 'block';
                } else {
                    slide.style.display = 'none';
                }
            });
        },

        /**
         * Get the swiper instance
         * @returns {Object} Swiper instance
         */
        getSwiper: function() {
            return this.config.swiper;
        }
    };

    // ============================================================
    // INITIALIZATION
    // ============================================================

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            ProjectsCarousel.init();
        });
    } else {
        ProjectsCarousel.init();
    }

    // Export to global scope for external access
    window.ProjectsCarousel = ProjectsCarousel;

})();

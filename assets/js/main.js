/**
 * Main JavaScript File for Portfolio Theme
 *
 * Handles global functionality and component initialization
 *
 * @package Portfolio
 * @version 1.0.0
 */

(function() {
    'use strict';

    // ============================================================
    // PORTFOLIO CORE MODULE
    // ============================================================

    /**
     * Portfolio Core Application
     * Manages global functionality and coordinates component initialization
     */
    window.Portfolio = {
        /**
         * Global configuration
         */
        config: {
            smoothScroll: true,
            animatedOnScroll: true,
            mobileBreakpoint: 768,
            animationDuration: 300
        },

        /**
         * Components registry
         */
        components: {},

        /**
         * Utility functions registry
         */
        utils: {},

        /**
         * Initialize the application
         * Bootstraps all global components and feature modules
         */
        init: function() {
            console.log('Portfolio theme initialized');

            // Initialize global UI components
            this.initNavigation();
            this.initLanguageSwitcher();
            this.initScrollEffects();
            this.initAnimations();
            this.initContactForm();
            this.initBackToTop();

            // Initialize utility components
            this.initLazyLoading();
        },

        // ============================================================
        // GLOBAL UI COMPONENTS
        // ============================================================

        /**
         * Navigation Component
         * Mobile menu toggle and smooth scroll functionality
         */
        initNavigation: function() {
            const menuToggle = document.getElementById('menu-toggle');
            const menuClose = document.getElementById('menu-close');
            const primaryMenu = document.getElementById('primary-menu');
            const menuOverlay = document.getElementById('menu-overlay');

            if (!menuToggle || !primaryMenu) return;

            /**
             * Toggle mobile menu
             * @param {boolean} show - Whether to show or hide menu
             */
            function toggleMenu(show) {
                const isShown = show !== undefined ? show : !primaryMenu.classList.contains('active');

                primaryMenu.classList.toggle('active', isShown);
                menuOverlay.classList.toggle('active', isShown);
                menuToggle.setAttribute('aria-expanded', isShown);
                document.body.style.overflow = isShown ? 'hidden' : '';
            }

            // Menu toggle click
            if (menuToggle) {
                menuToggle.addEventListener('click', () => toggleMenu());
            }

            // Menu close click
            if (menuClose) {
                menuClose.addEventListener('click', () => toggleMenu(false));
            }

            // Overlay click
            if (menuOverlay) {
                menuOverlay.addEventListener('click', () => toggleMenu(false));
            }

            // Escape key to close menu
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && primaryMenu.classList.contains('active')) {
                    toggleMenu(false);
                }
            });

            // Smooth scroll for navigation links
            const navLinks = document.querySelectorAll('a[href^="#"]');
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    const targetId = link.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        e.preventDefault();
                        this.smoothScrollTo(targetElement);
                        toggleMenu(false);
                    }
                });
            });
        },

        /**
         * Language Switcher Component
         * Manages language selection and persistence
         */
        initLanguageSwitcher: function() {
            const langButtons = document.querySelectorAll('.lang');

            if (langButtons.length === 0) return;

            // Get saved language from localStorage
            const savedLang = localStorage.getItem('portfolio-lang') || 'pt';

            // Set active class based on saved language
            langButtons.forEach(button => {
                const lang = button.dataset.lang;
                if (lang === savedLang) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            });

            // Add click event listeners
            langButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const selectedLang = button.dataset.lang;

                    // Update active class on all buttons
                    langButtons.forEach(btn => {
                        if (btn.dataset.lang === selectedLang) {
                            btn.classList.add('active');
                        } else {
                            btn.classList.remove('active');
                        }
                    });

                    // Save selected language to localStorage
                    localStorage.setItem('portfolio-lang', selectedLang);

                    // Dispatch custom event for other scripts to listen
                    document.dispatchEvent(new CustomEvent('portfolio-lang-change', {
                        detail: { lang: selectedLang }
                    }));
                });
            });
        },

        /**
         * Scroll Effects Component
         * Adds background blur to header on scroll
         */
        initScrollEffects: function() {
            let lastScrollY = window.scrollY;
            const header = document.getElementById('site-header');

            if (!header) return;

            // Header scroll effect
            window.addEventListener('scroll', () => {
                const currentScrollY = window.scrollY;

                // Add/remove background blur
                if (currentScrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }

                lastScrollY = currentScrollY;
            });
        },

        /**
         * Animations on Scroll Component
         * Adds animate-in class when elements enter viewport
         */
        initAnimations: function() {
            if (!this.config.animatedOnScroll) return;

            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, observerOptions);

            // Observe elements for animation
            const animatedElements = document.querySelectorAll('.animate-on-scroll');
            animatedElements.forEach(el => observer.observe(el));
        },

        // ============================================================
        // FORM COMPONENTS
        // ============================================================

        /**
         * Contact Form Component
         * Handles form submission via AJAX
         */
        initContactForm: function() {
            const form = document.getElementById('portfolio-contact-form');

            if (!form) return;

            form.addEventListener('submit', (e) => {
                e.preventDefault();

                const formData = new FormData(form);
                const submitBtn = form.querySelector('button[type="submit"]');
                const messagesDiv = document.getElementById('form-messages');

                // Show loading state
                submitBtn.disabled = true;
                submitBtn.textContent = 'Sending...';

                // Clear previous messages
                if (messagesDiv) {
                    messagesDiv.innerHTML = '';
                    messagesDiv.className = 'form-messages';
                }

                // Submit form via AJAX
                this.submitContactForm(formData)
                    .then(response => {
                        if (response.success) {
                            this.showFormMessage('Message sent successfully!', 'success');
                            form.reset();
                        } else {
                            this.showFormMessage(response.message || 'Error sending message.', 'error');
                        }
                    })
                    .catch(error => {
                        this.showFormMessage('Network error. Please try again.', 'error');
                        console.error('Contact form error:', error);
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Send Message';
                    });
            });
        },

        /**
         * Submit contact form via AJAX
         * @param {FormData} formData - Form data to submit
         * @returns {Promise} Response from server
         */
        submitContactForm: async function(formData) {
            try {
                const response = await fetch(portfolio_ajax.ajax_url, {
                    method: 'POST',
                    body: formData
                });

                return await response.json();
            } catch (error) {
                throw error;
            }
        },

        /**
         * Show form message
         * @param {string} message - Message to display
         * @param {string} type - Message type ('success' or 'error')
         */
        showFormMessage: function(message, type) {
            const messagesDiv = document.getElementById('form-messages');
            if (!messagesDiv) return;

            messagesDiv.innerHTML = `<div class="message message-${type}">${message}</div>`;
            messagesDiv.className = `form-messages show message-${type}`;

            // Auto hide after 5 seconds
            setTimeout(() => {
                messagesDiv.className = 'form-messages';
            }, 5000);
        },

        // ============================================================
        // UTILITY COMPONENTS
        // ============================================================

        /**
         * Back to Top Button Component
         * Shows/hides button based on scroll position
         */
        initBackToTop: function() {
            const backToTopBtn = document.getElementById('back-to-top');

            if (!backToTopBtn) return;

            // Show/hide button based on scroll
            window.addEventListener('scroll', () => {
                if (window.scrollY > 500) {
                    backToTopBtn.classList.add('show');
                } else {
                    backToTopBtn.classList.remove('show');
                }
            });

            // Scroll to top
            backToTopBtn.addEventListener('click', () => {
                this.smoothScrollTo(document.documentElement);
            });
        },

        /**
         * Lazy Loading for Images Component
         * Loads images when they enter viewport
         */
        initLazyLoading: function() {
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src || img.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    });
                });

                document.querySelectorAll('img[loading="lazy"]').forEach(img => {
                    imageObserver.observe(img);
                });
            }
        },

        // ============================================================
        // UTILITY FUNCTIONS
        // ============================================================

        /**
         * Smooth scroll to element
         * @param {HTMLElement} element - Target element to scroll to
         */
        smoothScrollTo: function(element) {
            const targetY = element.offsetTop - 80; // Account for fixed header

            window.scrollTo({
                top: targetY,
                behavior: 'smooth'
            });
        },

        /**
         * Debounce function
         * Delays function execution until after wait milliseconds
         * @param {Function} func - Function to debounce
         * @param {number} wait - Wait time in milliseconds
         * @returns {Function} Debounced function
         */
        debounce: function(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        },

        /**
         * Throttle function
         * Limits function execution to once every limit milliseconds
         * @param {Function} func - Function to throttle
         * @param {number} limit - Time limit in milliseconds
         * @returns {Function} Throttled function
         */
        throttle: function(func, limit) {
            let inThrottle;
            return function() {
                const args = arguments;
                const context = this;
                if (!inThrottle) {
                    func.apply(context, args);
                    inThrottle = true;
                    setTimeout(() => inThrottle = false, limit);
                }
            };
        },

        /**
         * Get current language
         * @returns {string} Current language or default 'pt'
         */
        getCurrentLanguage: function() {
            return localStorage.getItem('portfolio-lang') || 'pt';
        },

        /**
         * Set language
         * @param {string} lang - Language to set
         * @returns {string} Set language
         */
        setLanguage: function(lang) {
            localStorage.setItem('portfolio-lang', lang);
            return lang;
        }
    };

    // ============================================================
    // INITIALIZATION
    // ============================================================

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            Portfolio.init();
        });
    } else {
        Portfolio.init();
    }

})();

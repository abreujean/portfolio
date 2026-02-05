/**
 * Main JavaScript File for Portfolio Theme
 * 
 * Handles global functionality and component initialization
 */

(function() {
    'use strict';

    // Portfolio App Object
    window.Portfolio = {
        // Configuration
        config: {
            smoothScroll: true,
            animatedOnScroll: true,
            mobileBreakpoint: 768,
            animationDuration: 300
        },

        // Components registry
        components: {},
        
        // Utility functions
        utils: {},
        
        // Initialize all components
        init: function() {
            console.log('Portfolio theme initialized');
            
            // Initialize components
            this.initNavigation();
            this.initLanguageSwitcher();
            this.initScrollEffects();
            this.initAnimations();
            this.initContactForm();
            this.initBackToTop();
            
            // Initialize custom components when DOM is ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', this.initComponents.bind(this));
            } else {
                this.initComponents();
            }
        },

        // Initialize all components
        initComponents: function() {
            // Portfolio carousel
            if (document.querySelector('.projects-swiper')) {
                this.initProjectsCarousel();
            }

            // Portfolio filter
            if (document.querySelector('.portfolio-filters')) {
                this.initPortfolioFilter();
            }

            // Skills filter
            if (document.querySelector('.skills-categories')) {
                this.initSkillsFilter();
            }

            // Recommendations carousel
            if (document.querySelector('.testimonials-swiper')) {
                this.initRecommendationsCarousel();
            }

            // Lazy loading for images
            this.initLazyLoading();
        },

        // Navigation functionality
        initNavigation: function() {
            const menuToggle = document.getElementById('menu-toggle');
            const menuClose = document.getElementById('menu-close');
            const primaryMenu = document.getElementById('primary-menu');
            const menuOverlay = document.getElementById('menu-overlay');

            if (!menuToggle || !primaryMenu) return;

            // Toggle mobile menu
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

        // Language Switcher functionality
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

        // Scroll effects
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

        // Animations on scroll
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

        // Contact form handling
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

        // Submit contact form via AJAX
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

        // Show form message
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

        // Portfolio carousel functionality
        initProjectsCarousel: function() {
            const projectsSwiper = new Swiper('.projects-swiper', {
                slidesPerView: 1,
                spaceBetween: 5,
                centeredSlides: false,
                loop: true,
                loopAdditionalSlides: 1,
                slidesPerGroup: 1,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.carousel-nav.next',
                    prevEl: '.carousel-nav.prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 5,
                        slidesPerGroup: 1,
                        loopAdditionalSlides: 2,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 5,
                        slidesPerGroup: 1,
                        loopAdditionalSlides: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 5,
                        slidesPerGroup: 1,
                        loopAdditionalSlides: 2,
                    },
                },
            });

            // Filter functionality
            const filterButtons = document.querySelectorAll('.projects-filter .filter-btn');
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const filter = button.dataset.filter;

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');

                    // Filter slides
                    const slides = document.querySelectorAll('.swiper-slide');
                    slides.forEach(slide => {
                        if (filter === 'apps' && slide.dataset.category === 'apps') {
                            slide.style.display = 'block';
                        } else if (filter === 'sites' && slide.dataset.category === 'sites') {
                            slide.style.display = 'block';
                        } else {
                            slide.style.display = 'none';
                        }
                    });

                    // Update swiper
                    projectsSwiper.update();
                });
            });
        },

        // Portfolio filter functionality
        initPortfolioFilter: function() {
            const filterButtons = document.querySelectorAll('.portfolio-filters .filter-btn');
            const portfolioItems = document.querySelectorAll('.portfolio-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const filter = button.dataset.filter;

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');

                    // Filter items
                    portfolioItems.forEach(item => {
                        if (filter === 'all' || item.dataset.category.includes(filter)) {
                            item.style.display = 'block';
                            setTimeout(() => item.classList.add('show'), 10);
                        } else {
                            item.classList.remove('show');
                            setTimeout(() => item.style.display = 'none', this.config.animationDuration);
                        }
                    });
                });
            });
        },

        // Skills filter functionality
        initSkillsFilter: function() {
            const categoryButtons = document.querySelectorAll('.skills-categories .category-btn');
            const skillItems = document.querySelectorAll('.skill-item');

            categoryButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const category = button.dataset.category;
                    
                    // Update active button
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    
                    // Filter skills
                    skillItems.forEach(item => {
                        if (category === 'all' || item.dataset.category === category) {
                            item.style.display = 'block';
                            setTimeout(() => item.classList.add('show'), 10);
                        } else {
                            item.classList.remove('show');
                            setTimeout(() => item.style.display = 'none', this.config.animationDuration);
                        }
                    });
                });
            });
        },

        // Recommendations carousel
        initRecommendationsCarousel: function() {
            const testimonialsSwiper = new Swiper('.testimonials-swiper', {
                slidesPerView: 1,
                spaceBetween: 32,
                loop: true,
                loopAdditionalSlides: 2,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-prev',
                    prevEl: '.swiper-button-next',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 32,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 32,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 32,
                    },
                },
            });
        },

        // Back to top button
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

        // Lazy loading for images
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

        // Smooth scroll utility
        smoothScrollTo: function(element) {
            const targetY = element.offsetTop - 80; // Account for fixed header
            
            window.scrollTo({
                top: targetY,
                behavior: 'smooth'
            });
        },

        // Utility: Debounce function
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

        // Utility: Throttle function
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

        // Utility: Get current language
        getCurrentLanguage: function() {
            return localStorage.getItem('portfolio-lang') || 'pt';
        },

        // Utility: Set language
        setLanguage: function(lang) {
            localStorage.setItem('portfolio-lang', lang);
            return lang;
        }
    };

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            Portfolio.init();
        });
    } else {
        Portfolio.init();
    }

})();

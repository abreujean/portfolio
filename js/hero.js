(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        const langButtons = document.querySelectorAll('.hero-lang .lang');

        if (!langButtons.length) return;

        langButtons.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                langButtons.forEach(function(b) {
                    b.classList.remove('active');
                });

                btn.classList.add('active');

                const lang = btn.dataset.lang;

                if (typeof portfolioHero !== 'undefined' && lang) {
                    fetch(portfolioHero.ajaxurl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'action=portfolio_switch_language&nonce=' + portfolioHero.nonce + '&lang=' + lang
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        if (data.success) {
                            window.location.reload();
                        }
                    })
                    .catch(function(error) {
                        console.error('Language switch error:', error);
                    });
                }
            });
        });
    });
})();

     <!-- Footer Section -->
     <footer id="site-footer" class="site-footer" role="contentinfo">
         <?php
         $footer_data = portfolio_get_footer_data();
         ?>
          <div class="footer-container">
              <p class="footer-copy">
                  Copyright © <?php echo esc_html($footer_data['copyright_text']); ?> · <?php echo date('Y'); ?>
              </p>

             <div class="footer-social">
                 <!-- LinkedIn -->
                 <?php if (!empty($footer_data['linkedin_url'])) : ?>
                     <a href="<?php echo esc_url($footer_data['linkedin_url']); ?>" target="_blank" rel="noopener noreferrer" class="social-link linkedin">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/linkedin.svg');?>" alt="LinkedIn">
                     </a>
                 <?php endif; ?>

                 <!-- GitHub -->
                 <?php if (!empty($footer_data['github_url'])) : ?>
                     <a href="<?php echo esc_url($footer_data['github_url']); ?>" target="_blank" rel="noopener noreferrer" class="social-link github">
                                 <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/github.svg');?>" alt="GitHub">
                     </a>
                 <?php endif; ?>

             </div>
         </div>
     </footer>

     <?php wp_footer(); ?>
 </body>
 </html>
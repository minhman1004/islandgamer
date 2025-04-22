</div><footer id="colophon" class="site-footer">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', '[text_domain_của_bạn]' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', '[text_domain_của_bạn]' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', '[text_domain_của_bạn]' ), '[Tên Theme Của Bạn]', '<a href="[Link Website Của Bạn]" rel="designer">[Tên Của Bạn]</a>' );
				?>
			</div><nav class="footer-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'depth'          => 1, // Giới hạn độ sâu menu nếu cần
					)
				);
				?>
			</nav></footer></div><?php wp_footer(); ?>
</body>
</html>
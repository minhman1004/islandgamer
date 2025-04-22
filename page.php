<?php
/**
 * Template cho trang tĩnh.
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// Nếu bạn muốn hiển thị bình luận trên trang
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><?php
get_sidebar(); // Nếu bạn có sidebar
get_footer();
<?php
/**
 * Template cho trang bài viết đơn.
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();

			// Nếu bạn muốn hiển thị bình luận
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><?php
get_sidebar(); // Nếu bạn có sidebar
get_footer();
<?php
/**
 * Template cho trang kết quả tìm kiếm.
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', '[text_domain_của_bạn]' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><?php
			/* Bắt đầu loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Include the Post-Type-specific template for the content.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><?php
get_sidebar(); // Nếu bạn có sidebar
get_footer();
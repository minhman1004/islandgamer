<?php
/**
 * Template cho trang 404 (Not Found).
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', '[text_domain_của_bạn]' ); ?></h1>
			</header><div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', '[text_domain_của_bạn]' ); ?></p>

				<?php
				get_search_form();

				the_widget( 'WP_Widget_Recent_Posts' );
				?>

				<div class="widget widget_categories">
					<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', '[text_domain_của_bạn]' ); ?></h2>
					<ul>
						<?php
						wp_list_categories(
							array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							)
						);
						?>
					</ul>
				</div><?php
				/* translators: %1$s: smiley */
				$archive_link = '<a href="' . esc_url( get_month_link( gmdate( 'Y' ), gmdate( 'm' ) ) ) . '">' . esc_html__( 'Monthly Archives', '[text_domain_của_bạn]' ) . '</a>';
				printf( '<p>%1$s</p>', sprintf( esc_html__( 'Try looking in the monthly archives. %s', '[text_domain_của_bạn]' ), $archive_link ) );
				?>

			</div></section></main><?php
get_footer();
<?php
/**
 * Functions của theme [Tên Theme Của Bạn]
 */

if ( ! function_exists( 'islandgamer_setup' ) ) :
	/**
	 * Thiết lập các tính năng hỗ trợ của theme.
	 *
	 * @return void
	 */
	function islandgamer_setup() {
		/*
		 * Hỗ trợ đa ngôn ngữ.
		 * Tìm các tệp dịch thuật trong thư mục languages/.
		 */
		load_theme_textdomain( '[text_domain_của_bạn]', get_template_directory() . '/languages' );

		// Thêm hỗ trợ cho ảnh featured.
		add_theme_support( 'post-thumbnails' );

		// Đăng ký các menu điều hướng.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', '[text_domain_của_bạn]' ),
				'footer'  => esc_html__( 'Footer Menu', '[text_domain_của_bạn]' ),
			)
		);

		/*
		 * Hỗ trợ các định dạng bài viết khác nhau.
		 * Nếu bạn không cần, có thể bỏ qua.
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		/*
		 * Hỗ trợ HTML5 cho các phần tử core.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		// Thêm hỗ trợ cho title tag tự động.
		add_theme_support( 'title-tag' );

		// Thêm hỗ trợ cho custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'islandgamer_setup' );

/**
 * Đăng ký các sidebar.
 *
 * @return void
 */
function islandgamer_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Chính', '[text_domain_của_bạn]' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Thêm các widget vào đây.', '[text_domain_của_bạn]' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Bạn có thể đăng ký thêm sidebar nếu cần
}
add_action( 'widgets_init', 'islandgamer_widgets_init' );

/**
 * Enqueue các script và style.
 *
 * @return void
 */
function islandgamer_enqueue_scripts() {
	wp_enqueue_style( 'islandgamer-style', get_stylesheet_uri() );

	wp_enqueue_script( 'islandgamer-core', get_template_directory_uri() . '/assets/js/core.js', array(), '1.0', true );
	wp_enqueue_script( 'islandgamer-utils', get_template_directory_uri() . '/assets/js/utils.js', array( 'islandgamer-core' ), '1.0', true );
	wp_enqueue_script( 'islandgamer-main', get_template_directory_uri() . '/assets/js/main.js', array( 'islandgamer-utils' ), '1.0', true );

	// Enqueue các script hiệu ứng và component khác tương tự như ví dụ trước
}
add_action( 'wp_enqueue_scripts', 'islandgamer_enqueue_scripts' );

/**
 * Include các tệp tin trong thư mục inc/.
 */
foreach ( glob( get_template_directory() . '/inc/*.php' ) as $file ) {
	require_once $file;
}

// Thêm các hàm tùy chỉnh khác của bạn ở đây
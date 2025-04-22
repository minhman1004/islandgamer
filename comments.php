<?php
/**
 * Template hiển thị bình luận.
 */

/*
 * Nếu bài viết được bảo vệ bằng mật khẩu và người dùng chưa nhập mật khẩu,
 * thì chúng ta không hiển thị form bình luận và thoát.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// Bạn có bình luận?
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( esc_html__( 'One thought on &ldquo;%s&rdquo;', '[text_domain_của_bạn]' ), '<span>' . get_the_title() . '</span>' );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comments_number, 'comments title', '[text_domain_của_bạn]' ) ),
					number_format_i18n( $comments_number ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><?php

		the_comments_navigation();

		// Nếu bình luận đã đóng và vẫn còn bình luận
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', '[text_domain_của_bạn]' ); ?></p>
			<?php
		endif;

	else :

		// Nếu không có bình luận và bình luận vẫn mở
		if ( comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Be the first to comment!', '[text_domain_của_bạn]' ); ?></p>
			<?php
		endif;

	endif; // have_comments()

	comment_form();
	?>

</div>```

**Giải thích:**

* **Kiểm tra mật khẩu:** Đoạn code đầu tiên kiểm tra xem bài viết có yêu cầu mật khẩu hay không. Nếu có và người dùng chưa nhập, nó sẽ thoát mà không hiển thị form bình luận.
* **Tiêu đề bình luận:** Hiển thị tiêu đề cho phần bình luận, bao gồm số lượng bình luận và tiêu đề bài viết. Sử dụng hàm `_nx` để xử lý số ít và số nhiều cho bản dịch.
* **Phân trang bình luận:** Nếu có nhiều bình luận, `the_comments_navigation()` sẽ hiển thị các liên kết phân trang.
* **Danh sách bình luận:** `wp_list_comments()` hiển thị danh sách các bình luận theo cấu trúc bạn chỉ định (trong trường hợp này là thẻ `<ol>`).
    * `'style' => 'ol'` chỉ định sử dụng danh sách có thứ tự.
    * `'short_ping' => true` hiển thị pingback và trackback ngắn gọn hơn.
* **Thông báo bình luận đã đóng:** Nếu bình luận đã bị tắt và vẫn còn bình luận, một thông báo sẽ được hiển thị.
* **Thông báo chưa có bình luận:** Nếu chưa có bình luận nào và bình luận vẫn đang mở, một thông báo khuyến khích người dùng bình luận đầu tiên sẽ được hiển thị.
* **Form bình luận:** `comment_form()` hiển thị form cho phép người dùng gửi bình luận. Bạn có thể tùy chỉnh form này bằng cách truyền các đối số vào hàm.

Đừng quên thay thế `[text_domain_của_bạn]` bằng text domain của theme bạn.

Đây là mã mẫu cơ bản cho `comments.php`. Bạn có thể tùy chỉnh thêm về mặt giao diện và chức năng tùy theo yêu cầu của theme.
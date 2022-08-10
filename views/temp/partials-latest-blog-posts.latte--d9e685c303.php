<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wr-wp-starter-theme/views//partials/latest-blog-posts.latte

use Latte\Runtime as LR;

final class Templated9e685c303 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<section class="more-blog-posts" aria-label="Latest Blog Posts Section">
  <div class="container">
    <h2 class="text-center mb40">Latest Blog Posts</h2>
    <div class="f-row row--3 mb40">
';
		$customPosts = new WP_Query(
		array(
		'post_type' => 'post',
		'posts_per_page' => 3,
		'orderby'        => 'DESC',
		)
		);
		while ($customPosts->have_posts()) {
			echo '        ';
			echo LR\Filters::escapeHtmlText($customPosts->the_post()) /* line 13 */;
			echo "\n";
			/* line 14 */
			$this->createTemplate(($this->global->fn->tr_view_path)('/partials/post-card'), $this->params, 'include')->renderToContentType('html');
		}
		echo '      ';
		echo LR\Filters::escapeHtmlText(wp_reset_postdata()) /* line 16 */;
		echo '
    </div><!-- end row -->
    <div class="text-center">
      <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(esc_url( home_url( '/' ) ))) /* line 19 */;
		echo 'blog" class="btn btn--brand"><span>Go to Blog</span></a>
    </div>
  </div>
</section>';
		return get_defined_vars();
	}

}

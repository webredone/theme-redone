<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/templates/index.latte */
final class Templatef7084fd250 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$this->createTemplate(tr_view_path('/layout/header'), $this->params, 'include')->renderToContentType('html') /* line 1 */;
		echo '
<section class="content">

';
		if (have_posts()) /* line 5 */ {
			while (have_posts()) /* line 6 */ {
				echo '  ';
				echo LR\Filters::escapeHtmlText(the_post()) /* line 7 */;
				echo '
  ';
				echo LR\Filters::escapeHtmlText(the_title()) /* line 9 */;
				echo '<br>
  <a href="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(the_permalink())) /* line 10 */;
				echo '">Read More</a>
  ';
				echo LR\Filters::escapeHtmlText(tr_posted_by()) /* line 11 */;
				echo '<br>
  ';
				echo LR\Filters::escapeHtmlText(tr_posted_on(true)) /* line 12 */;
				echo '<br><br>

  Excerpt: ';
				echo LR\Filters::escapeHtmlText(tr_get_excerpt(20)) /* line 14 */;
				echo '

  <hr>

';
			}
		} else /* line 19 */ {
			echo '  <h2>Nothing Found</h2>
';
		}
		echo '</section>

CUSTOM POSTS LOOP<br>
';
		$customposts = get_posts(array('numberposts' => 4)) /* line 25 */;
		$iterations = 0;
		foreach ($customposts as $post) /* line 26 */ {
			echo '  Post ID: ';
			echo LR\Filters::escapeHtmlText($post->ID) /* line 27 */;
			echo '<br>
  Title: ';
			echo LR\Filters::escapeHtmlText($post->post_title) /* line 28 */;
			echo '<br>
  ';
			echo LR\Filters::escapeHtmlText(tr_posted_on(true, $post->ID)) /* line 29 */;
			echo '<br>
  Author: ';
			echo LR\Filters::escapeHtmlText(tr_posted_by()) /* line 30 */;
			echo '<br>
';
			$iterations++;
		}
		echo "\n";
		$this->createTemplate(tr_view_path('/layout/footer'), $this->params, 'include')->renderToContentType('html') /* line 33 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['post' => '26'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}

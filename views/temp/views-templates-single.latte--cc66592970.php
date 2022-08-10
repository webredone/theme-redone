<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/templates/single.latte */
final class Templatecc66592970 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$this->createTemplate(tr_view_path('/layout/header'), $this->params, 'include')->renderToContentType('html') /* line 1 */;
		echo '
<div class="content">
';
		while (have_posts()) /* line 4 */ {
			echo '  ';
			echo LR\Filters::escapeHtmlText(the_post()) /* line 5 */;
			echo '

  ';
			echo LR\Filters::escapeHtmlText(the_title()) /* line 7 */;
			echo '
  ';
			echo LR\Filters::escapeHtmlText(the_content()) /* line 8 */;
			echo '

';
		}
		echo '</div>

';
		$this->createTemplate(tr_view_path('/layout/footer'), $this->params, 'include')->renderToContentType('html') /* line 13 */;
		return get_defined_vars();
	}

}

<?php
// source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/templates/page.latte

use Latte\Runtime as LR;

final class Templatec561561a39 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo "\n";
		/* line 2 */
		$this->createTemplate(tr_view_path('/layout/header'), $this->params, 'include')->renderToContentType('html');
		echo '
<div class="content">
';
		while (have_posts()) {
			echo '  ';
			echo LR\Filters::escapeHtmlText(the_post()) /* line 6 */;
			echo '
  
  ';
			echo LR\Filters::escapeHtmlText(the_title()) /* line 8 */;
			echo '
  ';
			echo LR\Filters::escapeHtmlText(the_content()) /* line 9 */;
			echo '

';
		}
		echo '</div>

';
		/* line 14 */
		$this->createTemplate(tr_view_path('/layout/footer'), $this->params, 'include')->renderToContentType('html');
		return get_defined_vars();
	}

}

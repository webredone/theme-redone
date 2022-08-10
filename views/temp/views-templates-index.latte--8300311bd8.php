<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wr-wp-starter-theme/views/templates/index.latte

use Latte\Runtime as LR;

final class Template8300311bd8 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		/* line 1 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/header'), $this->params, 'include')->renderToContentType('html');
		echo "\n";
		if (have_posts()) {
			while (have_posts()) {
				echo '  ';
				echo LR\Filters::escapeHtmlText(the_post()) /* line 5 */;
				echo '

  ';
				echo LR\Filters::escapeHtmlText(the_content()) /* line 7 */;
				echo '

';
			}
		}
		else {
			echo '  <h2>Nothing Found</h2>
';
		}
		echo "\n";
		/* line 14 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/footer'), $this->params, 'include')->renderToContentType('html');
		return get_defined_vars();
	}

}

<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wr-wp-starter-theme/views/templates/index.latte

use Latte\Runtime as LR;

final class Templated721f15f45 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo "\n";
		/* line 2 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/header'), $this->params, 'include')->renderToContentType('html');
		echo '  ';
		echo LR\Filters::escapeHtmlText(the_content()) /* line 3 */;
		echo "\n";
		/* line 4 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/footer'), $this->params, 'include')->renderToContentType('html');
		return get_defined_vars();
	}

}

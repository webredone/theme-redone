<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/templates/front-page.latte */
final class Templatec1b3f7dea5 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo "\n";
		$this->createTemplate(tr_view_path('/layout/header'), $this->params, 'include')->renderToContentType('html') /* line 2 */;
		echo "\n";
		$this->createTemplate(tr_part('todo-remove-examples'), $this->params, 'include')->renderToContentType('html') /* line 4 */;
		echo '




<div class="content">
	';
		echo LR\Filters::escapeHtmlText(the_content()) /* line 11 */;
		echo '
</div>


';
		$this->createTemplate(tr_view_path('/layout/footer'), $this->params, 'include')->renderToContentType('html') /* line 15 */;
		return get_defined_vars();
	}

}

<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/templates/front-page.latte */
final class Templatec1b3f7dea5 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$this->createTemplate(tr_view_path('/layout/header'), $this->params, 'include')->renderToContentType('html') /* line 1 */;
		echo "\n";
		$this->createTemplate(tr_part('todo-remove-examples'), $this->params, 'include')->renderToContentType('html') /* line 3 */;
		echo '

<div class="content">
	';
		echo LR\Filters::escapeHtmlText(the_content()) /* line 7 */;
		echo '
</div>


';
		$this->createTemplate(tr_view_path('/layout/footer'), $this->params, 'include')->renderToContentType('html') /* line 11 */;
		return get_defined_vars();
	}

}

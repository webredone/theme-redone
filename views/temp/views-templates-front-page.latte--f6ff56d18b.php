<?php
// source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme_redone/views/templates/front-page.latte

use Latte\Runtime as LR;

final class Templatef6ff56d18b extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo "\n";
		/* line 2 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/header'), $this->params, 'include')->renderToContentType('html');
		echo "\n";
		/* line 11 */
		$this->createTemplate(($this->global->fn->tr_partial)('todo-remove-examples'), $this->params, 'include')->renderToContentType('html');
		echo '




<section class="content">
	';
		echo LR\Filters::escapeHtmlText(the_content()) /* line 18 */;
		echo '
</section>


';
		/* line 22 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/footer'), $this->params, 'include')->renderToContentType('html');
		return get_defined_vars();
	}

}

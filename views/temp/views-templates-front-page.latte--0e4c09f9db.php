<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme_redone/views/templates/front-page.latte */
final class Template0e4c09f9db extends Latte\Runtime\Template
{

	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

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
	}
}

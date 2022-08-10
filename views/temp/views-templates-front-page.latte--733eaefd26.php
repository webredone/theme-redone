<?php
// source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/templates/front-page.latte

use Latte\Runtime as LR;

final class Template733eaefd26 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		/* line 1 */
		$this->createTemplate(tr_view_path('/layout/header'), $this->params, 'include')->renderToContentType('html');
		echo '

<div class="content">
	';
		echo LR\Filters::escapeHtmlText(the_content()) /* line 14 */;
		echo '
</div>


';
		/* line 18 */
		$this->createTemplate(tr_view_path('/layout/footer'), $this->params, 'include')->renderToContentType('html');
		return get_defined_vars();
	}

}

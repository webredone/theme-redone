<?php
// source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/templates/404.latte

use Latte\Runtime as LR;

final class Templated2caaf62d4 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		/* line 1 */
		$this->createTemplate(tr_view_path('/layout/header'), $this->params, 'include')->renderToContentType('html');
		echo '
<section class="content">
  404 not found
</section>

';
		/* line 7 */
		$this->createTemplate(tr_view_path('/layout/footer'), $this->params, 'include')->renderToContentType('html');
		return get_defined_vars();
	}

}

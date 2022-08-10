<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/templates/404.latte */
final class Templatea062767df1 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$this->createTemplate(tr_view_path('/layout/header'), $this->params, 'include')->renderToContentType('html') /* line 1 */;
		echo '
<section class="content">
  404 not found
</section>

';
		$this->createTemplate(tr_view_path('/layout/footer'), $this->params, 'include')->renderToContentType('html') /* line 7 */;
		return get_defined_vars();
	}

}

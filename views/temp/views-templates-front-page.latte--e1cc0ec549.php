<?php
// source: C:\xampp\htdocs\wr-wp-starter/wp-content/themes/theme_redone_theme/views/templates/front-page.latte

use Latte\Runtime as LR;

final class Templatee1cc0ec549 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo "\n";
		/* line 2 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/header'), $this->params, 'include')->renderToContentType('html');
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

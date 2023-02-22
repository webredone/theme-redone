<?php

use Latte\Runtime as LR;

/** source: /home/nikola/Local Sites/themeredone/app/public/wp-content/themes/themeredone/views/templates/front-page.latte */
final class Template2113dab1eb extends Latte\Runtime\Template
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

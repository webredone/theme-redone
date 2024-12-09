<?php

use Latte\Runtime as LR;

/** source: /Users/nikolaivanov/Local Sites/themeredone/app/public/wp-content/themes/theme-redone/gutenberg/blocks/repeater-fields-grid/view.latte */
final class Template_750036ceec extends Latte\Runtime\Template
{
	public const Source = '/Users/nikolaivanov/Local Sites/themeredone/app/public/wp-content/themes/theme-redone/gutenberg/blocks/repeater-fields-grid/view.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '  <div><pre>';
		echo LR\Filters::escapeHtmlText(var_dump($test_rep_with_defaults)) /* line 1 */;
		echo '</pre></div>

<h1 class="margin-top: 100px;">Repeater Fields Grid</h1>


';
	}
}

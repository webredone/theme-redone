<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme-redone\gutenberg\blocks\image/view.latte */
final class Template65682b0e06 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		if ($link['url']) /* line 1 */ {
			echo '	<a ';
			echo tr_a($link, "wp-figure-link", true) /* line 2 */;
			echo '>
';
		}
		echo '
	<figure class="wp-figure wp-figure-test">
		';
		echo LR\Filters::escapeHtmlText(tr_get_media($image, true)) /* line 6 */;
		echo "\n";
		if (strlen($caption['text'])) /* line 7 */ {
			echo '			<figcaption class="wp-figcaption">
				';
			echo LR\Filters::escapeHtmlText($caption['text']) /* line 9 */;
			echo '
			</figcaption>
';
		}
		echo '	</figure>

';
		if ($link['url']) /* line 14 */ {
			echo '	</a>
';
		}
		return get_defined_vars();
	}

}

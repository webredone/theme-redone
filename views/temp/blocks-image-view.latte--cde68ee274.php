<?php
// source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme-redone\gutenberg\blocks\image/view.latte

use Latte\Runtime as LR;

final class Templatecde68ee274 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		if ($link['url']) {
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
		if (strlen($caption['text'])) {
			echo '			<figcaption class="wp-figcaption">
				';
			echo LR\Filters::escapeHtmlText($caption['text']) /* line 9 */;
			echo '
			</figcaption>
';
		}
		echo '	</figure>

';
		if ($link['url']) {
			echo '	</a>
';
		}
		return get_defined_vars();
	}

}

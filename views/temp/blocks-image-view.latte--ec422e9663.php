<?php
// source: C:\xampp\htdocs\wr-wp-starter\wp-content\themes\theme_redone_theme\blocks_framework\blocks\image/view.latte

use Latte\Runtime as LR;

final class Templateec422e9663 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		if ($link['link']) {
			echo '	<a
		href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($link['link'])) /* line 3 */;
			echo '"
		class="wp-figure-link"
';
			if ($link['target']) {
				echo '			target="_blank " rel="noopener noreferrer"
';
			}
			echo '	>
';
		}
		echo '
	<figure class="wp-figure">
		';
		echo LR\Filters::escapeHtmlText(tr_get_media($image, true, true)) /* line 12 */;
		echo "\n";
		if (strlen($caption['text'])) {
			echo '			<figcaption class="wp-figcaption">
				';
			echo LR\Filters::escapeHtmlText($caption['text']) /* line 15 */;
			echo '
			</figcaption>
';
		}
		echo '	</figure>

';
		if ($link['link']) {
			echo '	</a>
';
		}
		return get_defined_vars();
	}

}

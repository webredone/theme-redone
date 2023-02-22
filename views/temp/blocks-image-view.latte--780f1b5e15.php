<?php

use Latte\Runtime as LR;

/** source: /home/nikola/Local Sites/themeredone/app/public/wp-content/themes/themeredone/gutenberg/blocks/image/view.latte */
final class Template780f1b5e15 extends Latte\Runtime\Template
{

	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if (!empty($image['src'])) /* line 1 */ {
			echo "\n";
			if ($link['url']) /* line 3 */ {
				echo '		<a ';
				echo tr_a($link, 'wp-figure-link', true) /* line 4 */;
				echo '>
';
			}
			echo '
		<figure class="wp-figure wp-figure-test">
			';
			echo LR\Filters::escapeHtmlText(tr_get_media($image, true)) /* line 8 */;
			echo "\n";
			if (strlen($caption['text'])) /* line 9 */ {
				echo '				<figcaption class="wp-figcaption">
					';
				echo LR\Filters::escapeHtmlText($caption['text']) /* line 11 */;
				echo '
				</figcaption>
';
			}
			echo '		</figure>

';
			if ($link['url']) /* line 16 */ {
				echo '		</a>
';
			}
			echo "\n";
		}
	}
}

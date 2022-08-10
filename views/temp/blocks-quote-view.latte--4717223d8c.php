<?php
// source: C:\xampp\htdocs\wrwp-starter\wp-content\themes\wr-wp-starter-theme\blocks_framework\blocks\quote/view.latte

use Latte\Runtime as LR;

final class Template4717223d8c extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$bq_additional_class = ($image['src'] && $image['id']) ? 'wp-blockquote--with-img' : '';
		echo '

<blockquote class="wp-blockquote ';
		echo LR\Filters::escapeHtmlAttr($bq_additional_class) /* line 4 */;
		echo '">
';
		if ($image['src'] && $image['id']) {
			echo '		<div class="wp-blockquote__img">
			';
			echo LR\Filters::escapeHtmlText(tr_get_media($image, true)) /* line 7 */;
			echo '
		</div>
';
		}
		echo '	<div class="wp-blockquote__text">
		<p class="wp-blockquote__quote">

			';
		echo LR\Filters::escapeHtmlText($quote['text']) /* line 13 */;
		echo '
		</p>
';
		if (strlen($name['text']) || strlen($position['text'])) {
			echo '			<p class="wp-blockquote__meta">
';
			if (strlen($name['text'])) {
				echo '					<span class="wp-blockquote__meta__name">
						';
				echo LR\Filters::escapeHtmlText($name['text']) /* line 19 */;
				echo '
					</span>
';
			}
			if (strlen($position['text'])) {
				echo '					<span class="wp-blockquote__meta__position">
						';
				echo LR\Filters::escapeHtmlText($position['text']) /* line 24 */;
				echo '
					</span>
';
			}
			echo '			</p>
';
		}
		echo '	</div>
</blockquote>';
		return get_defined_vars();
	}

}

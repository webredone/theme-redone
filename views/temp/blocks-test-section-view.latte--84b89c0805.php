<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme-redone\gutenberg\blocks\test-section/view.latte */
final class Template84b89c0805 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<section>
';
		ob_start(function () {});
		try {
			echo '  <h2>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($title['text']) /* line 2 */;
			} finally {
				$ʟ_ifc[1] = rtrim(ob_get_flush()) === '';
			}
			echo '</h2>
';
		} finally {
			if ($ʟ_ifc[1] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		echo '  <hr>
  <h3>Sidebar values</h3>
  ';
		echo LR\Filters::escapeHtmlText($inspector_bg['value']) /* line 5 */;
		echo '
  ';
		echo LR\Filters::escapeHtmlText($inspector_padding_top['value']) /* line 6 */;
		echo '
  ';
		echo LR\Filters::escapeHtmlText($inspector_padding_btm['value']) /* line 7 */;
		echo '
</section>';
		return get_defined_vars();
	}

}

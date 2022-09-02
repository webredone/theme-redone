<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme-redone\gutenberg\blocks\hero/view.latte */
final class Template914b01a849 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		if ($title['text']) /* line 1 */ {
			echo '<section 
  class="hero-main"
>
  <div class="hero-main__cont">
';
			ob_start(function () {});
			try {
				echo '    <h1>';
				ob_start();
				try {
					echo LR\Filters::escapeHtmlText($title['text']) /* line 6 */;
				} finally {
					$ʟ_ifc[1] = rtrim(ob_get_flush()) === '';
				}
				echo '</h1>
';
			} finally {
				if ($ʟ_ifc[1] ?? null) {
					ob_end_clean();
				} else {
					echo ob_get_clean();
				}
			}
			ob_start(function () {});
			try {
				echo '    <p>';
				ob_start();
				try {
					echo LR\Filters::escapeHtmlText($text['text']) /* line 7 */;
				} finally {
					$ʟ_ifc[2] = rtrim(ob_get_flush()) === '';
				}
				echo '</p>
';
			} finally {
				if ($ʟ_ifc[2] ?? null) {
					ob_end_clean();
				} else {
					echo ob_get_clean();
				}
			}
			echo '    ';
			echo LR\Filters::escapeHtmlText(tr_a($cta, "btn btn--brand")) /* line 8 */;
			echo '
  </div>
</section>
';
		}
		return get_defined_vars();
	}

}

<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme-redone\gutenberg\blocks\main-cta/view.latte */
final class Templatefe5688854f extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<section class="sec-cta-test ';
		echo LR\Filters::escapeHtmlAttr($classMod) /* line 1 */;
		echo '">
  <div class="container">
    <div class="sec-cta__content">
';
		ob_start(function () {});
		try {
			echo '      <h2 class="sec-title">';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($title['text']) /* line 4 */;
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
		ob_start(function () {});
		try {
			echo '      <p>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($text['text']) /* line 5 */;
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
		echo '        
      wysiwyg example
';
		ob_start(function () {});
		try {
			echo '      <div>';
			ob_start();
			try {
				echo $content['text'] /* line 8 */;
			} finally {
				$ʟ_ifc[3] = rtrim(ob_get_flush()) === '';
			}
			echo '</div>
';
		} finally {
			if ($ʟ_ifc[3] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		echo '
      <h3>';
		echo LR\Filters::escapeHtmlText($number['value']) /* line 10 */;
		echo '</h3>
      ';
		echo LR\Filters::escapeHtmlText(tr_a($cta, 'btn btn--brand')) /* line 11 */;
		echo '
    </div>
  </div>
</section>';
		return get_defined_vars();
	}

}

<?php
// source: C:\xampp\htdocs\wrwp-starter\wp-content\themes\wr-wp-starter-theme\blocks_framework\src\blocks\background-title-text-cta/view.latte

use Latte\Runtime as LR;

final class Template1bb968a4ce extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<section
  class="sec-bg-img js-img-lazy jsLoading ';
		echo LR\Filters::escapeHtmlAttr($classMod) /* line 2 */;
		echo '"
  data-img-src="';
		echo LR\Filters::escapeHtmlAttr(tr_get_media_path($image)) /* line 3 */;
		echo '"
>
  <div class="container">
';
		ob_start(function () {});
		echo '    <h2 class="sec-title ivtr ivtr-btm">';
		ob_start();
		echo LR\Filters::escapeHtmlText($text['text']) /* line 6 */;
		$ʟ_ifc = ob_get_flush();
		echo '</h2>
';
		if (rtrim($ʟ_ifc) === "") {
			ob_end_clean();
		}
		else {
			echo ob_get_clean();
		}
		echo '
    ';
		echo LR\Filters::escapeHtmlText(tr_a($cta, 'btn btn--brand')) /* line 8 */;
		echo '

    <br>
    <br>
    
    <h3>Test tr_a attrsOnly</h3>
    <a ';
		echo tr_a($cta, "test-class", true) /* line 14 */;
		echo '>';
		echo LR\Filters::escapeHtmlText(tr_get_media($image)) /* line 14 */;
		echo '</a>
  </div>
</section>
';
		return get_defined_vars();
	}

}

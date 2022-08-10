<?php
// source: C:\xampp\htdocs\wrwp-starter\wp-content\themes\wr-wp-starter-theme\blocks_framework\blocks\blockquote-slider/view.latte

use Latte\Runtime as LR;

final class Template71a3d10188 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<section class="blockquotes-slider ';
		echo LR\Filters::escapeHtmlAttr($classMod) /* line 1 */;
		echo '">
	<div class="container">

';
		$iterations = 0;
		foreach ($quotes as $quote) {
			if (count($quotes)) {
				echo '		<div class="embla__slide">
			';
				$bq_additional_class = ($quote['image']['src'] && $quote['image']['id']) ? 'wp-blockquote--with-img' : '';
				echo '
			<blockquote class="wp-blockquote ';
				echo LR\Filters::escapeHtmlAttr($bq_additional_class) /* line 6 */;
				echo '">
';
				if ($quote['image']['src'] && $quote['image']['id']) {
					echo '					<div class="wp-blockquote__img">
						';
					echo LR\Filters::escapeHtmlText(tr_get_media($quote['image'], true)) /* line 9 */;
					echo '
						Get Path Only
						<img src="';
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(tr_get_media_path($quote['image']))) /* line 11 */;
					echo '" alt="get path only">
					</div>
';
				}
				echo '
				<div class="wp-blockquote__text" style="box-shadow: 0 0 0 1px red;">
					<p class="wp-blockquote__quote">
						';
				echo LR\Filters::escapeHtmlText($quote['quote']['text']) /* line 20 */;
				echo '
					</p>
';
				if (strlen($quote['name']['text']) || strlen($quote['position']['text'])) {
					ob_start(function () {});
					echo '						<p class="wp-blockquote__meta">
';
					ob_start();
					ob_start(function () {});
					echo '							<span class="wp-blockquote__meta__name">
';
					ob_start();
					echo '								';
					echo LR\Filters::escapeHtmlText($quote['name']['text']) /* line 25 */;
					echo "\n";
					$ʟ_ifc = ob_get_flush();
					echo '							</span>
';
					if (rtrim($ʟ_ifc) === "") {
						ob_end_clean();
					}
					else {
						echo ob_get_clean();
					}
					ob_start(function () {});
					echo '							<span class="wp-blockquote__meta__position">
';
					ob_start();
					echo '								';
					echo LR\Filters::escapeHtmlText($quote['position']['text']) /* line 28 */;
					echo "\n";
					$ʟ_ifc = ob_get_flush();
					echo '							</span>
';
					if (rtrim($ʟ_ifc) === "") {
						ob_end_clean();
					}
					else {
						echo ob_get_clean();
					}
					$ʟ_ifc = ob_get_flush();
					echo '						</p>
';
					if (rtrim($ʟ_ifc) === "") {
						ob_end_clean();
					}
					else {
						echo ob_get_clean();
					}
				}
				echo '				</div>
			</blockquote>


';
				$iterations = 0;
				foreach ($quote['slides'] as $slide) {
					if (count($quote['slides'])) {
						echo '			<div 
				style="box-shadow: 0 0 0 1px red; padding: 10px;"
			>
				';
						echo LR\Filters::escapeHtmlText($slide['quote']['text']) /* line 40 */;
						echo '
			</div>
';
					}
					$iterations++;
				}
				echo '		</div>
';
			}
			$iterations++;
		}
		echo '		
	</div>
</section>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['slide' => '36', 'quote' => '4'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}

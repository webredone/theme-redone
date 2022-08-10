<?php
// source: C:\xampp\htdocs\wrwp-starter\wp-content\themes\wr-wp-starter-theme\blocks_framework\blocks\reordering/view.latte

use Latte\Runtime as LR;

final class Template30f0e65023 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<section class="blockquotes-slider ';
		echo LR\Filters::escapeHtmlAttr($classMod) /* line 1 */;
		echo '">
	<div class="container">
';
		ob_start(function () {});
		echo '		<h2>';
		ob_start();
		echo $single_text['text'] /* line 3 */;
		$ʟ_ifc = ob_get_flush();
		echo '</h2>
';
		if (rtrim($ʟ_ifc) === "") {
			ob_end_clean();
		}
		else {
			echo ob_get_clean();
		}
		echo '		';
		echo LR\Filters::escapeHtmlText(tr_a($cta, 'btn btn--brand')) /* line 4 */;
		echo "\n";
		if (count($items)) {
			echo '		<div>
';
			$iterations = 0;
			foreach ($items as $item) {
				echo '			<p>
				';
				echo $item['item']['text'] /* line 7 */;
				echo '
			</p>
';
				$iterations++;
			}
			echo '		</div>
';
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
			foreach (array_intersect_key(['item' => '6'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}

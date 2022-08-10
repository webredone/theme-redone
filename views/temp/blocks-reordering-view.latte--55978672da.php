<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme-redone\gutenberg\blocks\reordering/view.latte */
final class Template55978672da extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<section class="blockquotes-slider">
	<div class="container">
';
		ob_start(function () {});
		try {
			echo '		<h2>';
			ob_start();
			try {
				echo $single_text['text'] /* line 3 */;
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
		if (count($items)) /* line 4 */ {
			echo '		<div>
';
			$iterations = 0;
			foreach ($items as $item) /* line 5 */ {
				echo '			<p>
				';
				echo $item['item']['text'] /* line 6 */;
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
			foreach (array_intersect_key(['item' => '5'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}

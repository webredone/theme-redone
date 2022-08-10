<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wr-wp-starter-theme/views//partials/hero.latte

use Latte\Runtime as LR;

final class Templatee95790df49 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$bg_color = $background_dark ? '#1d81cc' : '#fff';
		$color = $background_dark ? '#fff' : '#1d81cc';
		echo '<section style="background-color: ';
		echo $bg_color /* line 3 */;
		echo '">
  <div class="container">
';
		ob_start(function () {});
		echo '    <h1 style="color: ';
		echo $color /* line 5 */;
		echo '">
';
		ob_start();
		echo '      ';
		echo LR\Filters::escapeHtmlText($headline) /* line 6 */;
		echo "\n";
		$ʟ_ifc = ob_get_flush();
		echo '    </h1>
';
		if (rtrim($ʟ_ifc) === "") {
			ob_end_clean();
		}
		else {
			echo ob_get_clean();
		}
		echo '  </div>
</section>

';
		return get_defined_vars();
	}

}

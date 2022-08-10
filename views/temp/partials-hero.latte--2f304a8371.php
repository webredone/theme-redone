<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wr-wp-starter-theme/views//partials/hero.latte

use Latte\Runtime as LR;

final class Template2f304a8371 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$bg_color = $background_dark ? '#222' : '#cecece';
		$color = $background_dark ? '#cecece' : '#222';
		echo '<section style="background-color: ';
		echo $bg_color /* line 3 */;
		echo '">
  <div class="container">
    <h1 style="color: ';
		echo $color /* line 5 */;
		echo '">
      ';
		echo LR\Filters::escapeHtmlText($headline) /* line 6 */;
		echo '
    </h1>
  </div>
</section>

';
		return get_defined_vars();
	}

}

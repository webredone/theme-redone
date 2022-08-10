<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wr-wp-starter-theme/views//partials/button.latte

use Latte\Runtime as LR;

final class Template212f09c349 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo "\n";
		$class = $class ? $class : '';
		$btn_class = "btn $class";
		$btn_link = isset($link['url']) ? $link['url'] : $link['link'];
		$btn_title = isset($link['title']) ? $link['title'] : $link['text'];
		echo '<a 
  href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($btn_link)) /* line 7 */;
		echo '" 
  class="';
		echo LR\Filters::escapeHtmlAttr($btn_class) /* line 8 */;
		echo '"
';
		if (array_key_exists('target', $link) && $link['target'] || array_key_exists('target', $link) && $link['target']) {
			echo '    target="_blank"
    rel="noopener noreferrer"
';
		}
		echo '>
  ';
		echo $btn_title /* line 14 */;
		echo '
</a>';
		return get_defined_vars();
	}

}

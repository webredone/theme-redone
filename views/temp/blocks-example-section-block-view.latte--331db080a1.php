<?php
// source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme-redone\gutenberg\blocks\example-section-block/view.latte

use Latte\Runtime as LR;

final class Template331db080a1 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<section class="example-section-block">

  <div class="spas-test">
    <div class="react"></div>

    <div class="svelte"></div>

    <div class="vue"></div>

    <div class="petite-vue" v-cloak v-scope>
      <h2>Petite Vue example</h2>
      <p>{{ count }}</p>
      <p>{{ plusOne }}</p>
      <button @click="increment">increment</button>
    </div>
  </div>

  <h1>Example section block</h1>
  <div class="div1"></div>
  <div class="div2"></div>

';
		ob_start(function () {});
		echo '  <h2>';
		ob_start();
		echo LR\Filters::escapeHtmlText($title['text']) /* line 22 */;
		$ʟ_ifc = ob_get_flush();
		echo '</h2>
';
		if (rtrim($ʟ_ifc) === "") {
			ob_end_clean();
		}
		else {
			echo ob_get_clean();
		}
		ob_start(function () {});
		echo '  <p>';
		ob_start();
		echo $text['text'] /* line 23 */;
		$ʟ_ifc = ob_get_flush();
		echo '</p>
';
		if (rtrim($ʟ_ifc) === "") {
			ob_end_clean();
		}
		else {
			echo ob_get_clean();
		}
		echo '</section>';
		return get_defined_vars();
	}

}

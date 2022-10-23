<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme_redone\gutenberg\blocks\repeater-fields-grid/view.latte */
final class Templated1be396326 extends Latte\Runtime\Template
{

	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if (!empty($breadcrumbs)) /* line 2 */ {
			echo '<ol
  class="breadcrumbs"
  itemscope itemtype="https://schema.org/BreadcrumbList"
>
';
			foreach ($breadcrumbs as $breadcrumb) /* line 6 */ {
				dump($breadcrumb) /* line 7 */;
			}

			echo '</ol>
';
		}
		echo '

';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['breadcrumb' => '6'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}

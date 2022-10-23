<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme_redone\gutenberg\blocks\breadcrumbs/view.latte */
final class Template12dbd9a71d extends Latte\Runtime\Template
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
			foreach ($iterator = $ʟ_it = new Latte\Essential\CachingIterator($breadcrumbs, $ʟ_it ?? null) as $breadcrumb) /* line 6 */ {
				echo '  <li 
    itemprop="itemListElement" 
    itemscope
    itemtype="https://schema.org/ListItem"
  >
    <a 
      itemprop="item" 
      href="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($breadcrumb['link']['url'])) /* line 14 */;
				echo '" 
    >
      <span itemprop="name">
        ';
				echo $breadcrumb['link']['title'] /* line 17 */;
				echo '
      </span>
    </a>
    <meta itemprop="position" content="';
				echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 20 */;
				echo '" />
  </li>

';
				if (!$iterator->last) /* line 24 */ {
					echo '  <li
    class="separator"
  >/</li>
';
				}

			}
			$iterator = $ʟ_it = $ʟ_it->getParent();

			echo '</ol>';
		}
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

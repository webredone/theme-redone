<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme-redone\gutenberg\blocks\breadcrumbs/view.latte */
final class Templatee28199728b extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		if (!empty($breadcrumbs)) /* line 1 */ {
			echo '<ol
  class="breadcrumbs"
  itemscope itemtype="https://schema.org/BreadcrumbList"
>
';
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($breadcrumbs, $ʟ_it ?? null) as $breadcrumb) /* line 6 */ {
				echo '
  <li 
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
				echo '">
  </li>

';
				if (!$iterator->last) /* line 23 */ {
					echo '  <li
    class="separator"
  >/</li>
';
				}
				$iterations++;
			}
			$iterator = $ʟ_it = $ʟ_it->getParent();
			echo '</ol>';
		}
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['breadcrumb' => '6'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}

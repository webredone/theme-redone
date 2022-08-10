<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme-redone\gutenberg\blocks\breadcrumbs/view.latte */
final class Templatee28199728b extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<div class="breadcrumbs">
';
		$tag = 'span' /* line 2 */;
		$iterations = 0;
		foreach ($iterator = $ʟ_it = new LR\CachingIterator($breadcrumbs, $ʟ_it ?? null) as $breadcrumb) /* line 3 */ {
			if (strlen($breadcrumb['link']['url'])) /* line 4 */ {
				$tag = 'a' /* line 5 */;
			}
			echo '    <';
			echo LR\Filters::escapeHtmlText($tag) /* line 7 */;
			echo "\n";
			if (strlen($breadcrumb['link']['url'])) /* line 8 */ {
				echo '        href="';
				echo LR\Filters::escapeHtmlText($breadcrumb['link']['url']) /* line 9 */;
				echo '"
';
			}
			if ($iterator->last) /* line 11 */ {
				echo '        class="active"
';
			}
			echo '    >
      ';
			echo $breadcrumb['link']['title'] /* line 15 */;
			echo '
    </';
			echo LR\Filters::escapeHtmlText($tag) /* line 16 */;
			echo '>
    <i class="breadcrumb__separator">/</i>
';
			$iterations++;
		}
		$iterator = $ʟ_it = $ʟ_it->getParent();
		echo '</div>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['breadcrumb' => '3'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}

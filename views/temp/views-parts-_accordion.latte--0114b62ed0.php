<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/parts/_accordion.latte */
final class Template0114b62ed0 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['acc_trigger' => 'blockAcc_trigger', 'acc_content' => 'blockAcc_content'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '

';
		$panels_ids = [] /* line 12 */;
		$random_string = uniqid() /* line 13 */;
		$iterations = 0;
		foreach ($items as $acc_index => $tab_content) /* line 14 */ {
			$index = $acc_index + 1 /* line 15 */;
			$panels_ids[] = "{$random_string}_{$index}" /* line 16 */;
			$iterations++;
		}
		echo "\n";
		if (!empty($items)) /* line 19 */ {
			echo '<div 
  class="accordion ';
			echo LR\Filters::escapeHtmlAttr($class ?? '') /* line 20 */;
			echo '"
';
			if ($collapse_siblings ?? false) /* line 21 */ {
				echo '    data-collapse-siblings
';
			}
			echo '  data-duration="';
			echo LR\Filters::escapeHtmlAttr(!empty($duration) ? $duration : '300') /* line 24 */;
			echo '"
';
			if (!empty($easing)) /* line 26 */ {
				echo '    data-easing="';
				echo LR\Filters::escapeHtmlAttr($easing) /* line 27 */;
				echo '"
';
			}
			echo '>

';
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($items, $ʟ_it ?? null) as $index => $item) /* line 31 */ {
				$is_initially_open = isset($initially_open_item) && $index === $initially_open_item /* line 32 */;
				$aria_label_text = !empty($aria_label) ? $aria_label : 'Toggle Accordion Item' /* line 33 */;
				echo '  
    <div 
      class="collapsible"
';
				if ($is_initially_open) /* line 37 */ {
					echo '        data-initially-open
';
				}
				echo '    >
      <button
        class="collapsible__trigger"
        type="button"
        id="acc_panel_';
				echo LR\Filters::escapeHtmlAttr($panels_ids[$index]) /* line 44 */;
				echo '"
        aria-label="';
				echo LR\Filters::escapeHtmlAttr($aria_label_text) /* line 45 */;
				echo '"
      >
        ';
				$this->renderBlock('acc_trigger', get_defined_vars()) /* line 47 */;
				echo '
        <span class="chevron"></span>
      </button>

      <div 
        class="collapsible__content"
        role="region"
        aria-labelledby="acc_panel_';
				echo LR\Filters::escapeHtmlAttr($panels_ids[$index]) /* line 54 */;
				echo '"
      >
        <div class="collapsible__content__inner">
          ';
				$this->renderBlock('acc_content', get_defined_vars()) /* line 57 */;
				echo '
        </div>
      </div>

    </div>
';
				$iterations++;
			}
			$iterator = $ʟ_it = $ʟ_it->getParent();
			echo '
</div>';
		}
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['acc_index' => '14', 'tab_content' => '14', 'index' => '31', 'item' => '31'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}


	/** {block acc_trigger} on line 47 */
	public function blockAcc_trigger(array $ʟ_args): void
	{
		
	}


	/** {block acc_content} on line 57 */
	public function blockAcc_content(array $ʟ_args): void
	{
		
	}

}

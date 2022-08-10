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
		if (!empty($items)) /* line 9 */ {
			echo '<div 
  class="accordion ';
			echo LR\Filters::escapeHtmlAttr($class ?? '') /* line 10 */;
			echo '"
';
			if ($collapse_siblings ?? false) /* line 11 */ {
				echo '    data-collapse-siblings
';
			}
			echo '  data-duration="';
			echo LR\Filters::escapeHtmlAttr(!empty($duration) ? $duration : '300') /* line 14 */;
			echo '"
';
			if (!empty($easing)) /* line 16 */ {
				echo '    data-easing="';
				echo LR\Filters::escapeHtmlAttr($easing) /* line 17 */;
				echo '"
';
			}
			echo '>

';
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($items, $ʟ_it ?? null) as $index => $item) /* line 21 */ {
				$is_initially_open = isset($initially_open_item) && $index === $initially_open_item /* line 22 */;
				$aria_label_text = !empty($aria_label) ? $aria_label : 'Toggle Accordion Item' /* line 23 */;
				echo '  
    <div 
      class="collapsible"
';
				if ($is_initially_open) /* line 27 */ {
					echo '        data-initially-open
';
				}
				echo '    >
      <button
        class="collapsible__trigger"
        type="button"
        aria-label="';
				echo LR\Filters::escapeHtmlAttr($aria_label_text) /* line 34 */;
				echo '"
      >
        ';
				$this->renderBlock('acc_trigger', get_defined_vars()) /* line 36 */;
				echo '
        <span class="chevron"></span>
      </button>

      <div class="collapsible__content">
        <div class="collapsible__content__inner">
          ';
				$this->renderBlock('acc_content', get_defined_vars()) /* line 42 */;
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
			foreach (array_intersect_key(['index' => '21', 'item' => '21'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}


	/** {block acc_trigger} on line 36 */
	public function blockAcc_trigger(array $ʟ_args): void
	{
		
	}


	/** {block acc_content} on line 42 */
	public function blockAcc_content(array $ʟ_args): void
	{
		
	}

}

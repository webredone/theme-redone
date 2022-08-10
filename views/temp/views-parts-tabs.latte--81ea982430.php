<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/parts/tabs.latte */
final class Template81ea982430 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['tab_anchor' => 'blockTab_anchor', 'tab_panel' => 'blockTab_panel'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '
<div 
  class="tabs ';
		echo LR\Filters::escapeHtmlAttr($class ?? '') /* line 5 */;
		echo '"
>

  <div class="tabs__nav">

';
		$iterations = 0;
		foreach ($iterator = $ʟ_it = new LR\CachingIterator($tabs, $ʟ_it ?? null) as $tc_key => $ta_content) /* line 10 */ {
			echo '    <button
      type="button" 
      class="tab-anchor ';
			echo LR\Filters::escapeHtmlAttr($tc_key == 0 ? 'activeTab' : '') /* line 13 */;
			echo '" 
      data-href="panel-';
			echo LR\Filters::escapeHtmlAttr($tc_key) /* line 14 */;
			echo '"
    >
      ';
			$this->renderBlock('tab_anchor', get_defined_vars()) /* line 16 */;
			echo '
    </button>
';
			$iterations++;
		}
		$iterator = $ʟ_it = $ʟ_it->getParent();
		echo '

  </div>

  <div class="tabs__content">

';
		$iterations = 0;
		foreach ($iterator = $ʟ_it = new LR\CachingIterator($tabs, $ʟ_it ?? null) as $tp_key => $tp_content) /* line 24 */ {
			echo '    <div 
      class="tab-panel ';
			echo LR\Filters::escapeHtmlAttr($tp_key == 0 ? 'activeTab enter' : '') /* line 25 */;
			echo '" 
      data-id="panel-';
			echo LR\Filters::escapeHtmlAttr($tp_key) /* line 26 */;
			echo '"
    >
      <div class="tab-panel__content">
        ';
			$this->renderBlock('tab_panel', get_defined_vars()) /* line 30 */;
			echo '
      </div>
    </div>';
			$iterations++;
		}
		$iterator = $ʟ_it = $ʟ_it->getParent();
		echo '  </div>

</div>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['tc_key' => '10', 'ta_content' => '10', 'tp_key' => '24', 'tp_content' => '24'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}


	/** {block tab_anchor} on line 16 */
	public function blockTab_anchor(array $ʟ_args): void
	{
		
	}


	/** {block tab_panel} on line 30 */
	public function blockTab_panel(array $ʟ_args): void
	{
		
	}

}

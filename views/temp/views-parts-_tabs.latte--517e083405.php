<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/parts/_tabs.latte */
final class Template517e083405 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['tab_anchor' => 'blockTab_anchor', 'tab_panel' => 'blockTab_panel'],
	];


	public function main(): array
	{
		extract($this->params);
		echo "\n";
		$tabs_ids = [] /* line 6 */;
		$random_string = uniqid() /* line 7 */;
		$iterations = 0;
		foreach ($tabs as $tab_index => $tab_content) /* line 8 */ {
			$index = $tab_index + 1 /* line 9 */;
			$tabs_ids[] = "{$random_string}_{$index}" /* line 10 */;
			$iterations++;
		}
		echo "\n";
		if (!empty($tabs)) /* line 13 */ {
			echo '<div 
  class="tabs ';
			echo LR\Filters::escapeHtmlAttr($class ?? '') /* line 14 */;
			echo '"
>

  <div 
    class="tabs__nav"
    role="tablist"
  >

';
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($tabs, $ʟ_it ?? null) as $ta_key => $ta_content) /* line 23 */ {
				echo '    <button
      type="button" 
      data-href="panel-';
				echo LR\Filters::escapeHtmlAttr($ta_key) /* line 26 */;
				echo '"
      class="tab-anchor ';
				echo LR\Filters::escapeHtmlAttr($ta_key == 0 ? 'activeTab' : '') /* line 27 */;
				echo '"
      id="tab_';
				echo LR\Filters::escapeHtmlAttr($tabs_ids[$ta_key]) /* line 28 */;
				echo '"
      aria-selected="';
				echo LR\Filters::escapeHtmlAttr($ta_key == 0 ? 'true' : 'false') /* line 29 */;
				echo '" 
      aria-controls="panel-';
				echo LR\Filters::escapeHtmlAttr($tabs_ids[$ta_key]) /* line 30 */;
				echo '"
      role="tab"
    >
      ';
				$this->renderBlock('tab_anchor', get_defined_vars()) /* line 33 */;
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
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($tabs, $ʟ_it ?? null) as $tp_key => $tp_content) /* line 40 */ {
				echo '    <div 
      class="tab-panel ';
				echo LR\Filters::escapeHtmlAttr($tp_key == 0 ? 'activeTab enter' : '') /* line 41 */;
				echo '" 
      data-id="panel-';
				echo LR\Filters::escapeHtmlAttr($tp_key) /* line 42 */;
				echo '"
      id="panel-';
				echo LR\Filters::escapeHtmlAttr($tabs_ids[$tp_key]) /* line 43 */;
				echo '"
      aria-labelledby="tab_';
				echo LR\Filters::escapeHtmlAttr($tabs_ids[$tp_key]) /* line 45 */;
				echo '"
      role="tabpanel"
      aria-hidden="';
				echo LR\Filters::escapeHtmlAttr($tp_key == 0 ? 'false' : 'true') /* line 47 */;
				echo '"
    >
      <div class="tab-panel__content">
        ';
				$this->renderBlock('tab_panel', get_defined_vars()) /* line 50 */;
				echo '
      </div>
    </div>';
				$iterations++;
			}
			$iterator = $ʟ_it = $ʟ_it->getParent();
			echo '  </div>

</div>';
		}
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['tab_index' => '8', 'tab_content' => '8', 'ta_key' => '23', 'ta_content' => '23', 'tp_key' => '40', 'tp_content' => '40'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}


	/** {block tab_anchor} on line 33 */
	public function blockTab_anchor(array $ʟ_args): void
	{
		
	}


	/** {block tab_panel} on line 50 */
	public function blockTab_panel(array $ʟ_args): void
	{
		
	}

}

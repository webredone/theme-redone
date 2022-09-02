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
			echo '  ';
			echo LR\Filters::escapeHtmlText($tabs_ids[] = "{$random_string}_{$index}") /* line 10 */;
			echo "\n";
			$iterations++;
		}
		echo "\n";
		dump($tabs_ids) /* line 13 */;
		echo "\n";
		if (!empty($tabs)) /* line 15 */ {
			echo '<div 
  class="tabs ';
			echo LR\Filters::escapeHtmlAttr($class ?? '') /* line 16 */;
			echo '"
>

  <div 
    class="tabs__nav"
    role="tablist"
  >

';
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($tabs, $ʟ_it ?? null) as $ta_key => $ta_content) /* line 25 */ {
				echo '    <button
      type="button" 
      data-href="panel-';
				echo LR\Filters::escapeHtmlAttr($ta_key) /* line 28 */;
				echo '"
      class="tab-anchor ';
				echo LR\Filters::escapeHtmlAttr($ta_key == 0 ? 'activeTab' : '') /* line 29 */;
				echo '"
      id="tab_';
				echo LR\Filters::escapeHtmlAttr($tabs_ids[$ta_key]) /* line 30 */;
				echo '"
      aria-selected="';
				echo LR\Filters::escapeHtmlAttr($ta_key == 0 ? 'true' : 'false') /* line 31 */;
				echo '" 
      aria-controls="panel-';
				echo LR\Filters::escapeHtmlAttr($tabs_ids[$ta_key]) /* line 32 */;
				echo '"
      role="tab"
    >
      ';
				$this->renderBlock('tab_anchor', get_defined_vars()) /* line 35 */;
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
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($tabs, $ʟ_it ?? null) as $tp_key => $tp_content) /* line 42 */ {
				echo '    <div 
      class="tab-panel ';
				echo LR\Filters::escapeHtmlAttr($tp_key == 0 ? 'activeTab enter' : '') /* line 43 */;
				echo '" 
      data-id="panel-';
				echo LR\Filters::escapeHtmlAttr($tp_key) /* line 44 */;
				echo '"
      id="panel-';
				echo LR\Filters::escapeHtmlAttr($tabs_ids[$tp_key]) /* line 45 */;
				echo '"
      aria-labelledby="tab_';
				echo LR\Filters::escapeHtmlAttr($tabs_ids[$tp_key]) /* line 47 */;
				echo '"
      role="tabpanel"
      aria-hidden="';
				echo LR\Filters::escapeHtmlAttr($tp_key == 0 ? 'false' : 'true') /* line 49 */;
				echo '"
    >
      <div class="tab-panel__content">
        ';
				$this->renderBlock('tab_panel', get_defined_vars()) /* line 52 */;
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
			foreach (array_intersect_key(['tab_index' => '8', 'tab_content' => '8', 'ta_key' => '25', 'ta_content' => '25', 'tp_key' => '42', 'tp_content' => '42'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}


	/** {block tab_anchor} on line 35 */
	public function blockTab_anchor(array $ʟ_args): void
	{
		
	}


	/** {block tab_panel} on line 52 */
	public function blockTab_panel(array $ʟ_args): void
	{
		
	}

}

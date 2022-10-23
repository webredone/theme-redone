<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme_redone/views/parts/_tabs.latte */
final class Templatebfc539c47a extends Latte\Runtime\Template
{
	public const Blocks = [
		['tab_anchor' => 'blockTab_anchor', 'tab_panel' => 'blockTab_panel'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo "\n";
		if (!empty($tabs)) /* line 15 */ {
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
			foreach ($iterator = $ʟ_it = new Latte\Essential\CachingIterator($tabs, $ʟ_it ?? null) as $ta_key => $ta_content) /* line 24 */ {
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
				echo '    </button>
';

			}
			$iterator = $ʟ_it = $ʟ_it->getParent();

			echo '
  </div>

  <div class="tabs__content">

';
			foreach ($iterator = $ʟ_it = new Latte\Essential\CachingIterator($tabs, $ʟ_it ?? null) as $tp_key => $tp_content) /* line 44 */ {
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
				echo '      </div>
    </div>';
			}
			$iterator = $ʟ_it = $ʟ_it->getParent();

			echo '

  </div>

</div>';
		}
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['tab_index' => '8', 'tab_content' => '8', 'ta_key' => '24', 'ta_content' => '24', 'tp_key' => '44', 'tp_content' => '44'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		$tabs_ids = [] /* line 6 */;
		$random_string = uniqid() /* line 7 */;
		foreach ($tabs as $tab_index => $tab_content) /* line 8 */ {
			$index = $tab_index + 1 /* line 9 */;
			$tabs_ids[] = "{$random_string}_{$index}" /* line 10 */;
		}

		return get_defined_vars();
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

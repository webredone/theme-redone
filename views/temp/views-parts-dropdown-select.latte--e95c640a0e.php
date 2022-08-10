<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/parts/dropdown-select.latte */
final class Templatee95c640a0e extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo "\n";
		if (!empty($options)) /* line 25 */ {
			echo '<div
  class="collapsible ';
			echo LR\Filters::escapeHtmlAttr($class ?? '') /* line 27 */;
			echo ' ';
			if (!empty($is_absolute)) /* line 27 */ {
				echo 'collapsible--absolute';
			}
			echo '" 
  data-select
  data-duration="';
			echo LR\Filters::escapeHtmlAttr(!empty($duration) ? $duration : '300') /* line 29 */;
			echo '"
';
			if ($close_outside ?? false) /* line 30 */ {
				echo '    data-close-on-outside-click
';
			}
			if ($on_hover ?? false) /* line 33 */ {
				echo '    data-hover-trigger
';
			}
			if (!empty($easing)) /* line 36 */ {
				echo '    data-easing="';
				echo LR\Filters::escapeHtmlAttr($easing) /* line 37 */;
				echo '"
';
			}
			echo '>
  <button
    class="collapsible__trigger"
    type="button"
    aria-label="';
			echo LR\Filters::escapeHtmlAttr(!empty($aria_label) ? $aria_label : 'Toggle Options') /* line 43 */;
			echo '"
  >
    <span class="collapsible__select-current"></span>
    <span class="chevron"></span>
  </button>
  <div class="collapsible__content">
    <div class="collapsible__content__inner">

';
			ob_start('Latte\Runtime\Filters::spacelessHtmlHandler', 4096) /* line 51 */;
			try {
				$iterations = 0;
				foreach ($iterator = $ʟ_it = new LR\CachingIterator($options, $ʟ_it ?? null) as $option) /* line 52 */ {
					echo '      <button
        type="button" 
        class=
          "collapsible__option 
';
					if ((isset($default_selected_key) && $default_selected_key === $iterator->counter0)) /* line 57 */ {
						echo '          picked
';
					} elseif (!isset($default_selected_key) && $iterator->first) /* line 61 */ {
						echo '          picked
          ';
					}
					echo '" 
        data-value="';
					echo LR\Filters::escapeHtmlAttr($option['value']) /* line 64 */;
					echo '"
      >
        ';
					echo LR\Filters::escapeHtmlText($option['label']) /* line 66 */;
					echo '
      </button>
';
					$iterations++;
				}
				$iterator = $ʟ_it = $ʟ_it->getParent();
			} finally {
				ob_end_flush();
			}
			echo '
    </div>
  </div>
</div>';
		}
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['option' => '52'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}

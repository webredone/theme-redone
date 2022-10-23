<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme_redone/views/parts/_collapsible.latte */
final class Template7d8b2f4b26 extends Latte\Runtime\Template
{
	public const Blocks = [
		['collapsible_trigger' => 'blockCollapsible_trigger', 'collapsible_content' => 'blockCollapsible_content'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo ' 

<div 
  class="collapsible ';
		echo LR\Filters::escapeHtmlAttr($class ?? '') /* line 11 */;
		echo ' ';
		if (!empty($is_absolute)) /* line 11 */ {
			echo 'collapsible--absolute';
		}
		echo '" 
  data-duration="';
		echo LR\Filters::escapeHtmlAttr(!empty($duration) ? $duration : '300') /* line 12 */;
		echo '"
  ';
		if ($close_outside ?? false) /* line 13 */ {
			echo '
    data-close-on-outside-click
  ';
		}
		echo '
  ';
		if ($on_hover ?? false) /* line 16 */ {
			echo '
    data-hover-trigger
  ';
		}
		echo '
  ';
		if (!empty($custom_keyframes)) /* line 19 */ {
			echo '
    data-keyframes="';
			echo LR\Filters::escapeHtmlAttr(json_encode($custom_keyframes)) /* line 20 */;
			echo '"
  ';
		}
		echo '
  ';
		if (!empty($easing)) /* line 22 */ {
			echo '
    data-easing="';
			echo LR\Filters::escapeHtmlAttr($easing) /* line 23 */;
			echo '"
  ';
		}
		echo '
>

  <button
    class="collapsible__trigger"
    type="button"
    aria-label="';
		echo LR\Filters::escapeHtmlAttr(!empty($aria_label) ? $aria_label : 'Toggle Dropdown') /* line 30 */;
		echo '"
  >
';
		$this->renderBlock('collapsible_trigger', get_defined_vars()) /* line 32 */;
		echo '    <span class="chevron"></span>
  </button>

  <div class="collapsible__content">
    <div class="collapsible__content__inner">
';
		$this->renderBlock('collapsible_content', get_defined_vars()) /* line 38 */;
		echo '    </div>
  </div>

</div>';
	}


	/** {block collapsible_trigger} on line 32 */
	public function blockCollapsible_trigger(array $ʟ_args): void
	{
	}


	/** {block collapsible_content} on line 38 */
	public function blockCollapsible_content(array $ʟ_args): void
	{
	}
}

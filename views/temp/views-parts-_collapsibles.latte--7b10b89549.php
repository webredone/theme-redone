<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/parts/_collapsibles.latte */
final class Template7b10b89549 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		1 => ['acc_trigger' => 'blockAcc_trigger', 'acc_content' => 'blockAcc_content'],
		2 => ['acc_trigger' => 'blockAcc_trigger1', 'acc_content' => 'blockAcc_content1'],
		3 => ['acc_trigger' => 'blockAcc_trigger2', 'acc_content' => 'blockAcc_content2'],
		4 => ['acc_trigger' => 'blockAcc_trigger3', 'acc_content' => 'blockAcc_content3'],
		5 => ['acc_trigger' => 'blockAcc_trigger4', 'acc_content' => 'blockAcc_content4'],
		6 => ['acc_trigger' => 'blockAcc_trigger5', 'acc_content' => 'blockAcc_content5'],
		7 => ['collapsible_trigger' => 'blockCollapsible_trigger', 'collapsible_content' => 'blockCollapsible_content'],
		8 => ['collapsible_trigger' => 'blockCollapsible_trigger1', 'collapsible_content' => 'blockCollapsible_content1'],
		9 => ['collapsible_trigger' => 'blockCollapsible_trigger2', 'collapsible_content' => 'blockCollapsible_content2'],
		10 => ['collapsible_trigger' => 'blockCollapsible_trigger3', 'collapsible_content' => 'blockCollapsible_content3'],
		11 => ['collapsible_trigger' => 'blockCollapsible_trigger4', 'collapsible_content' => 'blockCollapsible_content4'],
		12 => ['collapsible_trigger' => 'blockCollapsible_trigger5', 'collapsible_content' => 'blockCollapsible_content5'],
		13 => ['collapsible_trigger' => 'blockCollapsible_trigger6', 'collapsible_content' => 'blockCollapsible_content6'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '<h2>Embed Accordion</h2>


';
		$dummy_collapsible_content = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam
\nexplicabo nemo necessitatibus nulla, veniam libero minima velit
\naccusantium. Dignissimos blanditiis temporibus tenetur voluptate,
\nimpedit odit et quia unde illo ad. Lorem ipsum, dolor sit amet
\nconsectetur adipisicing elit. Aperiam explicabo nemo necessitatibus
\nnulla, veniam libero minima velit accusantium. Dignissimos blanditiis
\ntemporibus tenetur voluptate, impedit odit et quia unde illo ad." /* line 6 */;
		echo '






<div 
  class="f-row" 
  style="--i-cols: 3; --i-gap: 15;margin-bottom: 100px;"
>
  <div class="col">
    <h4>1 Level - collapse siblings</h4>
';
		$this->enterBlockLayer(1, get_defined_vars()) /* line 26 */;
		if (false) {
			$this->renderBlock('acc_trigger', get_defined_vars()) /* line 32 */;
			echo '

';
			$this->renderBlock('acc_content', get_defined_vars()) /* line 38 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_accordion'), ['items' => $test_acc_items,
				'initially_open_item' => 0,
				'collapse_siblings' => true], "embed")->renderToContentType('html') /* line 26 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
  </div>
  <div class="col">
    <h4>1 Level - custom easing</h4>
';
		$this->enterBlockLayer(2, get_defined_vars()) /* line 50 */;
		if (false) {
			$this->renderBlock('acc_trigger', get_defined_vars()) /* line 58 */;
			echo '

';
			$this->renderBlock('acc_content', get_defined_vars()) /* line 64 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_accordion'), ['items' => $test_acc_items,
				'initially_open_item' => 0,
				'duration' => 700,
				'collapse_siblings' => true,
				'easing' => 'cubic-bezier(1,-0.06, 0, 1.56)'], "embed")->renderToContentType('html') /* line 50 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
  </div>
  <div class="col">
    <h4>1 Level - independent</h4>
';
		$this->enterBlockLayer(3, get_defined_vars()) /* line 76 */;
		if (false) {
			$this->renderBlock('acc_trigger', get_defined_vars()) /* line 81 */;
			echo '

';
			$this->renderBlock('acc_content', get_defined_vars()) /* line 87 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_accordion'), ['items' => $test_acc_items,
				'initially_open_item' => 2], "embed")->renderToContentType('html') /* line 76 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
  </div>
</div>


<hr style="margin-top: 40px; margin-bottom: 40px;">




<hr style="margin-top: 40px; margin-bottom: 40px;">



<h2>Nested Accordions</h2>
<div class="nested-accordions">
';
		$this->enterBlockLayer(4, get_defined_vars()) /* line 111 */;
		if (false) {
			$this->renderBlock('acc_trigger', get_defined_vars()) /* line 117 */;
			echo '

';
			$this->renderBlock('acc_content', get_defined_vars()) /* line 123 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_accordion'), ['items' => $test_acc_items,
				'initially_open_item' => 0,
				'collapse_siblings' => true], "embed")->renderToContentType('html') /* line 111 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '

</div>



<hr style="margin-top: 40px; margin-bottom: 40px;">


';
		$dummy_dd_options = [
			[
				'value' => 'none',
				'label' => 'Select Option',
			],
			[
				'value' => 'option-1',
				'label' => 'Option 1',
			],
			[
				'value' => 'option-2',
				'label' => 'Option 2',
			],
			[
				'value' => 'option-3',
				'label' => 'Option 3',
			],
			[
				'value' => 'option-4',
				'label' => 'Option 4',
			],
		] /* line 180 */;
		echo '

<h3>Dropdowns</h3>
<div 
  class="f-row"
  style="--i-cols: 4; --i-gap: 15; margin-bottom: 200px;"
>
  <div class="col">
    <h5>Click</h5>
';
		$this->enterBlockLayer(7, get_defined_vars()) /* line 211 */;
		if (false) {
			$this->renderBlock('collapsible_trigger', get_defined_vars()) /* line 212 */;
			echo "\n";
			$this->renderBlock('collapsible_content', get_defined_vars()) /* line 215 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_collapsible'), [], "embed")->renderToContentType('html') /* line 211 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
  </div>
  <div class="col">
    <h5>Click (close on click outside)</h5>
';
		$this->enterBlockLayer(8, get_defined_vars()) /* line 225 */;
		if (false) {
			$this->renderBlock('collapsible_trigger', get_defined_vars()) /* line 229 */;
			echo "\n";
			$this->renderBlock('collapsible_content', get_defined_vars()) /* line 232 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_collapsible'), ['close_outside' => true], "embed")->renderToContentType('html') /* line 225 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
  </div>
  <div class="col">
    <h5>Hover</h5>
';
		$this->enterBlockLayer(9, get_defined_vars()) /* line 242 */;
		if (false) {
			$this->renderBlock('collapsible_trigger', get_defined_vars()) /* line 246 */;
			echo "\n";
			$this->renderBlock('collapsible_content', get_defined_vars()) /* line 249 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_collapsible'), ['on_hover' => true], "embed")->renderToContentType('html') /* line 242 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
  </div>
  <div class="col">
    <h5>Hover absolute</h5>
';
		$this->enterBlockLayer(10, get_defined_vars()) /* line 259 */;
		if (false) {
			$this->renderBlock('collapsible_trigger', get_defined_vars()) /* line 264 */;
			echo "\n";
			$this->renderBlock('collapsible_content', get_defined_vars()) /* line 267 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_collapsible'), ['on_hover' => true,
				'is_absolute' => true], "embed")->renderToContentType('html') /* line 259 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
  </div>
</div>


<hr>

<h3>Dropdown Selects</h3>
<div 
  class="f-row"
  style="--i-cols: 4; --i-gap: 15; margin-bottom: 200px;"
>
  <div class="col">
    <h5>Click</h5>
';
		$this->createTemplate(tr_part('dropdown-select'), ['options' => $dummy_dd_options] + $this->params, 'include')->renderToContentType('html') /* line 287 */;
		echo '  </div>
  <div class="col">
    <h5>Close on click outside</h5>
';
		$this->createTemplate(tr_part('dropdown-select'), ['options' => $dummy_dd_options,
			'class' => 'custom-class',
			'duration' => 200,
			'close_outside' => true,
			'default_selected_key' => 3] + $this->params, 'include')->renderToContentType('html') /* line 294 */;
		echo '
  </div>
  <div class="col">
    <h5>Hover</h5>
';
		$this->createTemplate(tr_part('dropdown-select'), ['options' => $dummy_dd_options,
			'on_hover' => true,
			'default_selected_key' => 0] + $this->params, 'include')->renderToContentType('html') /* line 306 */;
		echo '  </div>
  <div class="col">
    <h5>Hover - absolute</h5>
';
		$this->createTemplate(tr_part('dropdown-select'), ['options' => $dummy_dd_options,
			'is_absolute' => true,
			'on_hover' => true,
			'default_selected_key' => 2] + $this->params, 'include')->renderToContentType('html') /* line 315 */;
		echo '  </div>
</div>










';
		$custom_keyframes = [
			[
				"opacity" => 0,
				"transform" => "translateY(-10px)",
				"pointer-events" => "none"
			],
			[
				"transform" => "translateY(10px)",
				"offset" => 0.9
			],
			[
				"opacity" => "1",
				"transform" => "translateY(0)",
				"pointer-events" => "all"
			]
		] /* line 334 */;
		echo '

<div 
  class="f-row"
  style="--i-cols: 3; --i-gap: 15; margin-bottom: 200px;"
>
  <div class="col">
    <h5>Custom Easing</h5>
';
		$this->enterBlockLayer(11, get_defined_vars()) /* line 358 */;
		if (false) {
			$this->renderBlock('collapsible_trigger', get_defined_vars()) /* line 365 */;
			echo "\n";
			$this->renderBlock('collapsible_content', get_defined_vars()) /* line 374 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_collapsible'), ['on_hover' => true,
				'is_absolute' => true,
				'duration' => 500,
				'easing' => 'cubic-bezier(1,-0.06, 0, 1.56)'], "embed")->renderToContentType('html') /* line 358 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
  </div>
  <div class="col">
    <h5>Custom Keyframes</h5>
';
		$this->enterBlockLayer(12, get_defined_vars()) /* line 384 */;
		if (false) {
			$this->renderBlock('collapsible_trigger', get_defined_vars()) /* line 391 */;
			echo "\n";
			$this->renderBlock('collapsible_content', get_defined_vars()) /* line 400 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_collapsible'), ['on_hover' => true,
				'is_absolute' => true,
				'aria_label' => "Toggle Hover Dropdown",
				'custom_keyframes' => $custom_keyframes], "embed")->renderToContentType('html') /* line 384 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
  </div>
  <div class="col">
    <h5>Custom Keyframes - custom easing</h5>
';
		$this->enterBlockLayer(13, get_defined_vars()) /* line 410 */;
		if (false) {
			$this->renderBlock('collapsible_trigger', get_defined_vars()) /* line 419 */;
			echo "\n";
			$this->renderBlock('collapsible_content', get_defined_vars()) /* line 428 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_collapsible'), ['on_hover' => true,
				'is_absolute' => true,
				'aria_label' => "Toggle Hover Dropdown",
				'custom_keyframes' => $custom_keyframes,
				'duration' => 600,
				'easing' => 'cubic-bezier(1,-0.06, 0, 1.56)'], "embed")->renderToContentType('html') /* line 410 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
  </div>
</div>


';
		return get_defined_vars();
	}


	/** {block acc_trigger} on line 32 */
	public function blockAcc_trigger(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <h5>
          <strong>';
		echo LR\Filters::escapeHtmlText($item['anchor']) /* line 34 */;
		echo '</strong> ✅
        </h5>
';
	}


	/** {block acc_content} on line 38 */
	public function blockAcc_content(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <span>
          <div class="test-custom-class">
';
		if (!empty($item['content']['title'])) /* line 41 */ {
			echo '            <h4>';
			echo LR\Filters::escapeHtmlText($item['content']['title']) /* line 41 */;
			echo '</h4>
';
		}
		ob_start(function () {});
		try {
			echo '            <p>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($item['content']['text']) /* line 42 */;
			} finally {
				$ʟ_ifc[1] = rtrim(ob_get_flush()) === '';
			}
			echo '</p>
';
		} finally {
			if ($ʟ_ifc[1] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		echo '          </div>
        </span>
';
	}


	/** {block acc_trigger} on line 58 */
	public function blockAcc_trigger1(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <h5>
          <strong>';
		echo LR\Filters::escapeHtmlText($item['anchor']) /* line 60 */;
		echo '</strong> ✅
        </h5>
';
	}


	/** {block acc_content} on line 64 */
	public function blockAcc_content1(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <span>
          <div class="test-custom-class">
';
		if (!empty($item['content']['title'])) /* line 67 */ {
			echo '            <h4>';
			echo LR\Filters::escapeHtmlText($item['content']['title']) /* line 67 */;
			echo '</h4>
';
		}
		ob_start(function () {});
		try {
			echo '            <p>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($item['content']['text']) /* line 68 */;
			} finally {
				$ʟ_ifc[2] = rtrim(ob_get_flush()) === '';
			}
			echo '</p>
';
		} finally {
			if ($ʟ_ifc[2] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		echo '          </div>
        </span>
';
	}


	/** {block acc_trigger} on line 81 */
	public function blockAcc_trigger2(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <h5>
          <strong>';
		echo LR\Filters::escapeHtmlText($item['anchor']) /* line 83 */;
		echo '</strong> ✅
        </h5>
';
	}


	/** {block acc_content} on line 87 */
	public function blockAcc_content2(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <span>
          <div class="test-custom-class">
';
		if (!empty($item['content']['title'])) /* line 90 */ {
			echo '            <h4>';
			echo LR\Filters::escapeHtmlText($item['content']['title']) /* line 90 */;
			echo '</h4>
';
		}
		ob_start(function () {});
		try {
			echo '            <p>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($item['content']['text']) /* line 91 */;
			} finally {
				$ʟ_ifc[3] = rtrim(ob_get_flush()) === '';
			}
			echo '</p>
';
		} finally {
			if ($ʟ_ifc[3] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		echo '          </div>
        </span>
';
	}


	/** {block acc_trigger} on line 117 */
	public function blockAcc_trigger3(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '      <h5>
        <strong>';
		echo LR\Filters::escapeHtmlText($item['anchor']) /* line 119 */;
		echo ' - lvl1</strong> ✅
      </h5>
';
	}


	/** {block acc_content} on line 123 */
	public function blockAcc_content3(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		
		$this->enterBlockLayer(5, get_defined_vars()) /* line 124 */;
		if (false) {
			$this->renderBlock('acc_trigger', get_defined_vars()) /* line 128 */;
			echo '

';
			$this->renderBlock('acc_content', get_defined_vars()) /* line 134 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_accordion'), ['items' => $test_acc_items], "embed")->renderToContentType('html') /* line 124 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo "\n";
	}


	/** {block acc_trigger} on line 128 */
	public function blockAcc_trigger4(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '          <h5>
            <strong>';
		echo LR\Filters::escapeHtmlText($item['anchor']) /* line 130 */;
		echo ' - lvl2</strong> ✅
          </h5>
';
	}


	/** {block acc_content} on line 134 */
	public function blockAcc_content4(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		if ($index === 0) /* line 135 */ {
			
			$this->enterBlockLayer(6, get_defined_vars()) /* line 136 */;
			if (false) {
				$this->renderBlock('acc_trigger', get_defined_vars()) /* line 142 */;
				echo '

';
				$this->renderBlock('acc_content', get_defined_vars()) /* line 148 */;
				echo "\n";
			}
			try {
				$this->createTemplate(tr_part('_accordion'), ['items' => $test_acc_items,
					'collapse_siblings' => true,
					'easing' => 'cubic-bezier(1,-0.06, 0, 1.56)'], "embed")->renderToContentType('html') /* line 136 */;
			} finally {
				$this->leaveBlockLayer();
			}
			echo '

';
		} else /* line 159 */ {
			echo '            <span>
            <div class="test-custom-class">
              <h4>lvl2</h4>
';
			if (!empty($item['content']['title'])) /* line 163 */ {
				echo '              <h4>';
				echo LR\Filters::escapeHtmlText($item['content']['title']) /* line 163 */;
				echo '</h4>
';
			}
			ob_start(function () {});
			try {
				echo '              <p>';
				ob_start();
				try {
					echo LR\Filters::escapeHtmlText($item['content']['text']) /* line 164 */;
				} finally {
					$ʟ_ifc[5] = rtrim(ob_get_flush()) === '';
				}
				echo '</p>
';
			} finally {
				if ($ʟ_ifc[5] ?? null) {
					ob_end_clean();
				} else {
					echo ob_get_clean();
				}
			}
			echo '            </div>
          </span>
';
		}
		
	}


	/** {block acc_trigger} on line 142 */
	public function blockAcc_trigger5(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '                <h5>
                  <strong>';
		if ($index === 0) /* line 144 */ {
			echo 'INDEX0';
		}
		echo LR\Filters::escapeHtmlText($item['anchor']) /* line 144 */;
		echo ' - lvl3</strong> ✅
                </h5>
';
	}


	/** {block acc_content} on line 148 */
	public function blockAcc_content5(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '                <span>
                  <div class="test-custom-class">
                    <h4>lvl3</h4>
';
		if (!empty($item['content']['title'])) /* line 152 */ {
			echo '                    <h4>';
			echo LR\Filters::escapeHtmlText($item['content']['title']) /* line 152 */;
			echo '</h4>
';
		}
		ob_start(function () {});
		try {
			echo '                    <p>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($item['content']['text']) /* line 153 */;
			} finally {
				$ʟ_ifc[4] = rtrim(ob_get_flush()) === '';
			}
			echo '</p>
';
		} finally {
			if ($ʟ_ifc[4] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		echo '                  </div>
                </span>
';
	}


	/** {block collapsible_trigger} on line 212 */
	public function blockCollapsible_trigger(array $ʟ_args): void
	{
		echo '        Regular Click Dropdown
';
	}


	/** {block collapsible_content} on line 215 */
	public function blockCollapsible_content(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <h5>Will close on outside click</h5>
        <p>
          ';
		echo LR\Filters::escapeHtmlText(substr($dummy_collapsible_content, 0, rand(40, strlen($dummy_collapsible_content) - 1))) /* line 218 */;
		echo '
        </p>
';
	}


	/** {block collapsible_trigger} on line 229 */
	public function blockCollapsible_trigger1(array $ʟ_args): void
	{
		echo '        Regular Click Dropdown
';
	}


	/** {block collapsible_content} on line 232 */
	public function blockCollapsible_content1(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <h5>Will close on outside click</h5>
        <p>
          ';
		echo LR\Filters::escapeHtmlText(substr($dummy_collapsible_content, 0, rand(40, strlen($dummy_collapsible_content) - 1))) /* line 235 */;
		echo '
        </p>
';
	}


	/** {block collapsible_trigger} on line 246 */
	public function blockCollapsible_trigger2(array $ʟ_args): void
	{
		echo '        Regular Click Dropdown
';
	}


	/** {block collapsible_content} on line 249 */
	public function blockCollapsible_content2(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <h5>Hover</h5>
        <p>
          ';
		echo LR\Filters::escapeHtmlText(substr($dummy_collapsible_content, 0, rand(40, strlen($dummy_collapsible_content) - 1))) /* line 252 */;
		echo '
        </p>
';
	}


	/** {block collapsible_trigger} on line 264 */
	public function blockCollapsible_trigger3(array $ʟ_args): void
	{
		echo '        Hover Absolute
';
	}


	/** {block collapsible_content} on line 267 */
	public function blockCollapsible_content3(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <h5>Will close on outside click</h5>
        <p>
          ';
		echo LR\Filters::escapeHtmlText(substr($dummy_collapsible_content, 0, rand(40, strlen($dummy_collapsible_content) - 1))) /* line 270 */;
		echo '
        </p>
';
	}


	/** {block collapsible_trigger} on line 365 */
	public function blockCollapsible_trigger4(array $ʟ_args): void
	{
		echo '        <img 
          alt="test" 
          src="https://source.unsplash.com/40x40" 
          width="40" 
          height="40" 
       >
        <h5 style="margin-left: 10px;">Hover, custom keyframes</h5>
';
	}


	/** {block collapsible_content} on line 374 */
	public function blockCollapsible_content4(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <h5>Hover - custom easing</h5>
        <p>
          ';
		echo LR\Filters::escapeHtmlText(substr($dummy_collapsible_content, 0, rand(40, strlen($dummy_collapsible_content) - 1))) /* line 377 */;
		echo '
        </p>
';
	}


	/** {block collapsible_trigger} on line 391 */
	public function blockCollapsible_trigger5(array $ʟ_args): void
	{
		echo '        <img 
          alt="test" 
          src="https://source.unsplash.com/40x40" 
          width="40" 
          height="40" 
       >
        <h5 style="margin-left: 10px;">Hover, custom keyframes</h5>
';
	}


	/** {block collapsible_content} on line 400 */
	public function blockCollapsible_content5(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <h5>Trigger on hover, custom keyframes</h5>
        <p>
          ';
		echo LR\Filters::escapeHtmlText(substr($dummy_collapsible_content, 0, rand(40, strlen($dummy_collapsible_content) - 1))) /* line 403 */;
		echo '
        </p>
';
	}


	/** {block collapsible_trigger} on line 419 */
	public function blockCollapsible_trigger6(array $ʟ_args): void
	{
		echo '        <img 
          alt="test" 
          src="https://source.unsplash.com/40x40" 
          width="40" 
          height="40" 
       >
        <h5 style="margin-left: 10px;">Hover, custom keyframes</h5>
';
	}


	/** {block collapsible_content} on line 428 */
	public function blockCollapsible_content6(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '        <h5>Trigger on hover, custom keyframes</h5>
        <p>
          ';
		echo LR\Filters::escapeHtmlText(substr($dummy_collapsible_content, 0, rand(40, strlen($dummy_collapsible_content) - 1))) /* line 431 */;
		echo '
        </p>
';
	}

}

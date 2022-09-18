<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/parts/todo-remove-examples.latte */
final class Template203ed5b4c3 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		1 => ['tab_anchor' => 'blockTab_anchor', 'tab_panel' => 'blockTab_panel'],
		2 => ['acc_trigger' => 'blockAcc_trigger', 'acc_content' => 'blockAcc_content'],
		3 => ['acc_trigger' => 'blockAcc_trigger1', 'acc_content' => 'blockAcc_content1'],
		4 => ['tab_anchor' => 'blockTab_anchor1', 'tab_panel' => 'blockTab_panel1'],
		5 => ['slide' => 'blockSlide'],
		6 => ['slide_q' => 'blockSlide_q', 'after_loop' => 'blockAfter_loop'],
		7 => ['slide' => 'blockSlide1'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '<div class="container" id="smooth-start">
  <h2>SMOOTH SCROLL EXAMPLE</h2>
  <a class="btn btn--brand" href="#smooth-end">Scroll down</a>
</div>


	<section>
		<div class="container">

		<style>
			.collapsible, .collapsible__trigger {
				width: 100%;
			}

			.collapsible__content {
				background: #fff;
				width: 100%;
			}

			.collapsible__content__inner p {
				margin-bottom: 0;
			}

			.collapsible[data-select] .collapsible__content__inner {
				display: flex;
				flex-direction: column;
			}

			.accordion .collapsible {
				margin-bottom: 0;
			}

			.accordion .collapsible__trigger {
				padding: 12px 20px;
				box-shadow: inset 0 0 0 1px black;
			}

			.nested-accordions .collapsible__content__inner {
				padding-right: 0;
			}
		</style>

';
		$test_acc_items = [
			[
				'anchor' => 'Accordion Item 1',
				'content' => [
					'title' => 'Accordion Item Content 1 Title',
					'text'  => 'Accordion Item Content 1 text that is very long',
				]
			],
			[
				'anchor' => 'Accordion Item 2',
				'content' => [
					'text'  => 'Accordion Item Content 2 text that is very long',
				]
			],
			[
				'anchor' => 'Accordion Item 3',
				'content' => [
					'title' => 'Accordion Item Content 3 Title',
					'text'  => 'Accordion Item Content 3 text that is very long',
				]
			]
		] /* line 43 */;
		echo "\n";
		$this->createTemplate(tr_part('_collapsibles'), ['test_acc_items' => $test_acc_items] + $this->params, 'include')->renderToContentType('html') /* line 66 */;
		echo '

			<h2 class="mb40">Typography</h2>
			<div class="f-row" style="--i-cols: 2; --i-gap: 30">
				<div class="col">
					<div>
						<strong class="mb40">Headlines</strong>
						<h1>Headline 1</h1>
						<h2>Headline 2</h2>
						<h3>Headline 3</h3>
						<h4>Headline 4</h4>
						<h5>Headline 5</h5>
						<h6>Headline 6</h6>

						<strong class="mb40">Unordered List</strong>
						<ul>
							<li>List item 1</li>
							<li>List item 2</li>
							<li>List item 3</li>
							<li>List item 4</li>
							<li>List item 5</li>
						</ul>
					</div>
				</div>
				<div class="col">
					<div>
						<strong class="mb40">Paragraph</strong>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in <strong>Bold</strong> in <a href="#" target="_blank">Link</a> velit esse
						cillum dolore eu fugiat nulla pariatur. <em>Italic</em> sint occaecat cupidatat non
						proident, sunt in culpa qui <strong><em>Bold Italic</em></strong> deserunt mollit anim id est laborum.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ipsam aliquam modi voluptatum itaque sed fuga non quisquam quas eveniet?</p>

						<strong class="mb40">Ordered List</strong>
						<ol>
							<li>List item 1</li>
							<li>List item 2</li>
							<li>List item 3</li>
							<li>List item 4</li>
							<li>List item 5</li>
						</ol>
					</div>
				</div>
			</div>

		</div><!-- cont -->
	</section>


	<hr>


		<section>
		<div class="container">
			<h2>Spinners / Loaders</h2>

			<div class="spinner-wrap" style="width: 100px; height: 100px;">
				<div class="lds-ripple">
					<div></div>
					<div></div>
				</div>
			</div>
		</div>
	</section>


	<hr>



	<section>
		<div class="container">

			<div class="f-row" style="--i-cols: 2; --i-gap: 30">
				<div class="col">
	
						<h4>Tabs (with nested accordion)</h4>
';
		$test_tabs = [
			[
				'anchor' => 'Tab 1',
				'content' => [
					'title' => 'Tab Panel 1 Title',
					'text'  => 'Tab Panel 1 text that is very long',
				]
			],
			[
				'anchor' => 'Tab 2',
				'content' => [
					'text'  => 'Tab Panel 2 text that is very long',
				]
			],
			[
				'anchor' => 'Tab 3',
				'content' => [
					'title' => 'Tab Panel 3 Title',
					'text'  => 'Tab Panel 3 text that is very long',
				]
			]
		] /* line 146 */;
		echo "\n";
		$this->enterBlockLayer(1, get_defined_vars()) /* line 169 */;
		if (false) {
			$this->renderBlock('tab_anchor', get_defined_vars()) /* line 170 */;
			echo '

';
			$this->renderBlock('tab_panel', get_defined_vars()) /* line 176 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_tabs'), ['tabs' => $test_tabs, 'class' => 'optional-test-class-2'], "embed")->renderToContentType('html') /* line 169 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
				</div>

				<div class="col">
					<h4>Accordion (with nested tabs)</h4>
';
		$this->enterBlockLayer(3, get_defined_vars()) /* line 213 */;
		if (false) {
			$this->renderBlock('acc_trigger', get_defined_vars()) /* line 219 */;
			echo '

';
			$this->renderBlock('acc_content', get_defined_vars()) /* line 225 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_accordion'), ['items' => $test_acc_items,
				'initially_open_item' => 0,
				'collapse_siblings' => true], "embed")->renderToContentType('html') /* line 213 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
				</div>
			</div>


		</div><!-- cont -->
	</section>


	<section>
		<div class="container">
			<hr>
		</div>
	</section>


<section class="sliders">
	<style>
		.sliders {
			max-width: 100%;
			overflow: hidden;
		}
	</style>

	<div
		class="container"
		style="margin-bottom: 100px;"
	>
  <h2>SLIDERS (init in InitSliders class)</h2>

  <h3>GRID THAT TURNS INTO A SLIDER FOR MOBILE</h3>
';
		$test_slides = [
			[
				'src' => 'https://images.unsplash.com/photo-1657788913352-1ce366729324?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTY1Ng&ixlib=rb-1.2.1&q=80&w=353',
				'alt' => 'Slide Image 1',
			],
			[
				'src' => 'https://images.unsplash.com/photo-1655930119888-d3cd121fa5e6?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTc2Mw&ixlib=rb-1.2.1&q=80&w=353',
				'alt' => 'Slide Image 2',
			],
			[
				'src' => 'https://images.unsplash.com/photo-1657047408480-5c53b418b394?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTc4Mw&ixlib=rb-1.2.1&q=80&w=353',
				'alt' => 'Slide Image 3',
			],
			[
				'src' => 'https://images.unsplash.com/photo-1656693391610-7f16ca839254?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTc5NQ&ixlib=rb-1.2.1&q=80&w=353',
				'alt' => 'Slide Image 4',
			],
			[
				'src' => 'https://images.unsplash.com/photo-1657879005206-3a27c0b782f2?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTgwOA&ixlib=rb-1.2.1&q=80&w=353',
				'alt' => 'Slide Image 5',
			],
			[
				'src' => 'https://images.unsplash.com/photo-1655552360649-9871415760b6?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTgyMA&ixlib=rb-1.2.1&q=80&w=353',
				'alt' => 'Slide Image 6',
			]
		] /* line 283 */;
		echo '

';
		$this->enterBlockLayer(5, get_defined_vars()) /* line 311 */;
		if (false) {
			$this->renderBlock('slide', get_defined_vars()) /* line 316 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_slider'), ['class' => 'slider--test',
				'slides' => $test_slides], "embed")->renderToContentType('html') /* line 311 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '

		<hr>

		<h3 style="margin-top: 100px;">(WP_Query) GRID THAT TURNS INTO A SLIDER FOR MOBILE</h3>

';
		$posts_query = (new WP_Query(
		array(
		'post_type' => 'post',
		'posts_per_page' => 6,
		'orderby'        => 'DESC',
		)
		)) /* line 331 */;
		echo "\n";
		$this->enterBlockLayer(6, get_defined_vars()) /* line 339 */;
		if (false) {
			$this->renderBlock('slide_q', get_defined_vars()) /* line 344 */;
			echo '

';
			$this->renderBlock('after_loop', get_defined_vars()) /* line 350 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_slider'), ['class' => 'slider--test',
				'slides' => $posts_query], "embed")->renderToContentType('html') /* line 339 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '

	</div>


  <div class="container"><h3>LOOPED SLIDER</h3></div>
	<div>
';
		$this->enterBlockLayer(7, get_defined_vars()) /* line 362 */;
		if (false) {
			$this->renderBlock('slide', get_defined_vars()) /* line 367 */;
			echo "\n";
		}
		try {
			$this->createTemplate(tr_part('_slider'), ['class' => 'slider--test2',
				'slides' => $test_slides], "embed")->renderToContentType('html') /* line 362 */;
		} finally {
			$this->leaveBlockLayer();
		}
		echo '
	</div>

</section>





<div class="container">
	<h2>Flex Grid</h2>
</div>

<section>
  <div class="container">
		<div
			class="f-row"
			style="--i-cols: 4; --i-gap: 35;">
';
		for ($i = 0;
		$i < 12;
		$i++) /* line 394 */ {
			echo '				<div class="col" style="box-shadow: inset 0 0 0 1px red;">
					<div class="col-content">Column</div>
				</div>
';
		}
		echo '		</div>
	</div>
</section>

<section>
	<div class="container">
		<div
			class="f-row"
			style="--i-cols: 3; --i-gap: 15; --i-mb: 10;">
';
		for ($i = 0;
		$i < 4;
		$i++) /* line 408 */ {
			echo '				<div class="col" style="box-shadow: inset 0 0 0 1px red;">
					<div class="col-content">Column</div>
				</div>
';
		}
		echo '		</div>
	</div>
</section>

<section>
	<div class="container">
		<div
			class="f-row"
			style="--i-cols: 4; --i-gap: 30; --i-mb: 10;">
';
		for ($i = 0;
		$i < 6;
		$i++) /* line 422 */ {
			echo '				<div class="col" style="box-shadow: inset 0 0 0 1px red;">
					<div class="col-content">Column</div>
				</div>
';
		}
		echo '		</div>
	</div>
</section>

<section>
	<div class="container">
		<div
			class="f-row"
			style="--i-cols: 5; --i-gap: 15; --i-mb: 10;">
';
		for ($i = 0;
		$i < 10;
		$i++) /* line 436 */ {
			echo '				<div class="col" style="box-shadow: inset 0 0 0 1px red;">
					<div class="col-content">Column</div>
				</div>
';
		}
		echo '		</div>
	</div>
</section>

<section>
	<div class="container">
		<div
			class="f-row"
			style="--i-cols: 6; --i-gap: 15; --i-mb: 10;">
';
		for ($i = 0;
		$i < 8;
		$i++) /* line 450 */ {
			echo '				<div class="col" style="box-shadow: inset 0 0 0 1px red;">
					<div class="col-content">Column</div>
				</div>
';
		}
		echo '		</div>
	</div>
</section>

<section>
	<div class="container">
		<div
			class="f-row"
			style="--i-cols: 7; --i-gap: 15; --i-mb: 10;">
';
		for ($i = 0;
		$i < 9;
		$i++) /* line 464 */ {
			echo '				<div class="col" style="box-shadow: inset 0 0 0 1px red;">
					<div class="col-content">Column</div>
				</div>
';
		}
		echo '		</div>
	</div>
</section>

<section>
	<div class="container">
		<h2>Flex Grid - two-cols-custom</h2>
		<div
			class="f-row two-cols-custom"
			style="--i-gap: 40; --i-mb: 0; --i-first-col-w: 70%;">
';
		for ($i = 0;
		$i < 2;
		$i++) /* line 479 */ {
			echo '				<div class="col" style="box-shadow: inset 0 0 0 1px red;">
					<div class="col-content">Column</div>
				</div>
';
		}
		echo '		</div>
	</div>
</section>

<section>
	<div class="container">
		<h2>Flex Grid - two-cols-custom</h2>
		<div
			class="f-row two-cols-custom"
			style="--i-cols: 2; --i-gap: 90; --i-mb: 0; --i-first-col-w: 390px;">
';
		for ($i = 0;
		$i < 2;
		$i++) /* line 494 */ {
			echo '				<div class="col" style="box-shadow: inset 0 0 0 1px red;">
					<div class="col-content">Column</div>
				</div>
';
		}
		echo '		</div>
	</div>
</section>

<section>
	<div class="container">
		<h2>Flex Grid - no-gutter</h2>
		<div
			class="f-row"
			style="--i-cols: 5;"
		>
';
		for ($i = 0;
		$i < 10;
		$i++) /* line 510 */ {
			echo '				<div class="col" style="box-shadow: inset 0 0 0 1px red;">
					<div class="col-content">Column</div>
				</div>
';
		}
		echo '		</div>
	</div><!-- cont -->
</section>




<div class="container" id="smooth-end">
  <h2>SMOOTH SCROLL EXAMPLE END</h2>
  <a class="btn btn--brand" href="#smooth-start">Scroll up</a>
</div>






<section>
	<div class="container">
		<h2>SVG IMPORTING</h2>

		<div class="f-row" style="--i-cols: 4; --i-gap: 15">
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from theme assets synchronously example</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media('svg-1.svg')) /* line 541 */;
		echo '

					<br><br><br>
					<h4>Get the SVG path only without outputting its code</h4>
					<br><br>
					<img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(tr_get_media_path('logo.svg'))) /* line 546 */;
		echo '" alt="yo">
				</div>
			</div>
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from theme assets asynchronously example</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media('svg-1.svg', true)) /* line 553 */;
		echo '
				</div>
			</div>
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from uploads (media) synchronously example</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media('http://localhost/theme_redone/wp-content/uploads/2022/03/svg-1.svg')) /* line 560 */;
		echo '
				</div>
			</div>

			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from uploads (media) asynchronously example</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media('http://localhost/theme_redone/wp-content/uploads/2022/03/svg-1.svg', true)) /* line 568 */;
		echo '
				</div>
			</div>
		</div>

	</div>
</section>




<section class="temp-images-importing">
	<div class="container">
		<h2>IMAGES IMPORTING</h2>
		<style>
			.temp-images-importing .tr-img-wrap-outer {
				max-width: 100%;
			}
		</style>
		<div class="f-row" style="--i-cols: 3; --i-gap: 30">
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Read image from theme assets synchronously</h4>
					<br><br>
					<h5>No ALT</h5>

<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{var $img_1_data_string = \'people/photo-1517299151253-d0449b733f57.jpg\'}
{tr_get_media($img_1_data_string)}
</code>
</pre>
';
		$img_1_data_string = 'people/photo-1517299151253-d0449b733f57.jpg' /* line 600 */;
		echo '					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_1_data_string)) /* line 601 */;
		echo '

					<br><br>
					<h5>Don\'t Print (Only useful for debugging and showing how it will look like for some reason)</h5><br>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media($img_1_data_string, false, true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_1_data_string, false, true)) /* line 610 */;
		echo '

					<br><br>
					<h5>With ALT</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{var $img_2_data_array = [\'src\' => \'people/photo-1517299151253-d0449b733f57.jpg\', \'alt\' => \'manually added alt text\']}
{tr_get_media($img_2_data_array)}
</code>
</pre>
';
		$img_2_data_array = ['src' => 'people/photo-1517299151253-d0449b733f57.jpg', 'alt' => 'manually added alt text'] /* line 620 */;
		echo '					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array)) /* line 621 */;
		echo '

					<br><br>
					<h5>With ALT and class</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{var $img_2_data_array_with_class = $img_2_data_array}
{var $img_2_data_array_with_class[\'class\'] = \'custom-class\'}
{tr_get_media($img_2_data_array_with_class)}
</code>
</pre>
';
		$img_2_data_array_with_class = $img_2_data_array /* line 632 */;
		$img_2_data_array_with_class['class'] = 'custom-class' /* line 633 */;
		echo '					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array_with_class)) /* line 634 */;
		echo '
				</div>
			</div>
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Read image from theme assets asynchronously</h4>
					<br><br>

					<h5>No ALT String</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media($img_1_data_string, true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_1_data_string, true)) /* line 648 */;
		echo '

					<h5>No ALT Array</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media([\'src\' => \'people/photo-1517299151253-d0449b733f57.jpg\'], true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media(['src' => 'people/photo-1517299151253-d0449b733f57.jpg'], true)) /* line 656 */;
		echo '

					<h5>With manually wrritten ALT Array</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media($img_2_data_array, true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array, true)) /* line 664 */;
		echo '

					<br><br>
					<h5>With ALT and class</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media($img_2_data_array_with_class, true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array_with_class, true)) /* line 673 */;
		echo '
				</div>
			</div>

			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Read background image from theme assets asynchronously</h4>
					<br><br>
					<h5>Get only media path</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
&lt;div style="background-image: url({tr_get_media_path($img_1_data_string)})"&gt;&lt;/div&gt;
</code>
</pre>
					<div
						style="height: 333px; width: 100%; background-repeat: no-repeat; background-position: center; background-size: cover;"
						class="js-img-lazy jsLoading"
						data-img-src="';
		echo LR\Filters::escapeHtmlAttr(tr_get_media_path($img_1_data_string)) /* line 690 */;
		echo '"
					>
					</div>
					<br><br>
					<h4>Print Image manually with path only to src</h4>
					<br><br>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
&lt;img src="{tr_get_media_path($img_1_data_string)}" /&gt;
</code>
</pre>
					<img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(tr_get_media_path($img_1_data_string))) /* line 701 */;
		echo '">
				</div>
			</div>
		</div>

	</div>
</section>





<section>
	<div class="container">
		<h2>BUTTONS</h2>
';
		$btn_vars = ['brand', 'brand-outline', 'sec', 'sec-outline', 'ghost', 'ghost--brand', 'ghost--sec'] /* line 716 */;
		echo "\n";
		$iterations = 0;
		foreach ($btn_vars as $btn_var) /* line 718 */ {
			echo '		<a href="#" class="btn btn--';
			echo LR\Filters::escapeHtmlAttr($btn_var) /* line 718 */;
			echo '">Btn ';
			echo LR\Filters::escapeHtmlText($btn_var) /* line 718 */;
			echo '</a>
';
			$iterations++;
		}
		echo '	</div>
</section>



<section>
	<div class="container">
		<h2>Modal</h2>

		<a href="#modal-example" class="btn btn--brand modalTrigger">Open Modal</a>

		';
		echo LR\Filters::escapeHtmlText(tr_modal_start('modal-example', 'Modal Title here', 'modal-additional-class')) /* line 730 */;
		echo '
			<h3>Modal</h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		';
		echo LR\Filters::escapeHtmlText(tr_modal_end()) /* line 740 */;
		echo '

	</div>
</section>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['btn_var' => '718'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}


	/** {block tab_anchor} on line 170 */
	public function blockTab_anchor(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '							<span>
								<strong>';
		echo LR\Filters::escapeHtmlText($ta_content['anchor']) /* line 172 */;
		echo '</strong> ✅
							</span>
';
	}


	/** {block tab_panel} on line 176 */
	public function blockTab_panel(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		if ($tp_key === 0) /* line 177 */ {
			
			$this->enterBlockLayer(2, get_defined_vars()) /* line 178 */;
			if (false) {
				$this->renderBlock('acc_trigger', get_defined_vars()) /* line 184 */;
				echo '

';
				$this->renderBlock('acc_content', get_defined_vars()) /* line 190 */;
				echo "\n";
			}
			try {
				$this->createTemplate(tr_part('_accordion'), ['items' => $test_acc_items,
					'initially_open_item' => 0,
					'collapse_siblings' => true], "embed")->renderToContentType('html') /* line 178 */;
			} finally {
				$this->leaveBlockLayer();
			}
			echo "\n";
		} else /* line 199 */ {
			echo '								<span>
									<div class="test-custom-class">
';
			if (!empty($tp_content['content']['title'])) /* line 202 */ {
				echo '										<h3>';
				echo LR\Filters::escapeHtmlText($tp_content['content']['title']) /* line 202 */;
				echo '</h3>
';
			}
			ob_start(function () {});
			try {
				echo '										<p>';
				ob_start();
				try {
					echo LR\Filters::escapeHtmlText($tp_content['content']['text']) /* line 203 */;
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
			echo '									</div>
								</span>
';
		}
		
	}


	/** {block acc_trigger} on line 184 */
	public function blockAcc_trigger(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '										<h5>
											<strong>';
		echo LR\Filters::escapeHtmlText($item['anchor']) /* line 186 */;
		echo '</strong> ✅
										</h5>
';
	}


	/** {block acc_content} on line 190 */
	public function blockAcc_content(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '										<span>
											<div class="test-custom-class">
';
		if (!empty($item['content']['title'])) /* line 193 */ {
			echo '												<h3>';
			echo LR\Filters::escapeHtmlText($item['content']['title']) /* line 193 */;
			echo '</h3>
';
		}
		ob_start(function () {});
		try {
			echo '												<p>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($item['content']['text']) /* line 194 */;
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
		echo '											</div>
										</span>
';
	}


	/** {block acc_trigger} on line 219 */
	public function blockAcc_trigger1(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '							<h5>
								<strong>';
		echo LR\Filters::escapeHtmlText($item['anchor']) /* line 221 */;
		echo '</strong> ✅
							</h5>
';
	}


	/** {block acc_content} on line 225 */
	public function blockAcc_content1(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		if ($index === 0) /* line 226 */ {
			
			$this->enterBlockLayer(4, get_defined_vars()) /* line 227 */;
			if (false) {
				$this->renderBlock('tab_anchor', get_defined_vars()) /* line 228 */;
				echo '

';
				$this->renderBlock('tab_panel', get_defined_vars()) /* line 234 */;
				echo "\n";
			}
			try {
				$this->createTemplate(tr_part('_tabs'), ['tabs' => $test_tabs, 'class' => 'optional-test-class'], "embed")->renderToContentType('html') /* line 227 */;
			} finally {
				$this->leaveBlockLayer();
			}
			echo "\n";
		} else /* line 243 */ {
			echo '								<span>
									<div class="test-custom-class">
';
			if (!empty($item['content']['title'])) /* line 246 */ {
				echo '										<h3>';
				echo LR\Filters::escapeHtmlText($item['content']['title']) /* line 246 */;
				echo '</h3>
';
			}
			ob_start(function () {});
			try {
				echo '										<p>';
				ob_start();
				try {
					echo LR\Filters::escapeHtmlText($item['content']['text']) /* line 247 */;
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
			echo '									</div>
								</span>
';
		}
		
	}


	/** {block tab_anchor} on line 228 */
	public function blockTab_anchor1(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '										<span>
											<strong>';
		echo LR\Filters::escapeHtmlText($ta_content['anchor']) /* line 230 */;
		echo '</strong> ✅
										</span>
';
	}


	/** {block tab_panel} on line 234 */
	public function blockTab_panel1(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '										<span>
											<div class="test-custom-class">
';
		if (!empty($tp_content['content']['title'])) /* line 237 */ {
			echo '												<h3>';
			echo LR\Filters::escapeHtmlText($tp_content['content']['title']) /* line 237 */;
			echo '</h3>
';
		}
		ob_start(function () {});
		try {
			echo '												<p>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($tp_content['content']['text']) /* line 238 */;
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
		echo '											</div>
										</span>
';
	}


	/** {block slide} on line 316 */
	public function blockSlide(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '				<div style="box-shadow: 0 0 0 1px blue">
';
		ob_start(function () {});
		try {
			echo '					<h5>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($s_key) /* line 318 */;
				echo ' - ';
				echo LR\Filters::escapeHtmlText($s_content['alt']) /* line 318 */;
			} finally {
				$ʟ_ifc[5] = rtrim(ob_get_flush()) === '';
			}
			echo '</h5>
';
		} finally {
			if ($ʟ_ifc[5] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		echo '					<img 
						src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($s_content['src'])) /* line 320 */;
		echo '"
						alt="';
		echo LR\Filters::escapeHtmlAttr($s_content['alt']) /* line 321 */;
		echo '"
				>
				</div>
';
	}


	/** {block slide_q} on line 344 */
	public function blockSlide_q(array $ʟ_args): void
	{
		echo '				<div style="box-shadow: 0 0 0 1px blue">
					<h5>';
		echo LR\Filters::escapeHtmlText(the_title()) /* line 346 */;
		echo '</h5>
				</div>
';
	}


	/** {block after_loop} on line 350 */
	public function blockAfter_loop(array $ʟ_args): void
	{
		echo '				<div style="padding: 10px; box-shadow: 0 0 0 1px orange;">
					<strong>pagination can be added here</strong>
				</div>
';
	}


	/** {block slide} on line 367 */
	public function blockSlide1(array $ʟ_args): void
	{
		extract(end($this->varStack));
		extract($ʟ_args);
		unset($ʟ_args);
		echo '				<div style="box-shadow: 0 0 0 1px blue">
';
		ob_start(function () {});
		try {
			echo '					<h5>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($s_key) /* line 369 */;
				echo ' - ';
				echo LR\Filters::escapeHtmlText($s_content['alt']) /* line 369 */;
			} finally {
				$ʟ_ifc[6] = rtrim(ob_get_flush()) === '';
			}
			echo '</h5>
';
		} finally {
			if ($ʟ_ifc[6] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		echo '					<img 
						src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($s_content['src'])) /* line 371 */;
		echo '"
						alt="';
		echo LR\Filters::escapeHtmlAttr($s_content['alt']) /* line 372 */;
		echo '"
				>
				</div>
';
	}

}

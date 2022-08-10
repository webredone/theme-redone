<?php
// source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme_redone/views/partials/todo-remove-examples.latte

use Latte\Runtime as LR;

final class Template48e98182f3 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<div class="container" id="smooth-start">
  <h2>SMOOTH SCROLL EXAMPLE</h2>
  <a class="btn btn--brand" href="#smooth-end">Scroll down</a>
</div>



	<section>
		<div class="container">
			<h2 class="mb40">Typography</h2>
			<div class="f-row" style="--i-cols: 2; --i-gap: 30">
				<div class="col">
					<div  >
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
					<div  >
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
					<div>
						<h4>Tabs</h4>
						<div class="tabs-wrap">
';
		$tabs = ['tab 1', 'tab 2', 'tab 3', 'tab 4'];
		echo '							<!-- Tabs ctrls -->
							<div class="nav-tab nav">
';
		$iterations = 0;
		foreach ($tabs as $key => $value) {
			echo '									<button type="button" class="tab-anchor ';
			echo LR\Filters::escapeHtmlAttr($key == 0 ? 'activeTab' : '') /* line 92 */;
			echo '" data-href="panel-';
			echo LR\Filters::escapeHtmlAttr($key) /* line 92 */;
			echo '">
										';
			echo LR\Filters::escapeHtmlText($value) /* line 93 */;
			echo '
									</button>
';
			$iterations++;
		}
		echo '							</div>

							<!-- Tab panel -->
							<div class="tab-content">
';
		$iterations = 0;
		foreach ($tabs as $ckey => $cvalue) {
			echo '									<div class="tab-panel ';
			echo LR\Filters::escapeHtmlAttr($ckey == 0 ? 'activeTab enter' : '') /* line 101 */;
			echo '" data-id="panel-';
			echo LR\Filters::escapeHtmlAttr($ckey) /* line 101 */;
			echo '">
										<div class="tab-panel__content">
											<h4>';
			echo LR\Filters::escapeHtmlText($cvalue) /* line 103 */;
			echo ' Content Lorem Ipsum dolor sit amet</h4> 
											<img src="https://source.unsplash.com/1200x400" alt="">
											<p>content panel - ';
			echo LR\Filters::escapeHtmlText($cvalue) /* line 105 */;
			echo '</p> 
											<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium recusandae impedit inventore perspiciatis aperiam hic minus tenetur labore, quidem modi sint eius molestiae vitae dolor molestias ducimus dolorem facilis quasi.</p>
										</div>
									</div>
';
			$iterations++;
		}
		echo '							</div>
						</div><!-- tabs-wrap -->
					</div>
				</div>

				<div class="col">
					<div  >
						<h4>Accordion</h4>
';
		$acc_items = ['title 1', 'title 2', 'title 3'];
		echo '						<div class="tr-accordion">
';
		$iterations = 0;
		foreach ($acc_items as $key => $acc_item) {
			echo '								<div class="accordion-item ';
			echo LR\Filters::escapeHtmlAttr($key == 0 ? 'active' : '') /* line 121 */;
			echo '">
									<button type="button" class="accordion-item__btn btn-link">
										';
			echo LR\Filters::escapeHtmlText($acc_item) /* line 123 */;
			echo '
									</button> 
									<div 
										class="accordion-item__body"
';
			if ($key == 0) {
				echo '											style="max-height: none;"
';
			}
			echo '									>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla ligula hendrerit pellentesque luctus. Etiam non euismod odio. Proin eu vehicula magna, eu laoreet enim. Donec a lectus ac nunc placerat pellentesque.</p>
									</div>
								</div>
';
			$iterations++;
		}
		echo '						</div><!-- accordion -->
					</div>
				</div>
			</div>


		</div><!-- cont -->
	</section>


<section class="sliders">
	<div 
		class="container" 
		style="margin-bottom: 100px;"
	>
  <h2>SLIDERS (init in slidersInit.js file)</h2>

  <h3>GRID THAT TURNS INTO A SLIDER FOR MOBILE</h3>
		<div class="embla embla--test">
			<div class="embla__container">
';
		for ($i = 0;
		$i < 7;
		$i++) {
			echo '					<div class="embla__slide">
						<div class="embla__slide__inner">
							<div  
								style="box-shadow: 0 0 0 1px blue"
							>
								Slide ';
			echo LR\Filters::escapeHtmlText($i) /* line 161 */;
			echo '
								<img src="https://source.unsplash.com/353x250" alt="example slide">
							</div>
						</div>
					</div>
';
		}
		echo '			</div>
		</div>

		<div class="embla__buttons">
			<button 
				class="embla__btn embla__btn-prev" 
				type="button" 
				aria-label="Go to previous slide"
			></button>
			<div class="embla__dots"></div>
			<button 
				class="embla__btn embla__btn-next" 
				type="button" 
				aria-label="Go to next slide"
			></button>
		</div>
	</div>


  <div class="container"><h3>LOOPED SLIDER</h3></div>
	<div>
		<div class="embla embla--test2">
			<div class="embla__container">
';
		for ($i = 0;
		$i < 7;
		$i++) {
			echo '					<div class="embla__slide">
						<div class="embla__slide__inner">
							<div  
								style="box-shadow: 0 0 0 1px red"
							>
								Slide ';
			echo LR\Filters::escapeHtmlText($i) /* line 196 */;
			echo '
								<img src="https://source.unsplash.com/440x250" alt="example slide">
							</div>
						</div>
					</div>
';
		}
		echo '			</div>
		</div>

		<div class="embla__buttons">
			<button 
				class="embla__btn embla__btn-prev" 
				type="button" 
				aria-label="Go to previous slide"
			></button>
			<div class="embla__dots"></div>
			<button 
				class="embla__btn embla__btn-next" 
				type="button" 
				aria-label="Go to next slide"
			></button>
		</div>
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
		$i++) {
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
		$i++) {
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
		$i++) {
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
		$i++) {
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
		$i++) {
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
		$i++) {
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
		$i++) {
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
		$i++) {
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
		$i++) {
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
		<h2>Dropdowns</h2>
';
		$dropdownItems = ['dd-item1', 'dd-item2', 'dd-item3', 'dd-item4', 'dd-item5'];
		echo '		<div class="wrap" style="display: flex;">
';
		for ($i = 0;
		$i < 3;
		$i++) {
			echo '				<div class="dropdown"
					data-replace-toggle-text="true"
					data-close-on-outside-click="true"
					';
			if ($i === 0) {
				echo 'data-transition-delay="false"';
			}
			echo '
				>
					<button
						type="button"
						class="dropdown-toggle"
					>
						<span>
							';
			echo LR\Filters::escapeHtmlText($dropdownItems[0]) /* line 387 */;
			echo '
						</span>
					</button>
					<div class="dropdown-menu">
';
			$iterations = 0;
			foreach ($dropdownItems as $key => $value) {
				echo '							<div class="dropdown-item-wrap">
								<button
									type="button"
									class="dropdown-item ';
				echo LR\Filters::escapeHtmlAttr($key == 0 ? 'active' : '') /* line 395 */;
				echo '"
									data-href="panel-';
				echo LR\Filters::escapeHtmlAttr($key) /* line 396 */;
				echo '"
								>
									';
				echo LR\Filters::escapeHtmlText($value) /* line 398 */;
				echo '
								</button>
							</div>
';
				$iterations++;
			}
			echo '					</div>
				</div>
';
		}
		echo '		</div>
	</div><!-- cont -->
</section>




<section>
	<div class="container">
		<h2>SVG IMPORTING</h2>

		<div class="f-row" style="--i-cols: 4; --i-gap: 15">
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from theme assets synchronously example</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media('svg-1.svg')) /* line 421 */;
		echo '

					<br><br><br>
					<h4>Get the SVG path only without outputting its code</h4>
					<br><br>
					<img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(tr_get_media_path('logo.svg'))) /* line 426 */;
		echo '" alt="yo">
				</div>
			</div>
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from theme assets asynchronously example</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media('svg-1.svg', true)) /* line 433 */;
		echo '
				</div>
			</div>
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from uploads (media) synchronously example</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media('http://localhost/wrwp-starter/wp-content/uploads/2021/01/svg-1.svg')) /* line 440 */;
		echo '
				</div>
			</div>

			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from uploads (media) asynchronously example</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media('http://localhost/wrwp-starter/wp-content/uploads/2021/01/svg-1.svg', true)) /* line 448 */;
		echo '
				</div>
			</div>
		</div>

	</div>
</section>




<section>
	<div class="container">
		<h2>IMAGES IMPORTING</h2>
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
		$img_1_data_string = 'people/photo-1517299151253-d0449b733f57.jpg';
		echo '					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_1_data_string)) /* line 476 */;
		echo '

					<br><br>
					<h5>Don\'t Print (Only useful for debugging and showing how it will look like for some reason)</h5><br>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media($img_1_data_string, false, true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_1_data_string, false, true)) /* line 485 */;
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
		$img_2_data_array = ['src' => 'people/photo-1517299151253-d0449b733f57.jpg', 'alt' => 'manually added alt text'];
		echo '					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array)) /* line 496 */;
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
		$img_2_data_array_with_class = $img_2_data_array;
		$img_2_data_array_with_class['class'] = 'custom-class';
		echo '					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array_with_class)) /* line 509 */;
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
		echo LR\Filters::escapeHtmlText(tr_get_media($img_1_data_string, true)) /* line 523 */;
		echo '

					<h5>No ALT Array</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media([\'src\' => \'people/photo-1517299151253-d0449b733f57.jpg\'], true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media(['src' => 'people/photo-1517299151253-d0449b733f57.jpg'], true)) /* line 531 */;
		echo '

					<h5>With manually wrritten ALT Array</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media($img_2_data_array, true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array, true)) /* line 539 */;
		echo '

					<br><br>
					<h5>With ALT and class</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media($img_2_data_array_with_class, true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array_with_class, true)) /* line 548 */;
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
		echo LR\Filters::escapeHtmlAttr(tr_get_media_path($img_1_data_string)) /* line 565 */;
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
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(tr_get_media_path($img_1_data_string))) /* line 576 */;
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
		$btn_vars = ['brand', 'brand-outline', 'sec', 'sec-outline', 'ghost', 'ghost--brand', 'ghost--sec'];
		echo "\n";
		$iterations = 0;
		foreach ($btn_vars as $btn_var) {
			echo '		<a href="#" class="btn btn--';
			echo LR\Filters::escapeHtmlAttr($btn_var) /* line 593 */;
			echo '">Btn ';
			echo LR\Filters::escapeHtmlText($btn_var) /* line 593 */;
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
		echo LR\Filters::escapeHtmlText(tr_modal_start('modal-example', 'Modal Title here', 'modal-additional-class')) /* line 605 */;
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
		echo LR\Filters::escapeHtmlText(tr_modal_end()) /* line 615 */;
		echo '

	</div>
</section>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['key' => '91, 120, 391', 'value' => '91, 391', 'ckey' => '100', 'cvalue' => '100', 'acc_item' => '120', 'btn_var' => '593'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}

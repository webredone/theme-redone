<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wr-wp-starter-theme/views//partials/todo-remove-examples.latte

use Latte\Runtime as LR;

final class Templatececc111457 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<div class="container" id="smooth-start">
  <h2>SMOOTH SCROLL EXAMPLE</h2>
  <a class="btn btn--brand" href="#smooth-end">Scroll down</a>
</div>



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
			echo LR\Filters::escapeHtmlText($i) /* line 24 */;
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
			echo LR\Filters::escapeHtmlText($i) /* line 59 */;
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
			echo LR\Filters::escapeHtmlText($dropdownItems[0]) /* line 250 */;
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
				echo LR\Filters::escapeHtmlAttr($key == 0 ? 'active' : '') /* line 258 */;
				echo '"
									data-href="panel-';
				echo LR\Filters::escapeHtmlAttr($key) /* line 259 */;
				echo '"
								>
									';
				echo LR\Filters::escapeHtmlText($value) /* line 261 */;
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
		echo LR\Filters::escapeHtmlText(tr_get_media('svg-1.svg')) /* line 284 */;
		echo '

					<br><br><br>
					<h4>Get the SVG path only without outputting its code</h4>
					<br><br>
					<img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(tr_get_media_path('logo.svg'))) /* line 289 */;
		echo '" alt="yo">
				</div>
			</div>
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from theme assets asynchronously example</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media('svg-3.svg', true)) /* line 296 */;
		echo '
				</div>
			</div>
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from uploads (media) synchronously example</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media('http://localhost/wrwp-starter/wp-content/uploads/2021/01/svg-3.svg')) /* line 303 */;
		echo '
				</div>
			</div>

			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from uploads (media) asynchronously example</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media('http://localhost/wrwp-starter/wp-content/uploads/2021/01/svg-3.svg', true)) /* line 311 */;
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
		echo LR\Filters::escapeHtmlText(tr_get_media($img_1_data_string)) /* line 339 */;
		echo '

					<br><br>
					<h5>Don\'t Print (Only useful for debugging and showing how it will look like for some reason)</h5><br>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media($img_1_data_string, false, true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_1_data_string, false, true)) /* line 348 */;
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
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array)) /* line 359 */;
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
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array_with_class)) /* line 372 */;
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
		echo LR\Filters::escapeHtmlText(tr_get_media($img_1_data_string, true)) /* line 386 */;
		echo '

					<h5>No ALT Array</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media([\'src\' => \'people/photo-1517299151253-d0449b733f57.jpg\'], true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media(['src' => 'people/photo-1517299151253-d0449b733f57.jpg'], true)) /* line 394 */;
		echo '

					<h5>With manually wrritten ALT Array</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media($img_2_data_array, true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array, true)) /* line 402 */;
		echo '

					<br><br>
					<h5>With ALT and class</h5>
<pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
<code>
{tr_get_media($img_2_data_array_with_class, true)}
</code>
</pre>
					';
		echo LR\Filters::escapeHtmlText(tr_get_media($img_2_data_array_with_class, true)) /* line 411 */;
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
		echo LR\Filters::escapeHtmlAttr(tr_get_media_path($img_1_data_string)) /* line 428 */;
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
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(tr_get_media_path($img_1_data_string))) /* line 439 */;
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
			echo LR\Filters::escapeHtmlAttr($btn_var) /* line 456 */;
			echo '">Btn ';
			echo LR\Filters::escapeHtmlText($btn_var) /* line 456 */;
			echo '</a>
';
			$iterations++;
		}
		echo '	</div>
</section>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['key' => '254', 'value' => '254', 'btn_var' => '456'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}

<?php
// source: C:\xampp\htdocs\wrwps_starter/wp-content/themes/wrwps-starter-theme/views/templates/front-page.latte

use Latte\Runtime as LR;

final class Template22ce69663b extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo "\n";
		/* line 2 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/header'), $this->params, 'include')->renderToContentType('html');
		echo "\n";
		/* line 4 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/partials/hero'), ['headline' => 'Headline Latte Dynamic Example',
			'background_dark' => true] + $this->params, 'include')->renderToContentType('html');
		echo '


<section class="sliders">
	<div class="container" style="margin-bottom: 100px;">
		<div class="embla embla--test">
			<div class="embla__container">
';
		for ($i = 0;
		$i < 7;
		$i++) {
			echo '					<div class="embla__slide">
						<div class="embla__slide__inner">
							<div class="card" style="box-shadow: 0 0 0 1px blue">
								';
			echo LR\Filters::escapeHtmlText($i) /* line 20 */;
			echo '
							</div>
						</div>
					</div>
';
		}
		echo '			</div>
		</div>

		<div class="embla__buttons">
			<button class="embla__btn embla__btn-prev" type="button" aria-label="Go to previous card slide"></button>
			<div class="embla__dots"></div>
			<button class="embla__btn embla__btn-next" type="button" aria-label="Go to next card slide"></button>
		</div>
	</div>

	<div class="container">
		<div class="embla embla--test2">
			<div class="embla__container">
';
		for ($i = 0;
		$i < 7;
		$i++) {
			echo '					<div class="embla__slide">
						<div class="embla__slide__inner">
							<div class="card" style="box-shadow: 0 0 0 1px red">
								';
			echo LR\Filters::escapeHtmlText($i) /* line 42 */;
			echo '
							</div>
						</div>
					</div>
';
		}
		echo '			</div>
		</div>

		<div class="embla__buttons">
			<button class="embla__btn embla__btn-prev" type="button" aria-label="Go to previous slide"></button>
			<div class="embla__dots"></div>
			<button class="embla__btn embla__btn-next" type="button" aria-label="Go to next slide"></button>
		</div>
	</div>
</section>



<section class="content">
	<div class="container">
		';
		echo LR\Filters::escapeHtmlText(the_content()) /* line 62 */;
		echo '
	</div>
</section>

<div class="container">
	<h2>Flex Grid</h2>
</div>

<section>
  <div class="container">
		<div class="f-row" style="--i-cols: 4; --i-gap: 35;">
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
		<div class="f-row" style="--i-cols: 3; --i-gap: 15; --i-mb: 10;">
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
		<div class="f-row" style="--i-cols: 4; --i-gap: 30; --i-mb: 10;">
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
		<div class="f-row" style="--i-cols: 5; --i-gap: 15; --i-mb: 10;">
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
		<div class="f-row" style="--i-cols: 6; --i-gap: 15; --i-mb: 10;">
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
		<div class="f-row" style="--i-cols: 7; --i-gap: 15; --i-mb: 10;">
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
		<div class="f-row two-cols-custom" style="--i-gap: 40; --i-mb: 0; --i-first-col-w: 70%;">
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
		<div class="f-row two-cols-custom" style="--i-cols: 2; --i-gap: 90; --i-mb: 0; --i-first-col-w: 390px;">
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
		<div class="f-row" style="--i-cols: 5;">
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
			echo LR\Filters::escapeHtmlText($dropdownItems[0]) /* line 197 */;
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
				echo LR\Filters::escapeHtmlAttr($key == 0 ? 'active' : '') /* line 205 */;
				echo '"
									data-href="panel-';
				echo LR\Filters::escapeHtmlAttr($key) /* line 206 */;
				echo '"
								>
									';
				echo LR\Filters::escapeHtmlText($value) /* line 208 */;
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

		<div class="f-row" style="--i-cols: 3; --i-gap: 30">
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Read image from theme assets synchronously</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(($this->global->fn->tr_latte_get_img_sync)(
		($this->global->fn->tr_latte_get_img_path)('people/photo-1517299151253-d0449b733f57.jpg'),
		"Logo " . get_bloginfo()
		)) /* line 260 */;
		echo '
				</div>
			</div>
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Read image from theme assets asynchronously</h4>
					<br><br>
					';
		echo LR\Filters::escapeHtmlText(($this->global->fn->tr_latte_get_img_async)(
		($this->global->fn->tr_latte_get_img_path)('people/photo-1517299151253-d0449b733f57.jpg'),
		get_bloginfo(),
		"additional-optional-class1 additional-optional-class2"
		)) /* line 270 */;
		echo '
				</div>
			</div>

			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Read background image from theme assets asynchronously</h4>
					<br><br>
					<div
						style="height: 333px; width: 100%; background-repeat: no-repeat; background-position: center; background-size: cover;"
						class="js-img-lazy jsLoading"
						data-img-src="';
		echo LR\Filters::escapeHtmlAttr(($this->global->fn->tr_latte_get_img_path)('people/photo-1517299151253-d0449b733f57.jpg')) /* line 285 */;
		echo '"
					>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>








<section>
	<div class="container">
		<h2>Buttons example</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

		<a href="#" class="btn btn--brand">btn brand</a>
		<a href="#" class="btn btn--brand-outline">btn brand</a>
		<a href="#" class="btn btn--sec">btn sec</a>
		<a href="#" class="btn btn--sec-outline">btn sec</a>
		<a href="#" class="btn btn--ghost">btn ghost</a>
		<a href="#" class="btn btn--ghost--brand">btn ghost brand</a>
		<a href="#" class="btn btn--ghost--sec">btn ghost sec</a>
	</div>
</section>



';
		/* line 324 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/footer'), $this->params, 'include')->renderToContentType('html');
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['key' => '201', 'value' => '201'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}

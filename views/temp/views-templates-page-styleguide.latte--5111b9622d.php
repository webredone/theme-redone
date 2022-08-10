<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wr-wp-starter-theme/views/templates/page-styleguide.latte

use Latte\Runtime as LR;

final class Template5111b9622d extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo "\n";
		/* line 2 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/header'), $this->params, 'include')->renderToContentType('html');
		echo "\n";
		/* line 4 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/partials/hero'), ['headline' => 'Styleguide',
			'background_dark' => true] + $this->params, 'include')->renderToContentType('html');
		echo '
	<section>
		<div class="container">
			<h2>Buttons</h2>

			<a href="#" class="btn btn--brand">btn brand</a>
			<a href="#" class="btn btn--brand-outline">btn brand</a>
			<a href="#" class="btn btn--sec">btn sec</a>
			<a href="#" class="btn btn--sec-outline">btn sec</a>
			<a href="#" class="btn btn--ghost">btn ghost</a>
			<a href="#" class="btn btn--ghost--brand">btn ghost brand</a>
			<a href="#" class="btn btn--ghost--sec">btn ghost sec</a>
		</div>
	</section>



	<div class="container">
		<hr>
	</div>


	
	<section>
		<div class="container">
			<h2 class="mb40">Typography</h2>

			<div class="cols cols--3">
				<div class="column">
					<strong class="mb40">Headlines</strong>
		
					<h1>Headline 1</h1>
					<h2>Headline 2</h2>
					<h3>Headline 3</h3>
					<h4>Headline 4</h4>
					<h5>Headline 5</h5>
					<h6>Headline 6</h6>
				</div>

				<div class="column">
					<strong class="mb40">Paragraph</strong>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in <strong>Bold</strong> in <a href="#" target="_blank">Link</a> velit esse
					cillum dolore eu fugiat nulla pariatur. <em>Italic</em> sint occaecat cupidatat non
					proident, sunt in culpa qui <strong><em>Bold Italic</em></strong> deserunt mollit anim id est laborum.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ipsam aliquam modi voluptatum itaque sed fuga non quisquam quas eveniet?</p>
				</div>

				<div class="column">
					<strong class="mb40">Unordered List</strong>
					<ul>
						<li>List item 1</li>
						<li>List item 2</li>
						<li>List item 3</li>
						<li>List item 4</li>
						<li>List item 5</li>
					</ul>

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

		</div><!-- cont -->
	</section>



	<div class="container">
		<hr>
	</div>




	<section>
		<div class="container">
			<h2>Card</h2>

			<div class="cols cols--4">
				<div class="column">
					<article class="post-card">
						<a href="<?php the_permalink(); ?>" class="post-card__thumb h-bg-zoom">
							<div class="lds-ripple"><div></div><div></div></div>
							<div 
								class="post-card__thumb__img h-bg-zoom__img" 
								style="background-image: url(\'https://source.unsplash.com/500x400\');"></div>
						</a>
						<div class="post-card__txt">
							<h4 class="post-card__title">
								<a href="#">
									Card Title
								</a>
							</h4>
							<p class="entry-meta">
								<span class="posted-on" rel="bookmark"><time class="entry-date published updated" datetime="2019-07-25T23:54:55+00:00">July 25, 2019</time></span><span class="byline"> <i>By</i> <a href="//localhost:3000/wr-wp-starter/author/admin/">Web Redone</a></span>
							</p>
							<p class="post-card__excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod...</p>
							<ul class="post-categories"><li><a href="//localhost:3000/wr-wp-starter/category/fe/" rel="category tag">fe</a></li><li><a href="//localhost:3000/wr-wp-starter/category/seo/" rel="category tag">SEO</a></li></ul>
						</div> <!-- txt -->
					</article>
				</div><!-- col -->
			</div><!-- cont -->
		</div>
	</section>



	<div class="container">
		<hr>
	</div>



	<section class="sec-img-txt">
		<div class="container">
			<h2>img-txt-sec</h2>

				<div class="sec-img-txt__wrap">
					<div class="sec-img-txt__img-wrap">
						<img src="https://source.unsplash.com/600x750" alt="">
					</div><!-- img-wrap -->

					<div class="sec-img-txt__txt-wrap">
						<h3>Section with image and text HEADLINE</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore quisquam sint enim esse, suscipit maxime cumque at. Sed, nesciunt! Architecto consequatur repellat culpa magnam sapiente magni, fuga consectetur corporis rem?</p>
						<ul>
							<li>List item with name 1</li>
							<li>List item with name 2</li>
							<li>List item with name 3</li>
							<li>List item with name 4</li>
						</ul>
					</div>
				</div><!-- wrap -->


				<div class="sec-img-txt__wrap sec-img-txt__wrap--inverse">
					<div class="sec-img-txt__img-wrap">
						<img src="https://source.unsplash.com/600x750" alt="">
					</div><!-- img-wrap -->

					<div class="sec-img-txt__txt-wrap">
						<h3>Section with image and text HEADLINE</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore quisquam sint enim esse, suscipit maxime cumque at. Sed, nesciunt! Architecto consequatur repellat culpa magnam sapiente magni, fuga consectetur corporis rem?</p>
						<ul>
							<li>List item with name 1</li>
							<li>List item with name 2</li>
							<li>List item with name 3</li>
							<li>List item with name 4</li>
						</ul>
					</div>
				</div><!-- wrap -->
		

		</div><!-- cont -->
	</section>




	<section>
		<div class="container">
			<h2>Tabs</h2>


			<div class="tabs-wrap">
';
		$tabs = ['tab 1', 'tab 2', 'tab 3', 'tab 4'];
		echo '			  <!-- Tabs ctrls -->
			  <div class="nav-tab nav">
';
		$iterations = 0;
		foreach ($tabs as $key => $value) {
			echo '            <button type="button" class="tab-anchor ';
			echo LR\Filters::escapeHtmlAttr($key == 0 ? 'activeTab' : '') /* line 193 */;
			echo '" data-href="panel-';
			echo LR\Filters::escapeHtmlAttr($key) /* line 193 */;
			echo '">
              ';
			echo LR\Filters::escapeHtmlText($value) /* line 194 */;
			echo '
            </button>
';
			$iterations++;
		}
		echo '			  </div>

			  <!-- Tab panel -->
			  <div class="tab-content">
';
		$iterations = 0;
		foreach ($tabs as $ckey => $cvalue) {
			echo '			  		<div class="tab-panel ';
			echo LR\Filters::escapeHtmlAttr($ckey == 0 ? 'activeTab enter' : '') /* line 202 */;
			echo '" data-id="panel-';
			echo LR\Filters::escapeHtmlAttr($ckey) /* line 202 */;
			echo '">
							<div class="tab-panel__content">
								<h4>';
			echo LR\Filters::escapeHtmlText($cvalue) /* line 204 */;
			echo ' Content Lorem Ipsum dolor sit amet</h4> 
								<img src="https://source.unsplash.com/1200x400" alt="">
								<p>content panel - ';
			echo LR\Filters::escapeHtmlText($cvalue) /* line 206 */;
			echo '</p> 
								<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium recusandae impedit inventore perspiciatis aperiam hic minus tenetur labore, quidem modi sint eius molestiae vitae dolor molestias ducimus dolorem facilis quasi.</p>
								<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium recusandae impedit inventore perspiciatis aperiam hic minus tenetur labore, quidem modi sint eius molestiae vitae dolor molestias ducimus dolorem facilis quasi.</p>
								<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium recusandae impedit inventore perspiciatis aperiam hic minus tenetur labore, quidem modi sint eius molestiae vitae dolor molestias ducimus dolorem facilis quasi.</p>
							</div>
			  		</div>
';
			$iterations++;
		}
		echo '			  </div>
			</div><!-- tabs-wrap -->

		</div><!-- cont -->
	</section>


	<div class="container">
		<hr>
	</div>



';
		$acc_items = ['title 1', 'title 2', 'title 3'];
		echo '	<section>
		<div class="container">
			<h2>Accordion</h2>

			<!-- accordion template -->
			<div class="tr-accordion">
';
		$iterations = 0;
		foreach ($acc_items as $key => $acc_item) {
			echo '          <div class="accordion-item ';
			echo LR\Filters::escapeHtmlAttr($key == 0 ? 'active' : '') /* line 234 */;
			echo '">
            <button type="button" class="accordion-item__btn btn-link">
              ';
			echo LR\Filters::escapeHtmlText($acc_item) /* line 236 */;
			echo '
            </button> 
            <div 
              class="accordion-item__body"
';
			if ($key == 0) {
				echo '                style="max-height: none;"
';
			}
			echo '            >
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla ligula hendrerit pellentesque luctus. Etiam non euismod odio. Proin eu vehicula magna, eu laoreet enim. Donec a lectus ac nunc placerat pellentesque.</p>
            </div>
          </div>
';
			$iterations++;
		}
		echo '			</div><!-- accordion -->
		</div><!-- cont -->
	</section>
	<section>
		<div class="container">
			<h2>Accordion</h2>

			<!-- accordion template -->
			<div class="tr-accordion">
';
		$iterations = 0;
		foreach ($acc_items as $key => $acc_item) {
			echo '          <div class="accordion-item ';
			echo LR\Filters::escapeHtmlAttr($key == 0 ? 'active' : '') /* line 258 */;
			echo '">
            <button type="button" class="accordion-item__btn btn-link">
              ';
			echo LR\Filters::escapeHtmlText($acc_item) /* line 260 */;
			echo '
            </button> 
            <div 
              class="accordion-item__body"
';
			if ($key == 0) {
				echo '                style="max-height: none;"
';
			}
			echo '            >
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla ligula hendrerit pellentesque luctus. Etiam non euismod odio. Proin eu vehicula magna, eu laoreet enim. Donec a lectus ac nunc placerat pellentesque.</p>
            </div>
          </div>
';
			$iterations++;
		}
		echo '			</div><!-- accordion -->
		</div><!-- cont -->
	</section>




	<section>
		<div class="container">
			<h2>Modal</h2>

			<a href="#modal-example" class="btn btn--brand modalTrigger">Open Modal</a>

			';
		echo LR\Filters::escapeHtmlText(tr_modal_start('modal-example', 'Modal Title here', 'modal-additional-class')) /* line 285 */;
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
		echo LR\Filters::escapeHtmlText(tr_modal_end()) /* line 295 */;
		echo '

		</div>
	</section>




	<div class="container">
		<hr>
	</div>


	<section>
		<div class="container">
			<h2>Latest Blog Posts PHP Component</h2>
			';
		echo LR\Filters::escapeHtmlText(tr_get_component('latest-blog-posts')) /* line 311 */;
		echo '
		</div>
	</section>


	<div class="container">
		<hr>
	</div>


	<section>
		<div class="container">
			<h2>Latest Blog Posts Latte Block</h2>
';
		/* line 324 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/partials/latest-blog-posts'), $this->params, 'include')->renderToContentType('html');
		echo '		</div>
	</section>





	<div class="container">
		<hr>
	</div>


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

';
		/* line 350 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/footer'), $this->params, 'include')->renderToContentType('html');
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['key' => '192, 233, 257', 'value' => '192', 'ckey' => '201', 'cvalue' => '201', 'acc_item' => '233, 257'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}

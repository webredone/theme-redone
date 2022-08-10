<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/parts/_slider.latte */
final class Templateaf9ed4e2e4 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['slide' => 'blockSlide'],
	];


	public function main(): array
	{
		extract($this->params);
		if (!empty($class) && !empty($slides)) /* line 4 */ {
			echo '<div 
  class="slider-wrap"
>

  <div class="embla ';
			echo LR\Filters::escapeHtmlAttr($class) /* line 9 */;
			echo '">
    <div class="embla__container">
';
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($slides, $ʟ_it ?? null) as $s_key => $s_content) /* line 11 */ {
				echo '      <div 
        class="embla__slide"
      >
        <div class="embla__slide__inner">
          ';
				$this->renderBlock('slide', get_defined_vars()) /* line 16 */;
				echo '
        </div>
      </div>';
				$iterations++;
			}
			$iterator = $ʟ_it = $ʟ_it->getParent();
			echo '    </div>
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
  
</div>';
		}
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['s_key' => '11', 's_content' => '11'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}


	/** {block slide} on line 16 */
	public function blockSlide(array $ʟ_args): void
	{
		
	}

}

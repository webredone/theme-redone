<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/parts/_slider.latte */
final class Templateaf9ed4e2e4 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['slide_q' => 'blockSlide_q', 'slide' => 'blockSlide', 'after_loop' => 'blockAfter_loop'],
	];


	public function main(): array
	{
		extract($this->params);
		$mode = 'array' /* line 4 */;
		echo ' 
';
		if (gettype($slides) === 'object' && $slides instanceof WP_Query) /* line 5 */ {
			$mode = 'query' /* line 6 */;
		}
		echo '

';
		if (!empty($class)
		&&
		(
		( $mode === 'array' && !empty($slides) )
		||
		( $mode === 'query' && $slides->have_posts() )
		)) /* line 10 */ {
			echo '  <div class="slider-wrap">

    <div class="embla ';
			echo LR\Filters::escapeHtmlAttr($class) /* line 21 */;
			echo '">
      <div class="embla__container">

';
			if ($mode === 'query') /* line 24 */ {
				while ($slides->have_posts()) /* line 25 */ {
					echo '            ';
					echo LR\Filters::escapeHtmlText($slides->the_post()) /* line 26 */;
					echo '
            <div 
              class="embla__slide"
            >
              <div class="embla__slide__inner">
                ';
					$this->renderBlock('slide_q', get_defined_vars()) /* line 31 */;
					echo '
              </div>
            </div>
';
				}
			} else /* line 35 */ {
				$iterations = 0;
				foreach ($iterator = $ʟ_it = new LR\CachingIterator($slides, $ʟ_it ?? null) as $s_key => $s_content) /* line 36 */ {
					echo '          <div 
            class="embla__slide"
          >
            <div class="embla__slide__inner">
              ';
					$this->renderBlock('slide', get_defined_vars()) /* line 41 */;
					echo '
            </div>
          </div>';
					$iterations++;
				}
				$iterator = $ʟ_it = $ʟ_it->getParent();
			}
			echo '
      </div>
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

    ';
			$this->renderBlock('after_loop', get_defined_vars()) /* line 63 */;
			echo '
    
';
			if ($mode === 'query') /* line 65 */ {
				echo '      ';
				echo LR\Filters::escapeHtmlText(wp_reset_postdata()) /* line 66 */;
				echo "\n";
			}
			echo '  </div>
';
		}
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['s_key' => '36', 's_content' => '36'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}


	/** {block slide_q} on line 31 */
	public function blockSlide_q(array $ʟ_args): void
	{
		
	}


	/** {block slide} on line 41 */
	public function blockSlide(array $ʟ_args): void
	{
		
	}


	/** {block after_loop} on line 63 */
	public function blockAfter_loop(array $ʟ_args): void
	{
		
	}

}

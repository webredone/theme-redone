{{-- resources/views/components/slider.blade.php --}}
@php
    $mode = 'array';
    if (is_object($slides) && $slides instanceof WP_Query) {
        $mode = 'query';
    }
@endphp

@if(!empty($class) && (
    ($mode === 'array' && !empty($slides))
    || ($mode === 'query' && $slides->have_posts())
))
  <div class="slider-wrap">
    <div class="embla {{ $class }}">
      <div class="embla__container">
        @if($mode === 'query')
          @while($slides->have_posts())
            @php $slides->the_post(); @endphp
            <div class="embla__slide">
              <div class="embla__slide__inner">
                @if(isset($slide_q))
                  {!! $slide_q !!}
                @else
                  <h3>{{ get_the_title() }}</h3>
                  <p>{{ get_the_excerpt() }}</p>
                @endif
              </div>
            </div>
          @endwhile
          @php wp_reset_postdata(); @endphp
        @else
          @foreach($slides as $s_key => $s_content)
            <div class="embla__slide">
              <div class="embla__slide__inner">
                @if(isset($slide))
                  {!! $slide !!}
                @else
                  <h3>{{ $s_content['title'] ?? "Slide " . ($s_key + 1) }}</h3>
                  <p>{{ $s_content['content'] ?? '' }}</p>
                @endif
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
    <div class="embla__buttons">
      <button class="embla__btn embla__btn-prev" type="button" aria-label="Go to previous slide"></button>
      <div class="embla__dots"></div>
      <button class="embla__btn embla__btn-next" type="button" aria-label="Go to next slide"></button>
    </div>

    {!! $after_loop ?? '' !!}
  </div>
@endif

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
                {{-- Now you can print slide_q slot --}}
                {!! $slide_q ?? '' !!}
              </div>
            </div>
          @endwhile
          @php wp_reset_postdata(); @endphp
        @else
          @foreach($slides as $s_key => $s_content)
            <div class="embla__slide">
              <div class="embla__slide__inner">
                {{-- You can replace references to $s_key/$s_content directly by embedding them here: --}}
                @if(!empty($slide))
                  {{-- We can temporarily replace occurrences of $s_key/$s_content with a trick: --}}
                  @php
                      // Make these variables available to the included code if needed
                      // If slide slot is a closure or something, we can call it here
                      // If slide slot is just HTML, you can do str_replace, but that’s complicated.
                      // Easiest is to rely on the user writing something like:
                      // "<h5>{$s_key} - {$s_content['alt']}</h5>" directly in the slot definition above this component call.
                  @endphp
                  {!! $slide !!}
                @else
                  {{-- no slide slot, fallback or do nothing --}}
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

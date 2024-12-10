@if($image?->src)

    @if($link->url)
        <a {!! tr_a($link, "wp-figure-link", true) !!}>
    @endif

        <figure class="wp-figure wp-figure-test">
            {!! tr_get_media($image, true) !!}
            @if(strlen($caption->text))
                <figcaption class="wp-figcaption">
                    {{ $caption->text }}
                </figcaption>
            @endif
        </figure>

    @if($link->url)
        </a>
    @endif

@endif
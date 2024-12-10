<section class="hero-main">
    <div class="hero-main__cont">
        @if(!empty($title->text))
            <h1>{{ $title->text }}</h1>
        @endif

        @if(!empty($title['text']))
            <h1>{{ $title['text'] }}</h1>
        @endif

        @if(!empty($something))
            <p>{{ $something }}</p>
        @endif

        @if(!empty($something_else))
            <p>{{ $something_else }}</p>
        @endif

        {{ tr_a($cta, "btn btn--brand") }}
    </div>{{-- cont --}}
</section>
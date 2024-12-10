@php
$post_card_img = get_the_post_thumbnail_url(get_the_ID(), 'card-thumb');
@endphp

<div class="col">
    <article class="post-card">
        <a href="{{ get_the_permalink() }}" class="post-card__thumb h-bg-zoom">
            <div class="lds-ripple"><div></div><div></div></div>
            <div
                class="post-card__thumb__img h-bg-zoom__img"
                style="background-image: url('{{ $post_card_img }}')"
            ></div>
        </a>
        <div class="post-card__txt">
            <h4 class="post-card__title">
                <a href="{{ get_the_permalink() }}">
                    {!! get_the_title() !!}
                </a>
            </h4>
            <p class="entry-meta">
                {!! tr_posted_on() !!}
                {!! tr_posted_by() !!}
            </p>
            <p class="post-card__excerpt">
                {!! get_excerpt(140) !!}
            </p>
            {!! get_the_category_list() !!}
        </div> <!-- .post-card__txt -->
    </article>
</div><!-- .col -->

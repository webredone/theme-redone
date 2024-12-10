@include(tr_view_path('layout/header'))

<div class="content">
    <div class="container">
    @while(have_posts())
        @php(the_post())

        <h1>{{ the_title() }}</h1>
        <hr />
        {!! the_content() !!}
    @endwhile
    </div>
</div>

@include(tr_view_path('layout/footer'))
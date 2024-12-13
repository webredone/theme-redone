@include(tr_view_path('layout/header'))

<section class="content">
    <div class="container">
		@yield('content')
    </div>
</section>

@include(tr_view_path('layout/footer'))

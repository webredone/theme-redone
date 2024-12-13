@include(tr_view_path('layout/header'))

<h1>asdasd</h1>
<section class="content">
	<div class="container">
		{{-- TODO: For some reason, content and container are not rendered --}}
		@yield('content')
	</div>
</section>

@include(tr_view_path('layout/footer'))
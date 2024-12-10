@include(tr_view_path('layout/header'))


<section class="content">
	<div class="container">
		@include(tr_view_path('components/todo-remove-examples'))
		{!! the_content() !!}
	</div>
</section>

@include(tr_view_path('layout/footer'))
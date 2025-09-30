@extends('layout.layout')

@section('content')
    <div class="container">
        <h1>Theme Redone - Laravel Blade Components Demo</h1>
        {!! the_content() !!}

        {{-- Complete Examples Showcase --}}
        <section class="mb40">
            <h2>Complete Component Examples</h2>
            <x-todo-remove-examples />
        </section>

    </div>
@endsection
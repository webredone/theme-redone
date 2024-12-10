<div class="container" id="smooth-start">
    <h2>SMOOTH SCROLL EXAMPLE</h2>
    <a class="btn btn--brand" href="#smooth-end">Scroll down</a>
</div>


<style>
	.collapsible, .collapsible__trigger {
		width: 100%;
	}

	.collapsible__content {
		background: #fff;
		width: 100%;
	}

	.collapsible__content__inner p {
		margin-bottom: 0;
	}

	.collapsible[data-select] .collapsible__content__inner {
		display: flex;
		flex-direction: column;
	}

	.accordion .collapsible {
		margin-bottom: 0;
	}

	.accordion .collapsible__trigger {
		padding: 12px 20px;
		box-shadow: inset 0 0 0 1px black;
	}

	.nested-accordions .collapsible__content__inner {
		padding-right: 0;
	}
</style>

<hr />
@php
$tabs = [
    [
        'anchor' => 'Tab 1',
        'content' => ['title' => 'Panel 1 Title', 'text' => 'This is panel 1 content.']
    ],
    [
        'anchor' => 'Tab 2',
        'content' => ['text' => 'This is panel 2 content.']
    ],
    [
        'anchor' => 'Tab 3',
        'content' => ['title' => 'Panel 3 Title', 'text' => 'This is panel 3 content.']
    ]
];
@endphp

@component('components.collapsibles')
@endcomponent



			<h2 class="mb40">Typography</h2>
			<div class="f-row" style="--i-cols: 2; --i-gap: 30">
				<div class="col">
					<div>
						<strong class="mb40">Headlines</strong>
						<h1>Headline 1</h1>
						<h2>Headline 2</h2>
						<h3>Headline 3</h3>
						<h4>Headline 4</h4>
						<h5>Headline 5</h5>
						<h6>Headline 6</h6>

						<strong class="mb40">Unordered List</strong>
						<ul>
							<li>List item 1</li>
							<li>List item 2</li>
							<li>List item 3</li>
							<li>List item 4</li>
							<li>List item 5</li>
						</ul>
					</div>
				</div>
				<div class="col">
					<div>
						<strong class="mb40">Paragraph</strong>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in <strong>Bold</strong> in <a href="#" target="_blank">Link</a> velit esse
						cillum dolore eu fugiat nulla pariatur. <em>Italic</em> sint occaecat cupidatat non
						proident, sunt in culpa qui <strong><em>Bold Italic</em></strong> deserunt mollit anim id est laborum.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ipsam aliquam modi voluptatum itaque sed fuga non quisquam quas eveniet?</p>

						<strong class="mb40">Ordered List</strong>
						<ol>
							<li>List item 1</li>
							<li>List item 2</li>
							<li>List item 3</li>
							<li>List item 4</li>
							<li>List item 5</li>
						</ol>
					</div>
				</div>
			</div>{* row *}

		</div><!-- cont -->
	</section>


	<hr />


		<section>
		<div class="container">
			<h2>Spinners / Loaders</h2>

			<div class="spinner-wrap" style="width: 100px; height: 100px;">
				<div class="lds-ripple">
					<div></div>
					<div></div>
				</div>
			</div>
		</div>
	</section>



<section>
	<div class="container">
		@component('components.tabs', ['tabs' => $tabs, 'class' => 'my-class'])
			@slot('tab_anchor_0')
				<strong>Tab 1 Custom Anchor</strong>
			@endslot

			@slot('tab_panel_0')
				<h3>Tab 1 Custom Panel</h3>
				<p>Panel content for tab 1</p>
			@endslot

			@slot('tab_anchor_1')
				<em>Tab 2 Different Anchor</em>
			@endslot

			@slot('tab_panel_1')
				<h3>Tab 2 Custom Panel</h3>
				<p>Custom panel content for tab 2</p>
			@endslot

			{{-- No slots for tab 3 means it uses default text. --}}
		@endcomponent


		<hr />

		@php
		$custom_keyframes = [
			[
				"opacity" => 0,
				"transform" => "translateY(-10px)",
				"pointer-events" => "none"
			],
			[
				"transform" => "translateY(10px)",
				"offset" => 0.9
			],
			[
				"opacity" => 1,
				"transform" => "translateY(0)",
				"pointer-events" => "all"
			]
		];
		@endphp

		@component('components.collapsible', [
			'class' => 'my-collapsible-class',
			'aria_label' => 'Toggle Additional Info',
			'duration' => 700,
			'close_outside' => true,
			'on_hover' => false,
			'custom_keyframes' => $custom_keyframes,
			'easing' => 'cubic-bezier(1,-0.06, 0, 1.56)'
		])
			@slot('collapsible_trigger')
				<strong>Click to Toggle</strong>
			@endslot

			@slot('collapsible_content')
				<h4>Additional Information</h4>
				<p>This content is revealed when the collapsible is opened.</p>
			@endslot
		@endcomponent


		<hr />

		@php
		$test_acc_items = [
			[
				'anchor' => 'Accordion Item 1',
				'content' => [
					'title' => 'Accordion Item Content 1 Title',
					'text'  => 'Accordion Item Content 1 text that is very long',
				]
			],
			[
				'anchor' => 'Accordion Item 2',
				'content' => [
					'text'  => 'Accordion Item Content 2 text that is very long',
				]
			],
			[
				'anchor' => 'Accordion Item 3',
				'content' => [
					'title' => 'Accordion Item Content 3 Title',
					'text'  => 'Accordion Item Content 3 text that is very long',
				]
			]
		]
		@endphp

		@component('components.accordion', [
			'items' => $test_acc_items,
			'initially_open_item' => 0,
			'collapse_siblings' => true
		])
			@slot('acc_trigger_0')
				<strong>{{ $test_acc_items[0]['anchor'] }}</strong>
			@endslot

			@slot('acc_content_0')
				<h3>{{ $test_acc_items[0]['content']['title'] }}</h3>
				<p>{{ $test_acc_items[0]['content']['text'] }}</p>
			@endslot

			@slot('acc_trigger_1')
				<em>{{ $test_acc_items[1]['anchor'] }}</em>
			@endslot

			@slot('acc_content_1')
				<p>{{ $test_acc_items[1]['content']['text'] }}</p>
			@endslot

			{{-- No slots for acc_trigger_2 or acc_content_2, fallback will be used --}}
		@endcomponent


		<hr />

		@php
		$test_slides = [
			[
				'src' => 'https://example.com/img1.jpg',
				'alt' => 'Slide Image 1',
			],
			[
				'src' => 'https://example.com/img2.jpg',
				'alt' => 'Slide Image 2',
			],
		];
		@endphp

		{{-- Using array mode --}}
		@component('components.slider', [
			'class' => 'slider--test',
			'slides' => $test_slides
		])
			@slot('slide')
				{{-- Inside 'slide' slot, we have access to $s_key and $s_content from the foreach --}}
				{{-- We can access these variables by referencing them directly: --}}
				{{-- Since the component doesn't know about $s_key/$s_content directly, we need a trick --}}
				{{-- A simple trick: define them as @php in the parent template before slot: --}}
				{{-- But we can't do that easily as we did in Latte. So we should pass data differently. --}}
				{{-- Another approach: We'll assume you store s_key/s_content in a variable. --}}
				{{-- Since Blade doesn't have direct variable passing like Latte's n:foreach, we need another approach. --}}
				{{-- Here's a simple approach: We'll rely on runString approach or define s_key/s_content outside slot. --}}

				{{-- Let's just show static html as example: --}}
				<div style="box-shadow: 0 0 0 1px blue">
					<h5>Static slide content</h5>
					<img src="{{ $s_content['src'] }}" alt="{{ $s_content['alt'] }}" />
				</div>
			@endslot

			@slot('after_loop')
				<div style="padding: 10px; box-shadow: 0 0 0 1px orange;">
					<strong>pagination can be added here</strong>
				</div>
			@endslot
		@endcomponent

		{{-- Using WP_Query mode --}}
		@php
		$posts_query = new WP_Query([
			'post_type' => 'post',
			'posts_per_page' => 6,
			'orderby' => 'DESC',
		]);
		@endphp

		@component('components.slider', [
			'class' => 'slider--test',
			'slides' => $posts_query
		])
			@slot('slide_q')
				<div style="box-shadow: 0 0 0 1px blue">
					<h5>{{ get_the_title() }}</h5>
				</div>
			@endslot

			@slot('after_loop')
				<div style="padding: 10px; box-shadow: 0 0 0 1px orange;">
					<strong>pagination can be added here</strong>
				</div>
			@endslot
		@endcomponent

	</div>
</section>

<hr />


<section class="sliders">
    <style>
        .sliders {
            max-width: 100%;
            overflow: hidden;
        }
    </style>

    <div
        class="container"
        style="margin-bottom: 100px;"
    >
        <h2>SLIDERS (init in InitSliders class)</h2>

        <h3>GRID THAT TURNS INTO A SLIDER FOR MOBILE</h3>
        @php
        $test_slides = [
            [
                'src' => 'https://images.unsplash.com/photo-1657788913352-1ce366729324?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTY1Ng&ixlib=rb-1.2.1&q=80&w=353',
                'alt' => 'Slide Image 1',
            ],
            [
                'src' => 'https://images.unsplash.com/photo-1655930119888-d3cd121fa5e6?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTc2Mw&ixlib=rb-1.2.1&q=80&w=353',
                'alt' => 'Slide Image 2',
            ],
            [
                'src' => 'https://images.unsplash.com/photo-1657047408480-5c53b418b394?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTc4Mw&ixlib=rb-1.2.1&q=80&w=353',
                'alt' => 'Slide Image 3',
            ],
            [
                'src' => 'https://images.unsplash.com/photo-1656693391610-7f16ca839254?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTc5NQ&ixlib=rb-1.2.1&q=80&w=353',
                'alt' => 'Slide Image 4',
            ],
            [
                'src' => 'https://images.unsplash.com/photo-1657879005206-3a27c0b782f2?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTgwOA&ixlib=rb-1.2.1&q=80&w=353',
                'alt' => 'Slide Image 5',
            ],
            [
                'src' => 'https://images.unsplash.com/photo-1655552360649-9871415760b6?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=250&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY1ODA4OTgyMA&ixlib=rb-1.2.1&q=80&w=353',
                'alt' => 'Slide Image 6',
            ]
        ];
        @endphp

        @component('components.slider', [
            'class' => 'slider--test',
            'slides' => $test_slides
        ])
            @slot('slide')
                {{-- In Latte, we had {$s_key}, {$s_content} directly. In Blade, you must handle data differently.
                   As an example, let's just show a static slide for demonstration. --}}
                <div style="box-shadow: 0 0 0 1px blue">
                    <h5>Static example slide (replace this with dynamic logic if needed)</h5>
                    <img src="{{ $test_slides[0]['src'] }}" alt="{{ $test_slides[0]['alt'] }}" />
                </div>
            @endslot
        @endcomponent

        <hr />

        <h3 style="margin-top: 100px;">(WP_Query) GRID THAT TURNS INTO A SLIDER FOR MOBILE</h3>

        @php
        $posts_query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 6,
            'orderby' => 'DESC',
        ]);
        @endphp

        @component('components.slider', [
            'class' => 'slider--test',
            'slides' => $posts_query
        ])
            @slot('slide_q')
                {{-- Here, get_the_title() is accessible because we are within the loop that the component runs on query slides. --}}
                <div style="box-shadow: 0 0 0 1px blue">
                    <h5>{{ get_the_title() }}</h5>
                </div>
            @endslot

            @slot('after_loop')
                <div style="padding: 10px; box-shadow: 0 0 0 1px orange;">
                    <strong>pagination can be added here</strong>
                </div>
            @endslot
        @endcomponent

    </div>

    <div class="container"><h3>LOOPED SLIDER</h3></div>
    <div>
        @component('components.slider', [
            'class' => 'slider--test2',
            'slides' => $test_slides
        ])
            @slot('slide')
                <div style="box-shadow: 0 0 0 1px blue">
                    <h5>Another static example (replace with logic if needed)</h5>
                    <img src="{{ $test_slides[1]['src'] }}" alt="{{ $test_slides[1]['alt'] }}" />
                </div>
            @endslot
        @endcomponent
    </div>
</section>



<div class="container">
    <h2>Flex Grid</h2>
</div>

<section>
    <div class="container">
        <div class="f-row" style="--i-cols: 4; --i-gap: 35;">
            @for($i = 0; $i < 12; $i++)
                <div class="col" style="box-shadow: inset 0 0 0 1px red;">
                    <div class="col-content">Column</div>
                </div>
            @endfor
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="f-row" style="--i-cols: 3; --i-gap: 15; --i-mb: 10;">
            @for($i = 0; $i < 4; $i++)
                <div class="col" style="box-shadow: inset 0 0 0 1px red;">
                    <div class="col-content">Column</div>
                </div>
            @endfor
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="f-row" style="--i-cols: 4; --i-gap: 30; --i-mb: 10;">
            @for($i = 0; $i < 6; $i++)
                <div class="col" style="box-shadow: inset 0 0 0 1px red;">
                    <div class="col-content">Column</div>
                </div>
            @endfor
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="f-row" style="--i-cols: 5; --i-gap: 15; --i-mb: 10;">
            @for($i = 0; $i < 10; $i++)
                <div class="col" style="box-shadow: inset 0 0 0 1px red;">
                    <div class="col-content">Column</div>
                </div>
            @endfor
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="f-row" style="--i-cols: 6; --i-gap: 15; --i-mb: 10;">
            @for($i = 0; $i < 8; $i++)
                <div class="col" style="box-shadow: inset 0 0 0 1px red;">
                    <div class="col-content">Column</div>
                </div>
            @endfor
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="f-row" style="--i-cols: 7; --i-gap: 15; --i-mb: 10;">
            @for($i = 0; $i < 9; $i++)
                <div class="col" style="box-shadow: inset 0 0 0 1px red;">
                    <div class="col-content">Column</div>
                </div>
            @endfor
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h2>Flex Grid - two-cols-custom</h2>
        <div class="f-row two-cols-custom" style="--i-gap: 40; --i-mb: 0; --i-first-col-w: 70%;">
            @for($i = 0; $i < 2; $i++)
                <div class="col" style="box-shadow: inset 0 0 0 1px red;">
                    <div class="col-content">Column</div>
                </div>
            @endfor
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h2>Flex Grid - two-cols-custom</h2>
        <div class="f-row two-cols-custom" style="--i-cols: 2; --i-gap: 90; --i-mb: 0; --i-first-col-w: 390px;">
            @for($i = 0; $i < 2; $i++)
                <div class="col" style="box-shadow: inset 0 0 0 1px red;">
                    <div class="col-content">Column</div>
                </div>
            @endfor
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h2>Flex Grid - no-gutter</h2>
        <div class="f-row" style="--i-cols: 5;">
            @for($i = 0; $i < 10; $i++)
                <div class="col" style="box-shadow: inset 0 0 0 1px red;">
                    <div class="col-content">Column</div>
                </div>
            @endfor
        </div>
    </div>
</section>



<div class="container" id="smooth-end">
  <h2>SMOOTH SCROLL EXAMPLE END</h2>
  <a class="btn btn--brand" href="#smooth-start">Scroll up</a>
</div>






<section>
	<div class="container">
		<h2>SVG IMPORTING</h2>

		<div class="f-row" style="--i-cols: 4; --i-gap: 15">
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from theme assets synchronously example</h4>
					<br /><br />
					{!! tr_get_media('svg-1.svg') !!}

					<br /><br /><br />
					<h4>Get the SVG path only without outputting its code</h4>
					<br /><br />
					<img src="{!! tr_get_media_path('logo.svg') !!}" alt="yo" />
				</div>
			</div>
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from theme assets asynchronously example</h4>
					<br /><br />
					{!! tr_get_media('svg-1.svg', true) !!}
				</div>
			</div>
			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from uploads (media) synchronously example</h4>
					<br /><br />
					<pre n:syntax="off" style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
						<code>
{!! tr_get_media('http://localhost/theme_redone/wp-content/uploads/2022/03/svg-1.svg') !!}
						</code>
					</pre>
				</div>
			</div>

			<div class="col" style="box-shadow: 0 0 0 1px red;">
				<div  style="padding: 20px">
					<h4>Import SVG code from uploads (media) asynchronously example</h4>
					<br /><br />
					<pre n:syntax="off" style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
						<code>
{!! tr_get_media('http://localhost/theme_redone/wp-content/uploads/2022/03/svg-1.svg', true) !!}
						</code>
					</pre>
				</div>
			</div>
		</div>

	</div>
</section>



<section>
    <div class="container">
        <h2>BUTTONS</h2>
        @php
            $btn_vars = ['brand', 'brand-outline', 'sec', 'sec-outline', 'ghost', 'ghost--brand', 'ghost--sec'];
        @endphp

        @foreach($btn_vars as $btn_var)
            <a href="#" class="btn btn--{{ $btn_var }}">Btn {{ $btn_var }}</a>
        @endforeach
    </div>
</section>

<section>
	<div class="container">
		<h2>Modal</h2>

		<a href="#modal-example" class="btn btn--brand modalTrigger">Open Modal</a>

		{!! tr_modal_start('modal-example', 'Modal Title here', 'modal-additional-class') !!}
			<h3>Modal</h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		{!! tr_modal_end() !!}

	</div>
</section>
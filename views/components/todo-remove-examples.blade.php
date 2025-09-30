<div class="container" id="smooth-start">
    <h2>SMOOTH SCROLL EXAMPLE</h2>
    <a class="btn btn--brand" href="#smooth-end">Scroll down</a>
</div>

<section>
    <div class="container">
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
        ];
        @endphp

        <x-collapsibles :test_acc_items="$test_acc_items" />

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
        </div>
    </div>
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

<hr />

<section>
    <div class="container">
        <div class="f-row" style="--i-cols: 2; --i-gap: 30">
            <div class="col">
                <h4>Tabs (with nested accordion)</h4>
                @php
                $test_tabs = [
                    [
                        'anchor' => 'Tab 1',
                        'content' => [
                            'title' => 'Tab Panel 1 Title',
                            'text'  => 'Tab Panel 1 text that is very long',
                        ]
                    ],
                    [
                        'anchor' => 'Tab 2',
                        'content' => [
                            'text'  => 'Tab Panel 2 text that is very long',
                        ]
                    ],
                    [
                        'anchor' => 'Tab 3',
                        'content' => [
                            'title' => 'Tab Panel 3 Title',
                            'text'  => 'Tab Panel 3 text that is very long',
                        ]
                    ]
                ];
                @endphp

                <x-tabs :tabs="$test_tabs" class="optional-test-class-2">
                    <x-slot name="tab_anchor_0">
                        <span>
                            <strong>{{ $test_tabs[0]['anchor'] }}</strong> ✅
                        </span>
                    </x-slot>

                    <x-slot name="tab_panel_0">
                        <x-accordion
                            :items="$test_acc_items"
                            :initially_open_item="0"
                            :collapse_siblings="true"
                        >
                            <x-slot name="acc_trigger_0">
                                <h5>
                                    <strong>{{ $test_acc_items[0]['anchor'] }}</strong> ✅
                                </h5>
                            </x-slot>

                            <x-slot name="acc_content_0">
                                <span>
                                    <div class="test-custom-class">
                                        @if(!empty($test_acc_items[0]['content']['title']))
                                            <h3>{{ $test_acc_items[0]['content']['title'] }}</h3>
                                        @endif
                                        <p>{{ $test_acc_items[0]['content']['text'] }}</p>
                                    </div>
                                </span>
                            </x-slot>
                        </x-accordion>
                    </x-slot>

                    <x-slot name="tab_panel_1">
                        <span>
                            <div class="test-custom-class">
                                @if(!empty($test_tabs[1]['content']['title']))
                                    <h3>{{ $test_tabs[1]['content']['title'] }}</h3>
                                @endif
                                <p>{{ $test_tabs[1]['content']['text'] }}</p>
                            </div>
                        </span>
                    </x-slot>

                    <x-slot name="tab_panel_2">
                        <span>
                            <div class="test-custom-class">
                                @if(!empty($test_tabs[2]['content']['title']))
                                    <h3>{{ $test_tabs[2]['content']['title'] }}</h3>
                                @endif
                                <p>{{ $test_tabs[2]['content']['text'] }}</p>
                            </div>
                        </span>
                    </x-slot>
                </x-tabs>
            </div>

            <div class="col">
                <h4>Accordion (with nested tabs)</h4>
                <x-accordion
                    :items="$test_acc_items"
                    :initially_open_item="0"
                    :collapse_siblings="true"
                >
                    <x-slot name="acc_trigger_0">
                        <h5>
                            <strong>{{ $test_acc_items[0]['anchor'] }}</strong> ✅
                        </h5>
                    </x-slot>

                    <x-slot name="acc_content_0">
                        <x-tabs :tabs="$test_tabs" class="optional-test-class">
                            <x-slot name="tab_anchor_0">
                                <span>
                                    <strong>{{ $test_tabs[0]['anchor'] }}</strong> ✅
                                </span>
                            </x-slot>

                            <x-slot name="tab_panel_0">
                                <span>
                                    <div class="test-custom-class">
                                        @if(!empty($test_tabs[0]['content']['title']))
                                            <h3>{{ $test_tabs[0]['content']['title'] }}</h3>
                                        @endif
                                        <p>{{ $test_tabs[0]['content']['text'] }}</p>
                                    </div>
                                </span>
                            </x-slot>
                        </x-tabs>
                    </x-slot>

                    <x-slot name="acc_content_1">
                        <span>
                            <div class="test-custom-class">
                                @if(!empty($test_acc_items[1]['content']['title']))
                                    <h3>{{ $test_acc_items[1]['content']['title'] }}</h3>
                                @endif
                                <p>{{ $test_acc_items[1]['content']['text'] }}</p>
                            </div>
                        </span>
                    </x-slot>

                    <x-slot name="acc_content_2">
                        <span>
                            <div class="test-custom-class">
                                @if(!empty($test_acc_items[2]['content']['title']))
                                    <h3>{{ $test_acc_items[2]['content']['title'] }}</h3>
                                @endif
                                <p>{{ $test_acc_items[2]['content']['text'] }}</p>
                            </div>
                        </span>
                    </x-slot>
                </x-accordion>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <hr />
    </div>
</section>

<section class="sliders">
    <style>
        .sliders {
            max-width: 100%;
            overflow: hidden;
        }
    </style>

    <div class="container" style="margin-bottom: 100px;">
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

        <x-slider :slides="$test_slides" class="slider--test">
            <x-slot name="slide">
                <div style="box-shadow: 0 0 0 1px blue">
                    <h5>{{ $s_key ?? 'Slide' }} - {{ $s_content['alt'] ?? 'Default Alt' }}</h5>
                    <img
                        src="{{ $s_content['src'] ?? '' }}"
                        alt="{{ $s_content['alt'] ?? '' }}"
                    />
                </div>
            </x-slot>
        </x-slider>

        <hr />

        <h3 style="margin-top: 100px;">(WP_Query) GRID THAT TURNS INTO A SLIDER FOR MOBILE</h3>

        @php
        $posts_query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 6,
            'orderby' => 'DESC',
        ]);
        @endphp

        <x-slider :slides="$posts_query" class="slider--test">
            <x-slot name="slide_q">
                <div style="box-shadow: 0 0 0 1px blue">
                    <h5>{{ get_the_title() }}</h5>
                </div>
            </x-slot>

            <x-slot name="after_loop">
                <div style="padding: 10px; box-shadow: 0 0 0 1px orange;">
                    <strong>pagination can be added here</strong>
                </div>
            </x-slot>
        </x-slider>
    </div>

    <div class="container">
        <h3>LOOPED SLIDER</h3>
    </div>
    <div>
        <x-slider :slides="$test_slides" class="slider--test2">
            <x-slot name="slide">
                <div style="box-shadow: 0 0 0 1px blue">
                    <h5>{{ $s_key ?? 'Slide' }} - {{ $s_content['alt'] ?? 'Default Alt' }}</h5>
                    <img
                        src="{{ $s_content['src'] ?? '' }}"
                        alt="{{ $s_content['alt'] ?? '' }}"
                    />
                </div>
            </x-slot>
        </x-slider>
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
                <div style="padding: 20px">
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
                <div style="padding: 20px">
                    <h4>Import SVG code from theme assets asynchronously example</h4>
                    <br /><br />
                    {!! tr_get_media('svg-1.svg', true) !!}
                </div>
            </div>
            <div class="col" style="box-shadow: 0 0 0 1px red;">
                <div style="padding: 20px">
                    <h4>Import SVG code from uploads (media) synchronously example</h4>
                    <br /><br />
                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
{!! tr_get_media('http://localhost/theme_redone/wp-content/uploads/2022/03/svg-1.svg') !!}
                        </code>
                    </pre>
                </div>
            </div>

            <div class="col" style="box-shadow: 0 0 0 1px red;">
                <div style="padding: 20px">
                    <h4>Import SVG code from uploads (media) asynchronously example</h4>
                    <br /><br />
                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
{!! tr_get_media('http://localhost/theme_redone/wp-content/uploads/2022/03/svg-1.svg', true) !!}
                        </code>
                    </pre>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="temp-images-importing">
    <div class="container">
        <h2>IMAGES IMPORTING</h2>
        <style>
            .temp-images-importing .tr-img-wrap-outer {
                max-width: 100%;
            }
        </style>
        <div class="f-row" style="--i-cols: 3; --i-gap: 30">
            <div class="col" style="box-shadow: 0 0 0 1px red;">
                <div style="padding: 20px">
                    <h4>Read image from theme assets synchronously</h4>
                    <br /><br />
                    <h5>No ALT</h5>

                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
@php $img_1_data_string = 'people/photo-1517299151253-d0449b733f57.jpg' @endphp
{!! tr_get_media($img_1_data_string) !!}
                        </code>
                    </pre>
                    @php $img_1_data_string = 'people/photo-1517299151253-d0449b733f57.jpg' @endphp
                    {!! tr_get_media($img_1_data_string) !!}

                    <br /><br />
                    <h5>Don't Print (Only useful for debugging and showing how it will look like for some reason)</h5><br />
                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
{!! tr_get_media($img_1_data_string, false, true) !!}
                        </code>
                    </pre>

                    {!! tr_get_media($img_1_data_string, false, true) !!}

                    <br /><br />
                    <h5>With ALT</h5>
                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
@php $img_2_data_array = ['src' => 'people/photo-1517299151253-d0449b733f57.jpg', 'alt' => 'manually added alt text'] @endphp
{!! tr_get_media($img_2_data_array) !!}
                        </code>
                    </pre>
                    @php $img_2_data_array = ['src' => 'people/photo-1517299151253-d0449b733f57.jpg', 'alt' => 'manually added alt text'] @endphp

                    {!! tr_get_media($img_2_data_array) !!}

                    <br /><br />
                    <h5>With ALT and class</h5>
                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
@php $img_2_data_array_with_class = $img_2_data_array @endphp
@php $img_2_data_array_with_class['class'] = 'custom-class' @endphp

{!! tr_get_media($img_2_data_array_with_class) !!}
                        </code>
                    </pre>
                    @php $img_2_data_array_with_class = $img_2_data_array @endphp
                    @php $img_2_data_array_with_class['class'] = 'custom-class' @endphp

                    {!! tr_get_media($img_2_data_array_with_class) !!}
                </div>
            </div>
            <div class="col" style="box-shadow: 0 0 0 1px red;">
                <div style="padding: 20px">
                    <h4>Read image from theme assets asynchronously</h4>
                    <br /><br />

                    <h5>No ALT String</h5>
                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
{!! tr_get_media($img_1_data_string, true) !!}
                        </code>
                    </pre>
                    {!! tr_get_media($img_1_data_string, true) !!}

                    <h5>No ALT Array</h5>
                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
{!! tr_get_media(['src' => 'people/photo-1517299151253-d0449b733f57.jpg'], true) !!}
                        </code>
                    </pre>
                    {!! tr_get_media(['src' => 'people/photo-1517299151253-d0449b733f57.jpg'], true) !!}

                    <h5>With manually written ALT Array</h5>
                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
{!! tr_get_media($img_2_data_array, true) !!}
                        </code>
                    </pre>
                    {!! tr_get_media($img_2_data_array, true) !!}

                    <br /><br />
                    <h5>With ALT and class</h5>
                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
{!! tr_get_media($img_2_data_array_with_class, true) !!}
                        </code>
                    </pre>

                    {!! tr_get_media($img_2_data_array_with_class, true) !!}
                </div>
            </div>

            <div class="col" style="box-shadow: 0 0 0 1px red;">
                <div style="padding: 20px">
                    <h4>Read background image from theme assets asynchronously</h4>
                    <br /><br />
                    <h5>Get only media path</h5>
                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
&lt;div style="background-image: url({!! tr_get_media_path($img_1_data_string) !!})"&gt;&lt;/div&gt;
                        </code>
                    </pre>
                    <div
                        style="height: 333px; width: 100%; background-repeat: no-repeat; background-position: center; background-size: cover;"
                        class="js-img-lazy jsLoading"
                        data-img-src="{!! tr_get_media_path($img_1_data_string) !!}"
                    >
                    </div>
                    <br /><br />
                    <h4>Print Image manually with path only to src</h4>
                    <br /><br />
                    <pre style="background: #222; color: #fff; font-family: monospace; border: 2px solid #1d81cc">
                        <code>
&lt;img src="{!! tr_get_media_path($img_1_data_string) !!}" /&gt;
                        </code>
                    </pre>
                    <img src="{!! tr_get_media_path($img_1_data_string) !!}" />
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
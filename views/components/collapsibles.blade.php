@php
// If not provided, define some dummy data internally to avoid errors
$dummy_collapsible_content = $dummy_collapsible_content ?? "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam explicabo nemo... (fallback text)";
$test_acc_items = $test_acc_items ?? [
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

$dummy_dd_options = $dummy_dd_options ?? [
    ['value' => 'none', 'label' => 'Select Option'],
    ['value' => 'option-1', 'label' => 'Option 1'],
    ['value' => 'option-2', 'label' => 'Option 2'],
    ['value' => 'option-3', 'label' => 'Option 3'],
    ['value' => 'option-4', 'label' => 'Option 4'],
];

$custom_keyframes = $custom_keyframes ?? [
    ["opacity" => 0, "transform" => "translateY(-10px)", "pointer-events" => "none"],
    ["transform" => "translateY(10px)", "offset" => 0.9],
    ["opacity" => "1", "transform" => "translateY(0)", "pointer-events" => "all"]
];

// A helper function to simulate limit without Str::limit
function blade_limit_content($content) {
    $length = strlen($content);
    if ($length < 50) return $content; // If content short, just return it.
    $max = rand(40, $length - 1);
    return substr($content, 0, $max);
}
@endphp

<h2>Embed Accordion</h2>

<div class="f-row" style="--i-cols: 3; --i-gap: 15; margin-bottom: 100px;">
    <div class="col">
        <h4>1 Level - collapse siblings</h4>
        @component('components.accordion', [
            'items' => $test_acc_items,
            'initially_open_item' => 0,
            'collapse_siblings' => true
        ])
            @slot('acc_trigger_0')
                <h5><strong>{{ $test_acc_items[0]['anchor'] }}</strong> ✅</h5>
            @endslot
            @slot('acc_content_0')
                <span>
                    <div class="test-custom-class">
                        @if(!empty($test_acc_items[0]['content']['title']))
                            <h4>{{ $test_acc_items[0]['content']['title'] }}</h4>
                        @endif
                        <p>{{ $test_acc_items[0]['content']['text'] ?? '' }}</p>
                    </div>
                </span>
            @endslot

            @slot('acc_trigger_1')
                <h5><strong>{{ $test_acc_items[1]['anchor'] }}</strong> ✅</h5>
            @endslot
            @slot('acc_content_1')
                <span>
                    <div class="test-custom-class">
                        @if(!empty($test_acc_items[1]['content']['title']))
                            <h4>{{ $test_acc_items[1]['content']['title'] }}</h4>
                        @endif
                        <p>{{ $test_acc_items[1]['content']['text'] ?? '' }}</p>
                    </div>
                </span>
            @endslot

            @slot('acc_trigger_2')
                <h5><strong>{{ $test_acc_items[2]['anchor'] }}</strong> ✅</h5>
            @endslot
            @slot('acc_content_2')
                <span>
                    <div class="test-custom-class">
                        @if(!empty($test_acc_items[2]['content']['title']))
                            <h4>{{ $test_acc_items[2]['content']['title'] }}</h4>
                        @endif
                        <p>{{ $test_acc_items[2]['content']['text'] ?? '' }}</p>
                    </div>
                </span>
            @endslot
        @endcomponent
    </div>

    <div class="col">
        <h4>1 Level - custom easing</h4>
        @component('components.accordion', [
            'items' => $test_acc_items,
            'initially_open_item' => 0,
            'duration' => 700,
            'collapse_siblings' => true,
            'easing' => 'cubic-bezier(1,-0.06, 0, 1.56)'
        ])
            @slot('acc_trigger_0')
                <h5><strong>{{ $test_acc_items[0]['anchor'] }}</strong> ✅</h5>
            @endslot
            @slot('acc_content_0')
                <span>
                    <div class="test-custom-class">
                        @if(!empty($test_acc_items[0]['content']['title']))
                            <h4>{{ $test_acc_items[0]['content']['title'] }}</h4>
                        @endif
                        <p>{{ $test_acc_items[0]['content']['text'] ?? '' }}</p>
                    </div>
                </span>
            @endslot
        @endcomponent
    </div>

    <div class="col">
        <h4>1 Level - independent</h4>
        @component('components.accordion', [
            'items' => $test_acc_items,
            'initially_open_item' => 2
        ])
            @slot('acc_trigger_0')
                <h5><strong>{{ $test_acc_items[0]['anchor'] }}</strong> ✅</h5>
            @endslot
            @slot('acc_content_0')
                <span>
                    <div class="test-custom-class">
                        @if(!empty($test_acc_items[0]['content']['title']))
                            <h4>{{ $test_acc_items[0]['content']['title'] }}</h4>
                        @endif
                        <p>{{ $test_acc_items[0]['content']['text'] ?? '' }}</p>
                    </div>
                </span>
            @endslot
        @endcomponent
    </div>
</div>

<hr style="margin-top: 40px; margin-bottom: 40px;" />

<h2>Nested Accordions</h2>
<div class="nested-accordions">
    @component('components.accordion', [
        'items' => $test_acc_items,
        'initially_open_item' => 0,
        'collapse_siblings' => true
    ])
        @slot('acc_trigger_0')
            <h5><strong>{{ $test_acc_items[0]['anchor'] }} - lvl1</strong> ✅</h5>
        @endslot
        @slot('acc_content_0')
            @component('components.accordion', ['items' => $test_acc_items])
                @slot('acc_trigger_0')
                    <h5><strong>{{ $test_acc_items[0]['anchor'] }} - lvl2</strong> ✅</h5>
                @endslot
                @slot('acc_content_0')
                    @component('components.accordion', [
                        'items' => $test_acc_items,
                        'collapse_siblings' => true,
                        'easing' => 'cubic-bezier(1,-0.06,0,1.56)'
                    ])
                        @slot('acc_trigger_0')
                            <h5><strong>{{ $test_acc_items[0]['anchor'] }} - lvl3</strong> ✅</h5>
                        @endslot
                        @slot('acc_content_0')
                            <span>
                                <div class="test-custom-class">
                                    <h4>lvl3</h4>
                                    @if(!empty($test_acc_items[0]['content']['title']))
                                        <h4>{{ $test_acc_items[0]['content']['title'] }}</h4>
                                    @endif
                                    <p>{{ $test_acc_items[0]['content']['text'] ?? '' }}</p>
                                </div>
                            </span>
                        @endslot
                    @endcomponent
                @endslot
            @endcomponent
        @endslot
    @endcomponent
</div>

<hr style="margin-top: 40px; margin-bottom: 40px;" />

<h3>Dropdowns</h3>
<div class="f-row" style="--i-cols:4; --i-gap:15; margin-bottom:200px;">
    <div class="col">
        <h5>Click</h5>
        @component('components.collapsible')
            @slot('collapsible_trigger')
                Regular Click Dropdown
            @endslot
            @slot('collapsible_content')
                <h5>Will close on outside click</h5>
                <p>{{ blade_limit_content($dummy_collapsible_content) }}</p>
            @endslot
        @endcomponent
    </div>
    <div class="col">
        <h5>Click (close on click outside)</h5>
        @component('components.collapsible', ['close_outside' => true])
            @slot('collapsible_trigger')
                Regular Click Dropdown
            @endslot
            @slot('collapsible_content')
                <h5>Will close on outside click</h5>
                <p>{{ blade_limit_content($dummy_collapsible_content) }}</p>
            @endslot
        @endcomponent
    </div>
    <div class="col">
        <h5>Hover</h5>
        @component('components.collapsible', ['on_hover' => true])
            @slot('collapsible_trigger')
                Regular Click Dropdown
            @endslot
            @slot('collapsible_content')
                <h5>Hover</h5>
                <p>{{ blade_limit_content($dummy_collapsible_content) }}</p>
            @endslot
        @endcomponent
    </div>
    <div class="col">
        <h5>Hover absolute</h5>
        @component('components.collapsible', ['on_hover' => true, 'is_absolute' => true])
            @slot('collapsible_trigger')
                Hover Absolute
            @endslot
            @slot('collapsible_content')
                <h5>Will close on outside click</h5>
                <p>{{ blade_limit_content($dummy_collapsible_content) }}</p>
            @endslot
        @endcomponent
    </div>
</div>

<hr />

<h3>Dropdown Selects</h3>
<div class="f-row" style="--i-cols:4; --i-gap:15; margin-bottom:200px;">
    <div class="col">
        <h5>Click</h5>
        @include('components.dropdown-select', ['options' => $dummy_dd_options])
    </div>
    <div class="col">
        <h5>Close on click outside</h5>
        @include('components.dropdown-select', [
            'options' => $dummy_dd_options,
            'class' => 'custom-class',
            'duration' => 200,
            'close_outside' => true,
            'default_selected_key' => 3
        ])
    </div>
    <div class="col">
        <h5>Hover</h5>
        @include('components.dropdown-select', [
            'options' => $dummy_dd_options,
            'on_hover' => true,
            'default_selected_key' => 0
        ])
    </div>
    <div class="col">
        <h5>Hover - absolute</h5>
        @include('components.dropdown-select', [
            'options' => $dummy_dd_options,
            'is_absolute' => true,
            'on_hover' => true,
            'default_selected_key' => 2
        ])
    </div>
</div>

@php
// Reuse custom_keyframes defined above or fallback if not set
@endphp

<div class="f-row" style="--i-cols:3; --i-gap:15; margin-bottom:200px;">
    <div class="col">
        <h5>Custom Easing</h5>
        @component('components.collapsible', [
            'on_hover' => true,
            'is_absolute' => true,
            'duration' => 500,
            'easing' => 'cubic-bezier(1,-0.06,0,1.56)'
        ])
            @slot('collapsible_trigger')
                <img alt="test" src="https://source.unsplash.com/40x40" width="40" height="40" />
                <h5 style="margin-left: 10px;">Hover, custom keyframes</h5>
            @endslot
            @slot('collapsible_content')
                <h5>Hover - custom easing</h5>
                <p>{{ blade_limit_content($dummy_collapsible_content) }}</p>
            @endslot
        @endcomponent
    </div>
    <div class="col">
        <h5>Custom Keyframes</h5>
        @component('components.collapsible', [
            'on_hover' => true,
            'is_absolute' => true,
            'aria_label' => "Toggle Hover Dropdown",
            'custom_keyframes' => $custom_keyframes
        ])
            @slot('collapsible_trigger')
                <img alt="test" src="https://source.unsplash.com/40x40" width="40" height="40" />
                <h5 style="margin-left:10px;">Hover, custom keyframes</h5>
            @endslot
            @slot('collapsible_content')
                <h5>Trigger on hover, custom keyframes</h5>
                <p>{{ blade_limit_content($dummy_collapsible_content) }}</p>
            @endslot
        @endcomponent
    </div>
    <div class="col">
        <h5>Custom Keyframes - custom easing</h5>
        @component('components.collapsible', [
            'on_hover' => true,
            'is_absolute' => true,
            'aria_label' => "Toggle Hover Dropdown",
            'custom_keyframes' => $custom_keyframes,
            'duration' => 600,
            'easing' => 'cubic-bezier(1,-0.06,0,1.56)'
        ])
            @slot('collapsible_trigger')
                <img alt="test" src="https://source.unsplash.com/40x40" width="40" height="40" />
                <h5 style="margin-left:10px;">Hover, custom keyframes</h5>
            @endslot
            @slot('collapsible_content')
                <h5>Trigger on hover, custom keyframes</h5>
                <p>{{ blade_limit_content($dummy_collapsible_content) }}</p>
            @endslot
        @endcomponent
    </div>
</div>

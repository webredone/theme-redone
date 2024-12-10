@php
/**
 * Available variables:
 * @var string|null $class            Optional class to pass to the dropdown-select element.
 * @var string|null $aria_label       Optional aria-label.
 * @var string|null $duration         Optional duration (in ms). Default '300'.
 * @var bool|null   $close_outside    If true, clicking outside will close the dropdown (if trigger is click).
 * @var bool|null   $is_absolute      If true, .collapsible__content is positioned absolute.
 * @var bool|null   $on_hover         If true, triggers on hover instead of click on capable devices.
 * @var string|null $easing           Default 'ease-in-out'. Can be overridden.
 * @var array       $options          Required. Array of [ ['value' => '...', 'label' => '...'], ... ]
 * @var int|null    $default_selected_key By default, the first item (index 0) is selected. This can set a different index.
 */

// Ensure $options is defined and is an array
$options = $options ?? [];
@endphp

@if(!empty($options))
<div
    class="collapsible {{ $class ?? '' }} {{ !empty($is_absolute) ? 'collapsible--absolute' : '' }}"
    data-select
    data-duration="{{ !empty($duration) ? $duration : '300' }}"
    @if($close_outside ?? false) data-close-on-outside-click @endif
    @if($on_hover ?? false) data-hover-trigger @endif
    @if(!empty($easing)) data-easing="{{ $easing }}" @endif
>
    <button
        class="collapsible__trigger"
        type="button"
        aria-label="{{ !empty($aria_label) ? $aria_label : 'Toggle Options' }}"
    >
        <span class="collapsible__select-current"></span>
        <span class="chevron"></span>
    </button>
    <div class="collapsible__content">
        <div class="collapsible__content__inner">
            @foreach($options as $idx => $option)
                @php
                    $is_picked = false;
                    if(isset($default_selected_key)) {
                        // If a default_selected_key is set, match it with the current index
                        $is_picked = ($default_selected_key === $idx);
                    } else {
                        // If no default_selected_key is set, the first item (idx 0) is picked
                        $is_picked = ($idx === 0);
                    }
                @endphp
                <button
                    type="button"
                    class="collapsible__option {{ $is_picked ? 'picked' : '' }}"
                    data-value="{{ $option['value'] }}"
                >
                    {{ $option['label'] }}
                </button>
            @endforeach
        </div>
    </div>
</div>
@endif

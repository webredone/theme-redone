@php
    // If no slot is provided, these variables won't exist. Let's safely default them to empty strings.
    $collapsible_trigger = $collapsible_trigger ?? '';
    $collapsible_content = $collapsible_content ?? '';
@endphp

<div
    class="collapsible {{ $class ?? '' }} {{ !empty($is_absolute) ? 'collapsible--absolute' : '' }}"
    data-duration="{{ $duration ?? '300' }}"
    @if($close_outside ?? false) data-close-on-outside-click @endif
    @if($on_hover ?? false) data-hover-trigger @endif
    @if(!empty($custom_keyframes)) data-keyframes="{{ json_encode($custom_keyframes) }}" @endif
    @if(!empty($easing)) data-easing="{{ $easing }}" @endif
>
    <button
        class="collapsible__trigger"
        type="button"
        aria-label="{{ $aria_label ?? 'Toggle Dropdown' }}"
    >
        {!! $collapsible_trigger !!}
        <span class="chevron"></span>
    </button>

    <div class="collapsible__content">
        <div class="collapsible__content__inner">
            {!! $collapsible_content !!}
        </div>
    </div>
</div>

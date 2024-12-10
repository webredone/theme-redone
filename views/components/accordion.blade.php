@php
/**
 * Variables:
 * @var string|null $class
 * @var string|null $aria_label
 * @var string|null $duration
 * @var string|null $easing
 * @var array $items
 * @var bool|null $collapse_siblings
 * @var int|null $initially_open_item
 */

$panels_ids = [];
$random_string = uniqid();
foreach ($items as $acc_index => $tab_content) {
    $index = $acc_index + 1;
    $panels_ids[] = "{$random_string}_{$index}";
}
@endphp

<div
    class="accordion {{ $class ?? '' }}"
    @if($collapse_siblings ?? false) data-collapse-siblings @endif
    data-duration="{{ $duration ?? '300' }}"
    @if(!empty($easing)) data-easing="{{ $easing }}" @endif
>
    @foreach($items as $index => $item)
        @php
            $is_initially_open = isset($initially_open_item) && $index === $initially_open_item;
            $aria_label_text = !empty($aria_label) ? $aria_label : 'Toggle Accordion Item';

            // Determine slot variable names
            $acc_trigger_var = "acc_trigger_{$index}";
            $acc_content_var = "acc_content_{$index}";

            // Check if slot variables are defined
            $acc_trigger_html = (isset($$acc_trigger_var) && $$acc_trigger_var !== null)
                ? $$acc_trigger_var
                : ($item['anchor'] ?? '');

            $acc_content_html = (isset($$acc_content_var) && $$acc_content_var !== null)
                ? $$acc_content_var
                : (!empty($item['content']['text']) ? $item['content']['text'] : '');
        @endphp

        <div class="collapsible" @if($is_initially_open) data-initially-open @endif>
            <button
                class="collapsible__trigger"
                type="button"
                id="acc_panel_{{ $panels_ids[$index] }}"
                aria-label="{{ $aria_label_text }}"
            >
                {!! $acc_trigger_html !!}
                <span class="chevron"></span>
            </button>

            <div
                class="collapsible__content"
                role="region"
                aria-labelledby="acc_panel_{{ $panels_ids[$index] }}"
            >
                <div class="collapsible__content__inner">
                    {!! $acc_content_html !!}
                </div>
            </div>
        </div>
    @endforeach
</div>

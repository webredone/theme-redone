@php
$tabs_ids = [];
$random_string = uniqid();
foreach ($tabs as $tab_index => $tab_content) {
    $index = $tab_index + 1;
    $tabs_ids[] = "{$random_string}_{$index}";
}
@endphp

<div class="tabs {{ $class ?? '' }}" @if(!empty($tabs)) data-tabs @endif>
    <div class="tabs__nav" role="tablist">
        @foreach($tabs as $ta_key => $ta_content)
            <button
                type="button"
                data-href="panel-{{ $ta_key }}"
                class="tab-anchor {{ $ta_key == 0 ? 'activeTab' : '' }}"
                id="tab_{{ $tabs_ids[$ta_key] }}"
                aria-selected="{{ $ta_key == 0 ? 'true' : 'false' }}"
                aria-controls="panel-{{ $tabs_ids[$ta_key] }}"
                role="tab"
            >
                {!! ${"tab_anchor_".$ta_key} ?? ($ta_content['anchor'] ?? '') !!}

            </button>
        @endforeach
    </div>

    <div class="tabs__content">
        @foreach($tabs as $tp_key => $tp_content)
            <div
                class="tab-panel {{ $tp_key == 0 ? 'activeTab enter' : '' }}"
                data-id="panel-{{ $tp_key }}"
                id="panel-{{ $tabs_ids[$tp_key] }}"
                aria-labelledby="tab_{{ $tabs_ids[$tp_key] }}"
                role="tabpanel"
                aria-hidden="{{ $tp_key == 0 ? 'false' : 'true' }}"
            >
                <div class="tab-panel__content">
                    {!! ${"tab_panel_".$tp_key} ?? ($tp_content['content']['text'] ?? '') !!}
                </div>
            </div>
        @endforeach
    </div>
</div>

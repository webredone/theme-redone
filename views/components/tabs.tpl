<?php
// views/components/tabs.tpl

/**
 * Variables:
 * - $class (string, optional): Additional classes for the tabs wrapper.
 * - $tabs (array, required): Array of tabs. Each tab should have:
 *     - 'anchor' => string: Label for the tab.
 *     - 'content' => string: Content for the tab panel.
 */

// Ensure $tabs is provided and is an array
if (empty($tabs) || !is_array($tabs)) {
    return;
}

// Generate unique IDs for accessibility
$tabs_ids = [];
$random_string = uniqid();

foreach ($tabs as $tab_index => $tab_content) {
    $index = $tab_index + 1;
    $tabs_ids[] = "{$random_string}_{$index}";
}
?>

<div class="tabs <?= isset($class) ? htmlspecialchars($class) : '' ?>" <?= !empty($tabs) ? 'data-tabs' : '' ?>>
    <div class="tabs__nav" role="tablist">
        <?php foreach ($tabs as $ta_key => $ta_content): ?>
            <button
                type="button"
                data-href="panel-<?= htmlspecialchars($ta_key) ?>"
                class="tab-anchor <?= $ta_key == 0 ? 'activeTab' : '' ?>"
                id="tab_<?= htmlspecialchars($tabs_ids[$ta_key]) ?>"
                aria-selected="<?= $ta_key == 0 ? 'true' : 'false' ?>"
                aria-controls="panel-<?= htmlspecialchars($tabs_ids[$ta_key]) ?>"
                role="tab"
            >
                <?= htmlspecialchars($ta_content['anchor'] ?? 'Tab ' . ($ta_key + 1)) ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div class="tabs__content">
        <?php foreach ($tabs as $tp_key => $tp_content): ?>
            <div
                class="tab-panel <?= $tp_key == 0 ? 'activeTab enter' : '' ?>"
                data-id="panel-<?= htmlspecialchars($tp_key) ?>"
                id="panel-<?= htmlspecialchars($tabs_ids[$tp_key]) ?>"
                aria-labelledby="tab_<?= htmlspecialchars($tabs_ids[$tp_key]) ?>"
                role="tabpanel"
                aria-hidden="<?= $tp_key == 0 ? 'false' : 'true' ?>"
            >
                <div class="tab-panel__content">
                    <?= $tp_content['content'] ?? '<p>Default content if none is provided by the child template.</p>' ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

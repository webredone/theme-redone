<?php $this->layout('layout::layout') ?>


<?php $this->start('page_content') ?>
    <?php
    $tabs = [
        [
            'anchor' => 'Tab 1',
            'content' => '<h2>Tab 1 Content</h2><p>This is the content for Tab 1.</p>',
        ],
        [
            'anchor' => 'Tab 2',
            'content' => '<h2>Tab 2 Content</h2><p>This is the content for Tab 2.</p>',
        ],
        [
            'anchor' => 'Tab 3',
            'content' => '<h2>Tab 3 Content</h2><p>This is the content for Tab 3.</p>',
        ],
    ];
?>
    <?= $this->insert('components::tabs', ['tabs' => $tabs, 'class' => 'custom-tabs']) ?>
    <h1>It Works!</h1>
<?php $this->stop() ?>
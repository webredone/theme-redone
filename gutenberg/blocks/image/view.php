<?php if (!empty($image->src)): ?>

    <?php if ($link->url): ?>
        <a <?php echo tr_a($link, "wp-figure-link", true); ?>>
    <?php endif; ?>

        <figure class="wp-figure wp-figure-test">
            <?php echo tr_get_media($image, true); ?>
            <?php if (strlen($caption->text)): ?>
                <figcaption class="wp-figcaption">
                    <?php echo htmlspecialchars($caption->text); ?>
                </figcaption>
            <?php endif; ?>
        </figure>

    <?php if ($link->url): ?>
        </a>
    <?php endif; ?>

<?php endif; ?>
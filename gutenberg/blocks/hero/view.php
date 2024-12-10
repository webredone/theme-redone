<section class="hero-main">
    <div class="hero-main__cont">
        <?php if (!empty($title->text)): ?>
            <h1><?php echo htmlspecialchars($title->text); ?></h1>
        <?php endif; ?>

        <?php if (!empty($title['text'])): ?>
            <h1><?php echo htmlspecialchars($title['text']); ?></h1>
        <?php endif; ?>

        <?php if (!empty($something)): ?>
            <p><?php echo htmlspecialchars($something); ?></p>
        <?php endif; ?>

        <?php if (!empty($something_else)): ?>
            <p><?php echo htmlspecialchars($something_else); ?></p>
        <?php endif; ?>

        <?php echo tr_a($cta, "btn btn--brand"); ?>
    </div><?php // cont?>
</section>
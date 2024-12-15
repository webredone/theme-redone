<?= $this->insert('layout::header') ?>

<section class="content">
	<div class="container">
        <?= $this->section('page_content') ?>
	</div>
</section>

<?= $this->insert('layout::footer') ?>
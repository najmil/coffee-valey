<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>

    <h4>Bean of The Day</h4>
    <span><?= $beans['bean_name'] ?></span><br><br>

    <h4>Sale Price</h4>
    <span>$ <?= $beans['sale_price'] ?></span><br><br>

    <h4>Description</h4>
    <span><?= $beans['description'] ?></span><br><br>

<?= $this->endSection('content'); ?>
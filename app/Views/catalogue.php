<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>

    <table>
        <thead>
            <tr>
                <th>Bean</th>
                <th>Description</th>
                <th>Price/Unit</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($beans as $bean): ?>
                <tr>
                    <td><?= $bean['bean'] ?></td>
                    <td><?= $bean['description'] ?></td>
                    <td><?= $bean['price_unit'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?= $this->endSection('content'); ?>
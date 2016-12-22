<?php $this->layout('layoutSystem', ['title' => '']) ?>

<?php $this->start('main_content') ?>

<?php /* debug($childDaylyReport); */?>
<!--display-->

<h1 align="center">Daily Report de : <?= $childDaylyReport['chd_firstname'].' '.$childDaylyReport['chd_lastname'] ?></h1><br><br>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Date</th>
            <th>Petit-déjeuner</th>
            <th>Déjeuner</th>
            <th>Gouter</th>
            <th>Urines</th>
            <th>Selles</th>
            <th>Sieste</th>
            <th>Commentaires</th>
        </tr>
    </thead>
    <tbody>
        <tr class="kms-dataset">
            <td><?= $childDaylyReport['drp_date'] ?></td>
            <td><?= $childDaylyReport['drp_repas_matin'] ?></td>
            <td><?= $childDaylyReport['drp_repas_midi'] ?></td>
            <td><?= $childDaylyReport['drp_repas_apresmidi'] ?></td>
            <td><?= $childDaylyReport['drp_fisio_wet'] ?> fois</td>
            <td><?= $childDaylyReport['drp_fisio_poo'] ?> fois</td>
            <td><?= $childDaylyReport['drp_sieste'] ?> mn</td>
            <td><?= $childDaylyReport['drp_comments'] ?></td>
        </tr>
    </tbody>
</table>
<?php $this->stop('main_content') ?>



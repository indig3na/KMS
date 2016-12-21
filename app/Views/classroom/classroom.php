<?php $this->layout('layoutSystem', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<div class="panel panel-success">
    <div class="panel-heading"><?= $title ?></div>
    <!-- Table -->
    <?php if (!empty($data)):?>

        <table class="table">
            <thead>
                <tr>
                    <?php foreach ($header as $value): ?>
                        <th><?= $value ?></th>
                    <?php endforeach ?>
                    <th class="kms-action">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr id="kms-add" class="kms-dataset">
                        <?php foreach ($data[0] as $key => $value):?>
                            <?php if ($key !== $primaryKey): ?>
                                <td><input class="form-control kms-add kms-inp" type="text" name="<?= $key ?>"/></td>
                            <?php endif ?>
                        <?php endforeach ?>
                        <td class="kms-action kms-add"><a class="btn btn-success" href="#" id="kms-crud-add-btn">Ajouter</a></td>
                </tr>
                <?php foreach ($data as $row):?>
                    <tr class="kms-dataset" data-id="<?= $row[$primaryKey] ?>">
                        <?php foreach ($row as $key => $value):?>
                            <?php if ($key !== $primaryKey): ?>
                                <td class="kms-data"><?= $value ?></td>
                            <?php endif ?>
                        <?php endforeach ?>
                        <td class="kms-action kms-update">
                            <a class="btn btn-info btn-flat kms-crud-update-btn" href="#" data-id="<?= $row[$primaryKey] ?>"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-flat kms-crud-delete-btn" href="#" data-id="<?= $row[$primaryKey] ?>"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr> 
                <?php endforeach ?>

            </tbody>
        </table>
    <?php
    else:
        echo '<span>Vide!</span>';
    endif
    ?>
</div>
<?php $this->stop('main_content') ?>


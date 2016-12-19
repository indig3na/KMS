<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content')?>

<div class="panel panel-success">
    <div class="panel-heading"><?= $title ?></div>
    <!-- Table -->
    <?php/** print_r($w_user) **/ ?>
   
    <?php if (!empty($data)): ?>
        <table class=" table">
            <thead>
            <tr>
                <?php foreach ($header as $value): ?>
                    <th><?= $value ?></th>
                <?php endforeach ?>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php //ligne d'ajout ?>
            <tr id="add">
                <?php foreach ($data[0] as $key => $value): ?>
                    <?php if ($key == $primaryKey): ?>
                    <?php elseif (isset($fkData) && in_array($key, array_keys($fkData))): ?>
                        <td>
                            <select data-placeholder="Cliquez pour sélectionner ou chercher..." class="form-control kms-add-inp chosen-select" <?= isset($mult) && in_array($key,$mult) ? 'multiple' : '' ?> name="<?= $key ?>">
                                <?php foreach ($fkData[$key] as $id => $value): ?>
                                    <option value="<?= $id ?>"><?= $value ?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    <?php
                    else: ?>
                        <td><input class="form-control kms-add-inp" type="text" name="<?= $key ?>"/></td>
                    <?php endif ?>
                <?php endforeach ?>
                <td class="kms-action"><a class="btn btn-success" href="#" id="kms-crud-add-btn">Ajouter</a></td>
            </tr>
            <?php //lignes de données ?>
            <?php foreach ($data as $row): ?>
                <tr>
                    <?php foreach ($row as $key => $value): ?>
                        <?php if ($key == $primaryKey): ?>
                        <?php elseif (isset($fkData) && in_array($key, array_keys($fkData))): ?>
                            <td class="kms-datacolumn kms-datacolumn-select">
                                <?php if(empty($value)): ?>
                                <?php elseif (is_array($value)): ?>
                                    <?php foreach ($value as $val): ?>
                                        <span class="well well-sm" data-id="<?= $val ?>" value="<?= $val ?>"><?= $fkData[$key][$val] ?></span>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <span data-id="<?= $value ?> "value="<?= $value ?>"><?= $fkData[$key][$value] ?></span>
                                <?php endif ?>
                            </td>
                        <?php else: ?>
                            <td class="kms-datacolumn"><?= $value ?></td>
                        <?php endif ?>
                    <?php endforeach ?>
                    <td class="kms-action">
                        <a class="btn btn-success kms-crud-update-btn" href="#" data-id="<?= $row[$primaryKey] ?>" value="<?= $row[$primaryKey] ?>">Modifier</a>
                        <a class="btn btn-danger kms-crud-delete-btn" href="#" data-id="<?= $row[$primaryKey] ?>" value="<?= $row[$primaryKey] ?>">X</a>
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


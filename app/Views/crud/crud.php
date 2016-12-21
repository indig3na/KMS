<?php/*
 * liste de vue/modification
 * 
 * accepte plusieurs paramètres:
 * $data :
 * 
 * 
 */?>

<?php if (!isset ($tableOnly)): ?>
    <?php $this->layout('layoutsystem', ['title' => $title]) ?>

    <?php $this->start('main_content')?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3><?= $title ?></h3>
        </div>
        <!-- Table -->
<?php endif; ?>
    <table class=" table table-hover table-striped">
        <?php if (!empty($data)): ?>
            <thead>
            <tr>
                <?php foreach ($header as $value): ?>
                    <th><?= $value ?></th>
                <?php endforeach ?>
                <?php if(!isset($noAction)): ?><th class="kms-action">Action</th><?php endif ?>
            </tr>
            </thead>
            <tbody>
            <?php if(!isset($noAction)): //ligne d'ajout ?>
                <tr id="kms-add" class="kms-dataset">
                    <?php foreach ($data[0] as $key => $value): ?>
                        <?php if ($key == $primaryKey): ?>
                        <?php elseif (isset($fkData) && in_array($key, array_keys($fkData))): ?>
                            <td>
                                <select data-placeholder="Cliquez pour sélectionner ou chercher..." class="form-control kms-add kms-select chosen-select" <?= isset($mult) && in_array($key,$mult) ? 'multiple' : '' ?> name="<?= $key ?>">
                                    <?php foreach ($fkData[$key] as $id => $value): ?>
                                        <option value="<?= $id ?>"><?= $value ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        <?php
                        else: ?>
                            <td><input class="form-control kms-add kms-inp" type="text" name="<?= $key ?>"/></td>
                        <?php endif ?>
                    <?php endforeach ?>

                    <td class="kms-action kms-add"><a class="btn btn-success" href="#" id="kms-crud-add-btn">Ajouter</a></td>
                </tr>
            <?php endif ?>
            <?php //lignes de données ?>
            <?php foreach ($data as $row): ?>
                <tr class="kms-dataset" data-id="<?= $row[$primaryKey] ?>">
                    <?php foreach ($row as $key => $value): ?>
                        <?php if ($key == $primaryKey || (isset($ignoreData) && in_array($key,$ignoreData))): ?>
                        <?php elseif (isset($fkData) && in_array($key, array_keys($fkData))): ?>
                            <td class="kms-data kms-select">
                                <?php if(empty($value)): ?>
                                <?php elseif (is_array($value)): ?>
                                    <?php foreach ($value as $val): ?>
                                        <span class="well well-sm kms-option" data-val="<?= $val ?>" value="<?= $val ?>"><?= $fkData[$key][$val] ?></span>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <span class="kms-option" data-val="<?= $value ?>"value="<?= $value ?>"><?= $fkData[$key][$value] ?></span>
                                <?php endif ?>
                            </td>
                        <?php else: ?>
                            <td class="kms-data"><?= $value ?></td>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php if(!isset($noAction)): ?>    
                        <td class="kms-action kms-update">
                            <a class="btn btn-info btn-flat kms-crud-update-btn" href="#" data-id="<?= $row[$primaryKey] ?>" value="<?= $row[$primaryKey] ?>"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-flat kms-crud-delete-btn" href="#" data-id="<?= $row[$primaryKey] ?>" value="<?= $row[$primaryKey] ?>"><i class="fa fa-trash-o"></i></a>
                        </td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
            </tbody>
        <?php
        else:
            echo '<tr><td style="text-align:center"><span>Aucun(e) '.$title.'</span></td></tr>';
        endif
        ?>
    </table>
<?php if (!isset ($tableOnly)): ?>
    </div>
    <?php $this->stop('main_content') ?>
<?php endif ?>


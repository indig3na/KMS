<?php $this->layout('layout', ['title' => 'SchoolYear']) ?>

<?php $this->start('main_content') ?>
    <div class="panel panel-success">
        <div class="panel-heading"><?= $title ?></div>
        <!-- Table -->
        <?php if (!empty($data)): ?>
            <table class="table">
                <thead>
                <tr>
                    <?php foreach ($header as $value): ?>
                        <th><?= $value ?></th>
                    <?php endforeach ?>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr id="add">
                    <form action="" method="post">
                        <?php foreach ($data[0] as $key => $value): ?>
                            <?php if ($key !== $primaryKey): ?>
                                <td class="kms-headercolumn"><input class="form-control" type="text"
                                                                    name="<?= $key ?>"/></td>
                            <?php endif ?>
                        <?php endforeach ?>
                        <td class="kms-action"><input class="btn btn-success kms-add" type="submit"
                                                      value="Ajouter"/><input type="hidden" class="kms-method"
                                                                              name="action" value="insert"/></td>
                    </form>
                </tr>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <?php foreach ($row as $key => $value): ?>
                            <?php if ($key !== $primaryKey): ?>
                                <td class="kms-datacolumn"><?= $value ?></td>
                            <?php endif ?>
                        <?php endforeach ?>
                        <td class="kms-action">
                            <a class="btn btn-success kms-update" value="<?= $row[$primaryKey] ?>">Modifier</a>
                            <a class="btn btn-danger kms-delete" href="?action=delete&id=<?= $row[$primaryKey] ?>">X</a>
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

<?php $this->layout('layoutSystem', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<!--display-->
<?php // var_dump($data) ;?>

<!--add child-->
<section class="content" id="addchild">
    <div class="panel panel-success">
        <div class="panel-heading"><?= $title ?> <a class="btn btn-danger kms-crud-cancel-btn btn-flat pull-right" style="margin-top:-6px;">Annuler</a></div>
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title">Ajout enfant</h3>
            </div>
        </div>
        <div class="box-body table-responsive">
            <!-- Form -->
            <form class="form-horizontal col-md-10 col-md-offset-1" method="post" action="" enctype="multipart/form-data" id="addchildtolist" name="addchild" role="form">
                <div class="form-group" >
                    <label for="inputEmail3">Prénom *</label>
                    <input type="text" name="chd_firstname" class="form-control " required placeholder="Prénom">
                </div>
                <div class="form-group">
                    <label for="inputEmail3">Nom *</label>
                    <input type="text" name="chd_lastname" class="form-control " required placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="inputform">Date de naissance *</label>
                    <input type="date"  name="chd_birthday"  class="form-control">

                </div>

                <div class="form-group">
                    <label for="inputform">Sexe *</label>
                    <div class="radio ">
                        <label>
                            <input type="radio" name="chd_gender" value="M">
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="chd_gender" value="F" >
                            Female
                        </label>
                    </div>
                </div>

                <div class="form-group">
                            <label for="inputform">Parent</label>

                            <select data-placeholder="Sélectionnez un parent" name="user_usr_id" class="form-control chosen-select">
                                <option value="0"></option>
                                <?php foreach ($fkData['user_usr_id'] as $id => $value): ?>
                                    <option value="<?= $id ?>"><?= $value ?></option>
                                <?php endforeach ?>
                            </select>


                </div>

                <div class="form-group">
                            <label for="inputform">Classe</label>

                            <select data-placeholder="Sélectionnez une classe" name="class_cls_id" class="form-control chosen-select" >
                                <option value="0"></option>
                                <?php foreach ($fkData['class_cls_id'] as $id => $value): ?>
                                    <option value="<?= $id ?>"><?= $value ?></option>
                                <?php endforeach ?>
                            </select>

                </div>
                <div class="form-group">
                    <label for="inputform">Commentaires</label>
                    <input type="text" name="chd_comments" class="form-control" placeholder="Commentaires..." >
                </div>
                <div class="form-group">
                    <label for="inputform">Intérêts</label>
                    <input type="text" name="chd_interest" class="form-control "  placeholder="Intérêts...">
                </div>

                <div class="form-group">
                    <input type="hidden" name="submitFile" value="1" />
                    <label for="inputform">Photo</label>
                    <input type="file" name="chd_photo">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary ">Ajout enfant</button>
                </div>
            </form>
        </div>
    </div>
</section>





<?php if (!empty($_GET['id'])):?>
<!--edit child-->
<section class="content" id="editchild">
    <div class="panel panel-success">
        <div class="panel-heading"><?= $title ?> <a class="btn btn-danger kms-crud-cancel-btn btn-flat pull-right" style="margin-top:-6px;">Annuler</a></div>
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title">Modifier Enfant</h3>
            </div>
        </div>
        <div class="box-body table-responsive">
            <!-- Form -->
            <form class="form-horizontal col-md-10 col-md-offset-1 kms-dataset" data-id="<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data" action="" name="addchild" role="form">
                <div class="form-group" >
                    <label for="inputEmail3">Prénom *</label>
                    <input type="text" name="chd_firstname" class="form-control kms-update" required value="<?= $childData['chd_firstname'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail3">Nom *</label>
                    <input type="text" name="chd_lastname" class="form-control kms-update" required value="<?= $childData['chd_lastname'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputform">Date de naissance</label>
                    <input type="date"  name="chd_birthday" value="<?= $childData['chd_birthday'] ?>" class=" kms-update form-control">

                </div>
                <div class="form-group">
                    <label for="inputform">Sexe *</label>
                    <div class="radio">
                        <label>
                            <input class="kms-update" type="radio" name="chd_gender" value="M" <?= $childData['chd_gender']==='M' ? 'checked' : '' ?>>
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input class="kms-update" type="radio" name="chd_gender" value="F" <?= $childData['chd_gender']==='F' ? 'checked' : '' ?>>
                            Female
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputform">Parent</label>

                    <select data-placeholder="Sélectionnez un parent" class="form-control chosen-select kms-update">
                        <option value="0"></option>
                        <?php foreach ($fkData['user_usr_id'] as $id => $value): ?>
                            <option <?= $childData['user_usr_id'] == $id ? 'selected' : ''?> value="<?= $id ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>


                </div>

                <div class="form-group">
                    <label for="inputform">Classe</label>

                    <select data-placeholder="Sélectionnez une classe" class="form-control chosen-select kms-update" >
                        <option value="0"></option>
                        <?php foreach ($fkData['class_cls_id'] as $id => $value): ?>
                            <option <?= $childData['class_cls_id'] == $id ? 'selected' : ''?> value="<?= $id ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="inputform">Commentaires</label>
                    <input type="text" name="chd_comments" class="form-control kms-update" value="<?= $childData['chd_comments'] ?>" >
                </div>
                <div class="form-group">
                    <label for="inputform">Intérêts</label>
                    <input type="text" name="chd_hobbies" class="form-control kms-update"  value="<?= $childData['chd_hobbies'] ?>">
                </div>

                <div class="form-group">
                    <input type="hidden" name="submitFile" value="1" />
                    <label for="inputform">Photo</label>
                    <img src="<?= $this ->assetUrl('img/filesId//'.$childData['chd_img_path']) ?>"/>
                    <input type="file" name="chd_photo" id="photo">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary kms-crud-save-btn" >Modifier Enfant</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!--list display-->
<?php else: ?>
<section class="content" id="list">
    <div class="panel panel-default" >
        <div class="panel-heading"><h3 style="display: inline;"><?= $title ?> </h3><a class="btn btn-success kms-crud-addchild-btn btn-flat pull-right" style="margin-top:-5px;">Ajout enfant</a></div>
        <div class="box col-xs-12">
            <div class="box-header">
                <div class="box-tools">
                    <br>
                    <?php /*<div class="input-group">
                        <input type="text" name="table_search" class="form-control input-md pull-right" style="width: 250px; height: 36px;" placeholder="Search for">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search fa-2x "></i></button>
                        </div>
                    </div>

                    <br>*/ ?>
                </div>
            </div>
            <div class="box-body table-responsive kms-datatable">
                <!-- Table -->
                <table class="table table-hover">
                    <tbody>
                        <?php if (!empty($data)): ?>
                            <tr>
                                <?php foreach ($header as $value): ?>
                                    <th><?= $value ?></th>
                                <?php endforeach ?>
                                <th class="kms-action">Action</th>

                            </tr>
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
                                                    <span class="kms-option" data-val="<?= $value ?> "value="<?= $value ?>"><?= $fkData[$key][$value] ?></span>
                                                <?php endif ?>
                                            </td>
                                        <?php elseif(isset($img) && in_array($key,$img) && !empty($value)): ?>
                                            <td class="kms-data"><img src="<?= $this ->assetUrl('img/filesId/'.$value) ?>" style="max-height:50px"/></td>
                                        <?php else: ?>
                                            <td class="kms-data"><?= $value ?></td>
                                        <?php endif ?>
                                        <?php endforeach ?>
                                    <td class="kms-action kms-update">
                                        <a type="button" class="btn btn-info btn-flat kms-crud-edit-btn" title="Edit" tooltip href="#" value="<?= $row[$primaryKey] ?>"><i class="fa fa-pencil"></i></a>
                                        <a type="button" class="btn btn-danger btn-flat kms-crud-delete-btn" title="Remove" tooltip href="#" value="<?= $row[$primaryKey] ?>"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php
                        else:
                            echo '<tr><td style="text-align:center"><span>Aucun enfant!</span></td></tr>';
                        endif
                        ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</section>

<?php endif ?>
<?php $this->stop('main_content') ?>


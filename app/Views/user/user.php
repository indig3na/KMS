<?php $this->layout('layoutSystem', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<!--display-->
<?php// var_dump($userData) ;?>
<!--add user-->
<section class="content" id="addchild">
    <div class="panel panel-success">
        <div class="panel-heading"><?= $title ?> <a class="btn btn-danger kms-crud-cancel-btn btn-flat pull-right" style="margin-top:-6px;">Annuler</a></div>
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title">Ajout <?= $title ?></h3>
            </div>
        </div>
        <div class="box-body table-responsive">
            <!-- Form -->
            <form class="form-horizontal col-md-10 col-md-offset-1" method="post" enctype="multipart/form-data" action="" id="addchildtolist" name="addchild" role="form" novalidate>
                <div class="form-group" >
                    <label for="inputEmail3">Prénom *</label>
                    <input type="text" name="usr_firstname" class="form-control" required placeholder="Firstname">
                </div>
                <div class="form-group">
                    <label for="inputEmail3">Nom * </label>
                    <input type="text" name="usr_lastname" class="form-control" required placeholder="Lastname">
                </div>
                <div class="form-group">
                    <label for="inputFormUser">Adresse</label>
                    <input type="text"  name="usr_address"  class="form-control" placeholder="contact address">

                </div>
                <div class="form-group">
                    <label for="inputFormUser">No. téléphone mobile</label>
                    <input type="text"  name="usr_tel_mobile1"  class="form-control" laceholder="contact mobile_no">

                </div>

                <div class="form-group">
                    <label for="inputFormUser">No. téléphone fixe</label>
                    <input type="text"  name="usr_tel_domicile"  class="form-control" laceholder="contact home_no">

                </div>
                <div class="form-group">
                    <label for="inputFormUser">Adresse E-mail</label>
                    <input type="email" name="usr_email" class="form-control" placeholder="Email" >
                </div>
                <?php if ($role !=='ROLE_PAR'): ?>
                <div class="form-group">
                    <label for="inputform">Établissement</label>

                    <select data-placeholder="Sélectionnez un établissement" class="form-control chosen-select">
                        <?php foreach ($fkData['nursery_nur_id'] as $id => $value): ?>
                            <option value="<?= $id ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>
                <?php endif ?>

                </div>
                <?php if ($role ==='ROLE_EDU'): ?>
                <div class="form-group">
                    <label for="inputform">Classe</label>

                    <select data-placeholder="Sélectionnez une classe" class="form-control chosen-select" >
                        <option value="0"></option>
                        <?php foreach ($fkData['class_cls_id'] as $id => $value): ?>
                            <option value="<?= $id ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>
                    
                </div>
                <?php endif ?>
                <div class="form-group">
                    <label for="inputform">Ville</label>

                    <select data-placeholder="Sélectionnez une ville" class="form-control chosen-select" >
                        <option value="0"></option>
                        <?php foreach ($fkData['city_cit_id'] as $id => $value): ?>
                            <option value="<?= $id ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>

                </div>
                
                <?php if ($role !=='ROLE_PAR'): ?>
                <div class="form-group">
                    <input type="hidden" name="submitFile" value="1" />
                    <label for="inputFormUser">Photo</label>
                    <input type="file" name="photo" id="photo">
                </div>
                <?php endif ?>
                <div class="form-group">
                    <input type="hidden" name="usr_role" value = <?= $role ?>>
                    <button type="submit" class="btn btn-primary" >Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</section>


<?php if (!empty($_GET['id'])):?>
    <!--edit user-->
    <section class="content" id="editchild">
        <div class="panel panel-success">
            <div class="panel-heading"><?= $title ?> <a class="btn btn-danger kms-crud-cancel-btn btn-flat pull-right" style="margin-top:-6px;">Annuler</a></div>
            <div class="box col-xs-12">
                <div class="box-header">
                    <h3 class="box-title">Modifier <?= $title ?></h3>
                </div>
            </div>
            <div class="box-body table-responsive">
                <!-- Form -->
                <form class="kms-dataset form-horizontal col-md-10 col-md-offset-1" method="post" enctype="multipart/form-data" action="" name="addchild" role="form" novalidate data-id="<?= $_GET['id'] ?>">
                    <div class="form-group" >
                        <label for="inputForm">Prénom *</label>
                        <input type="text" name="usr_firstname" class="kms-update form-control" required value="<?= $userData['usr_firstname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputForm">Nom * </label>
                        <input type="text" name="usr_lastname" class="kms-update form-control" required value="<?= $userData['usr_lastname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputForm">Adresse</label>
                        <input type="date"  name="usr_address"  class="kms-update form-control" value="<?= $userData['usr_address'] ?>">

                    </div>
                    <div class="form-group">
                        <label for="inputForm">No. téléphone mobile</label>
                        <input type="date"  name="usr_tel_mobile_1"  class="kms-update form-control" value="<?= $userData['usr_tel_mobile_1'] ?>">

                    </div>

                    <div class="form-group">
                        <label for="inputForm">No. téléphone fixe</label>
                        <input type="date"  name="usr_tel_domicile"  class="kms-update form-control" value="<?= $userData['usr_tel_domicile'] ?>">

                    </div>
                    <div class="form-group">
                        <label for="inputForm">Adresse E-mail</label>
                        <input type="email" name="usr_email" class="kms-update form-control" value="<?= $userData['usr_email'] ?>" >
                    </div>
                    <?php if ($role !=='ROLE_PAR'): ?>
                    <div class="form-group">
                        <label for="inputform">Établissement</label>

                        <select data-placeholder="Sélectionnez un établissement" name="nursery_nur_id" class="form-control kms-update  chosen-select">
                            <option value="0"></option>
                            <?php foreach ($fkData['nursery_nur_id'] as $id => $value): ?>
                                <option value="<?= $id ?>" <?= $userData['nursery_nur_id'] == $id ? 'selected' : ''?> ><?= $value ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <?php endif ?>
                    <?php if ($role === 'ROLE_EDU'): ?>
                    <div class="form-group">
                        <label for="inputform">Classe</label>

                        <select data-placeholder="Sélectionnez une classe" name="class_cls_id" class="form-control kms-update  chosen-select" >
                            <option value="0"></option>
                            <?php foreach ($fkData['class_cls_id'] as $id => $value): ?>
                                <option value="<?= $id ?>" <?= $userData['class_cls_id'] == $id ? 'selected' : ''?> ><?= $value ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="inputform">Ville</label>

                        <select data-placeholder="Sélectionnez une ville" name="city_cit_id" class="kms-update form-control chosen-select" >
                            <?php foreach ($fkData['city_cit_id'] as $id => $value): ?>
                                <option value="<?= $id ?>" <?= $userData['city_cit_id'] == $id ? 'selected' : ''?> ><?= $value ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <?php if ($role !=='ROLE_PAR'): ?>
                    <div class="form-group">
                        <label for="inputFormUser">Photo</label>
                        <input class="kms-update kms-file" type="file" name="photo">
                        <p class="help-block">toutes les extensions sont autorisées</p>
                        <br />
                    </div>
                    <?php endif ?>
                    <div class="form-group">
                        <input class="kms-update" type="hidden" name="usr_role" value = <?= $role ?>>                    </div>
                        <button type="submit" class="btn btn-primary kms-crud-save-btn" >Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php else :?>

<!--list display-->

<section class="content" id="list">
    <div class="panel panel-success">
        <div class="panel-heading"><h3 style="display: inline;"><?= $title ?></h3> <a class="btn btn-success kms-crud-addchild-btn btn-flat pull-right" style="margin-top:-5px;">Ajouter</a></div>
        <div class="box col-xs-12">
            <div class="box-header">
                <br>

                <div class="box-tools">
                    <div class="input-group">
                        <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 250px; height: 36px;" placeholder="Rechercher...">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search fa-2x "></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="box-body table-responsive kms-datatable">
                <!-- Table -->
                <table class="table table-hover kms-datatable">
                    <tbody>
                        <?php if (!empty($data)): ?>
                            <tr>
                                <?php foreach ($header as $value): ?>
                                    <th><?= $value ?></th>
                                <?php endforeach ?>
                                <th>Action</th>
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
                                                            <span class="well well-sm kms-option" data-val="<?= $val ?>"><?= $fkData[$key][$val] ?></span>
                                                        <?php endforeach ?>
                                                    <?php else: ?>
                                                        <span class="kms-option" data-val="<?= $value ?>"><?= $fkData[$key][$value] ?></span>
                                                    <?php endif ?>
                                                </td>
                                            <?php else: ?>
                                                <td class="kms-data"><?= $value ?></td>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <td class="kms-action">
                                        <a type="button" class="btn btn-info btn-flat kms-crud-edit-btn" title="Edit" tooltip href="#"><i class="fa fa-pencil"></i></a>
                                        <a type="button" class="btn btn-danger btn-flat kms-crud-delete-btn" title="Remove" tooltip href="#"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else:
                            echo '<tr><td style="text-align:center"><span>Aucun utilisateur!</span></td></tr>';
                        endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div
</section>

<?php endif ?>

<?php $this->stop('main_content') ?>


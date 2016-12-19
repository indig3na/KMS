<?php $this->layout('layoutSystem', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<!--display-->
<?php// var_dump($userData) ;?>

<section class="content" id="addchild">
    <div class="panel panel-success">
        <div class="panel-heading"><?= $title ?> <a class="btn btn-danger kms-crud-cancel-btn btn-flat pull-right" style="margin-top:-6px;">Cancel</a></div>
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title">Add user</h3>
            </div>
        </div>
        <div class="box-body table-responsive">
            <!-- Form -->
            <form class="form-horizontal col-md-10 col-md-offset-1" method="post" action="" id="addchildtolist" name="addchild" role="form" novalidate>
                <div class="form-group" >
                    <label for="inputEmail3">Firstname *</label>
                    <input type="text" name="usr_firstname" class="form-control" required placeholder="Firstname">
                </div>
                <div class="form-group">
                    <label for="inputEmail3">Lastname * </label>
                    <input type="text" name="usr_lastname" class="form-control" required placeholder="Lastname">
                </div>
                <div class="form-group">
                    <label for="inputFormUser">Address</label>
                    <input type="text"  name="usr_address"  class="form-control" placeholder="contact address">

                </div>
                <div class="form-group">
                    <label for="inputFormUser">Contact mobile_no</label>
                    <input type="text"  name="usr_tel_mobile1"  class="form-control" laceholder="contact mobile_no">

                </div>

                <div class="form-group">
                    <label for="inputFormUser">Contact home_no</label>
                    <input type="text"  name="usr_tel_domicile"  class="form-control" laceholder="contact home_no">

                </div>
                <div class="form-group">
                    <label for="inputFormUser">Email</label>
                    <input type="email" name="usr_email" class="form-control" placeholder="Email" >
                </div>
                <div class="form-group">
                    <label for="inputFormUser">Role</label>
                    <input type="text" name="usr_role" class="form-control"  placeholder="role">
                </div>

                <div class="form-group">
                    <label for="inputform">Nursery</label>

                    <select data-placeholder="Sélectionnez des parents" class="form-control chosen-select">
                        <?php foreach ($fkData['nursery_nur_id'] as $id => $value): ?>
                            <option value="<?= $id ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>


                </div>

                <div class="form-group">
                    <label for="inputform">Classe</label>

                    <select data-placeholder="Sélectionnez des classes" class="form-control chosen-select" >
                        <?php foreach ($fkData['class_cls_id'] as $id => $value): ?>
                            <option value="<?= $id ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="inputform">City</label>

                    <select data-placeholder="Sélectionnez des classes" class="form-control chosen-select" >
                        <?php foreach ($fkData['city_cit_id'] as $id => $value): ?>
                            <option value="<?= $id ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="inputFormUser">Photo</label>
                    <input type="file" name="photo">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" >Edit user</button>
                </div>
            </form>
        </div>
    </div>
</section>


<?php if (!empty($_GET['id'])):?>
<!--edit child-->
<section class="content" id="editchild">
    <div class="panel panel-success">
        <div class="panel-heading"><?= $title ?> <a class="btn btn-danger kms-crud-cancel-btn btn-flat pull-right" style="margin-top:-6px;">Cancel</a></div>
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title">Edit user</h3>
            </div>
        </div>
        <div class="box-body table-responsive">
            <!-- Form -->
            <form class="form-horizontal col-md-10 col-md-offset-1" method="post" action="" name="addchild" role="form" novalidate>
                <div class="form-group" >
                    <label for="inputEmail3">Firstname *</label>
                    <input type="text" name="usr_firstname" class="form-control" required value="<?= $userData['usr_firstname'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail3">Lastname * </label>
                    <input type="text" name="usr_lastname" class="form-control" required value="<?= $userData['usr_lastname'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputFormUser">Address</label>
                    <input type="date"  name="usr_address"  class="form-control" value="<?= $userData['usr_address'] ?>">

                </div>
                <div class="form-group">
                    <label for="inputFormUser">Contact mobile_no</label>
                    <input type="date"  name="usr_tel_mobile1"  class="form-control" value="<?= $userData['usr_tel_mobile1'] ?>">

                </div>

                <div class="form-group">
                    <label for="inputFormUser">Contact home_no</label>
                    <input type="date"  name="usr_tel_domicile"  class="form-control" value="<?= $userData['usr_tel_domicile'] ?>">

                </div>
                <div class="form-group">
                    <label for="inputFormUser">Email</label>
                    <input type="email" name="usr_email" class="form-control" value="<?= $userData['usr_email'] ?>" >
                </div>
                <div class="form-group">
                    <label for="inputFormUser">Role</label>
                    <input type="text" name="usr_role" class="form-control"  value="<?= $userData['usr_role'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputform">Nursery</label>

                    <select data-placeholder="Sélectionnez des parents" class="form-control chosen-select">
                        <?php foreach ($fkData['nursery_nur_id'] as $id => $value): ?>
                            <option value="<?= $id ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>


                </div>

                <div class="form-group">
                    <label for="inputform">Classe</label>

                    <select data-placeholder="Sélectionnez des classes" class="form-control chosen-select" >
                        <?php foreach ($fkData['class_cls_id'] as $id => $value): ?>
                            <option value="<?= $id ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="inputform">City</label>

                    <select data-placeholder="Sélectionnez des classes" class="form-control chosen-select" >
                        <?php foreach ($fkData['city_cit_id'] as $id => $value): ?>
                            <option value="<?= $id ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="inputFormUser">Photo</label>
                    <input type="file" name="photo">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" >Edit user</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php else :?>

<!--list item-->

<section class="content" id="list">
    <div class="panel panel-success">
        <div class="panel-heading"><?= $title ?> <a class="btn btn-success kms-crud-addchild-btn btn-flat pull-right" style="margin-top:-5px;">add user</a></div>
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title">List Users</h3>
                <div class="box-tools">
                    <div class="input-group">
                        <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search "></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive">
                <!-- Table -->
                <?php if (!empty($data)): ?>
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <?php foreach ($header as $value): ?>
                                <th style="width: 250px;"><?= $value ?></th>
                            <?php endforeach ?>
                            <th>Action</th>
                        </tr>
                        <?php //lignes de données ?>
                        <?php foreach ($data as $row): ?>
                            <tr  total-items="totalItems" >
                                <?php foreach ($row as $key => $value): ?>
                                    <?php if ($key == $primaryKey): ?>
                                    <?php elseif (isset($fkData) && in_array($key, array_keys($fkData))): ?>
                                        <td class="kms-datacolumn" style="width: 250px;"><?= $fkData[$key][$value] ?></td>
                                    <?php
                                    else: ?>
                                        <td class="kms-datacolumn"><?= $value ?></td>
                                    <?php endif ?>

                                <?php endforeach ?>
                                <td class="kms-action">
                                    <a type="button" class="btn btn-info btn-flat kms-crud-edit-btn" title="Edit" tooltip href="#" value="<?= $row[$primaryKey] ?>"><i class="fa fa-pencil"></i></a>
                                    <a type="button" class="btn btn-danger btn-flat kms-crud-delete-btn" title="Remove" tooltip href="#" value="<?= $row[$primaryKey] ?>"><i class="fa fa-trash-o"></i></a>
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
        </div>
    </div>
    </div
</section>

<?php endif ?>

<?php $this->stop('main_content') ?>


<?php $this->layout('layoutSystem', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<!--display-->
<?php // var_dump($data) ;?>

<section class="content" id="addchild">
    <div class="panel panel-success">
        <div class="panel-heading"><?= $title ?> <a class="btn btn-danger kms-crud-cancel-btn btn-flat pull-right" style="margin-top:-6px;">Cancel</a></div>
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title">Add children</h3>
            </div>
        </div>
        <div class="box-body table-responsive">
            <!-- Form -->
            <form class="form-horizontal col-md-10 col-md-offset-1" method="post" action="" id="addchildtolist" name="addchild" role="form" novalidate>
                <div class="form-group" >
                    <label for="inputEmail3">Firstname *</label>
                    <input type="text" name="chd_firstname" class="form-control " required placeholder="firstname">
                </div>
                <div class="form-group">
                    <label for="inputEmail3">Lastname * </label>
                    <input type="text" name="chd_lastname" class="form-control " required placeholder="lastname">
                </div>
                <div class="form-group">
                    <label for="inputform">Birthday</label>
                    <input type="date"  name="chd_birthday"  class="form-control">

                </div>

                <div class="form-group">
                    <label for="inputform">Gender</label>
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
                            <label for="inputform">Parents</label>

                            <select data-placeholder="Sélectionnez des parents" class="form-control chosen-select">
                                <?php foreach ($fkData['user_usr_id'] as $id => $value): ?>
                                    <option value="<?= $id ?>"><?= $value ?></option>
                                <?php endforeach ?>
                            </select>


                </div>

                <div class="form-group">
                            <label for="inputform">Class</label>

                            <select data-placeholder="Sélectionnez des classes" class="form-control chosen-select" >
                                <?php foreach ($fkData['class_cls_id'] as $id => $value): ?>
                                    <option value="<?= $id ?>"><?= $value ?></option>
                                <?php endforeach ?>
                            </select>

                </div>



                <div class="form-group">
                    <label for="inputform">Phone_No</label>
                    <input type="text" name="phoneNo" class="form-control "  placeholder="phone_no">
                </div>
                <div class="form-group">
                    <label for="inputform">mobile_No</label>
                    <input type="text" name="mobileNo" class="form-control"  placeholder="mobile_no">

                </div>
                <div class="form-group">
                    <label for="inputform">Comments</label>
                    <input type="text" name="chd_comments" class="form-control" placeholder="comments" >
                </div>
                <div class="form-group">
                    <label for="inputform">Hobbies</label>
                    <input type="text" name="chd_interest" class="form-control "  placeholder="Hobbies">
                </div>

                <div class="form-group">
                    <label for="inputform">Photo</label>
                    <input type="file" name="chd_photo">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary " >Add child</button>
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
                <h3 class="box-title">Edit children</h3>
            </div>
        </div>
        <div class="box-body table-responsive">
            <!-- Form -->
            <form class="form-horizontal col-md-10 col-md-offset-1" method="post" action="" name="addchild" role="form" novalidate>
                <div class="form-group" >
                    <label for="inputEmail3">Firstname *</label>
                    <input type="text" name="chd_firstname" class="form-control" required value="<?= $childData['chd_firstname'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail3">Lastname * </label>
                    <input type="text" name="chd_lastname" class="form-control" required value="<?= $childData['chd_lastname'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputform">Gender</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="chd_gender" value="M" <?= $childData['chd_gender']==='M' ? 'checked' : '' ?>>
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="chd_gender" value="F" <?= $childData['chd_gender']==='F' ? 'checked' : '' ?>>
                            Female
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputform">Birthday</label>
                    <input type="date"  name="chd_birthday" value="<?= $childData['chd_birthday'] ?>" class="form-control">

                </div>
                <div class="form-group">
                    <label for="inputform">Comments</label>
                    <input type="text" name="chd_comments" class="form-control" value="<?= $childData['chd_comments'] ?>" >
                </div>
                <div class="form-group">
                    <label for="inputform">Hobbies</label>
                    <input type="text" name="chd_hobbies" class="form-control"  value="<?= $childData['chd_hobbies'] ?>">
                </div>

                <div class="form-group">
                    <label for="inputform">Photo</label>
                    <img src="<?= $this ->assetUrl('img/filesId//'.$childData['chd_img_path']) ?>"/>
                    <input type="file" name="photo" id="photo">
                </div>
                <div class="form-group">
                    <input type="hidden" name="method" value="update"/>
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>"/>
                    <button type="submit" class="btn btn-primary" >Edit child</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!--list item-->
<?php else: ?>
<section class="content" id="list">
<div class="panel panel-success">
    <div class="panel-heading"><?= $title ?> <a class="btn btn-success kms-crud-addchild-btn btn-flat pull-right" style="margin-top:-5px;">add child</a></div>
            <div class="box col-xs-12">
                <div class="box-header">
                    <h3 class="box-title">List children</h3>
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
                                                <td class="kms-data"><img src="<?= $this ->assetUrl('img/avatar/'.$value) ?>" style="max-height:50px"/></td>
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
                                echo '<tr><td style="text-align:center"><span>Vide!</span></td></tr>';
                            endif
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
    </div>
</div
</section>

<?php endif ?>
<?php $this->stop('main_content') ?>


<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<!--display-->
<?php   var_dump($childData) ;?>

<div class="container" id="child">
    <div class="panel panel-primary">
        <div class="panel-heading"><?= $childData['chd_firstname'].' '.$childData['chd_lastname'] ?></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-7 col-md-offset-1">

                    <!--start form-->
                    <form action="" class="form-horizontal" id="chd_form" method="POST">
                        <div class="form-group">
                            <label for="userlastname" >Lastname</label>

                            <input type="text" class="form-control" name="username" id="username" value="<?= $childData['chd_lastname']?>">

                        </div><!-- End form group -->

                        <div class="form-group">
                            <label for="userfirstname">Fisrtname</label>

                            <input type="text" class="form-control" name="userfirstname" id="userfirstname" value="<?= $childData['chd_firstname']?>">

                        </div><!-- End form group -->

                    <!--infor parents comment interest-->
                    <div class="row">
                        <div class="col-md-3 ">


                            <div class="form-group">
                                <label for="usergender" >Gender</label>
                                <input type="text" class="form-control" name="usergender" id="usergender" value="<?= $childData['chd_gender']?>">
                            </div><!-- End form group -->
                            <div class="form-group">
                                <label for="userparent" >Parent</label>
                                <input type="text" class="form-control" name="userparent" id="userparent" value="<?= $childData['par_firstname'].' '.$childData['par_lastname'] ?>">
                                <input type="text" class="form-control" name="userparent2" id="userparent2" placeholder="Enter parent2 name.">

                            </div><!-- End form group -->


                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group">
                                <label for="userbirthday" >Date of birth</label>
                                <input type="date" class="form-control" name="userbirthday" id="userbirthday" value="<?= $childData['chd_birthday'] ?>">
                            </div><!-- End form group -->
                            <div class="form-group">
                                <label for="userparentaddress" >Address</label>
                                <input type="text" class="form-control" name="userparentaddress" id="userparentaddress" value="<?= $childData['par_address'] ?>">
                                <input type="text" class="form-control" name="userparentaddress2" id="userparentaddress2" placeholder="Enter parent2 address.">

                            </div><!-- End form group -->


                        </div>
                        <div class="col-md-3 col-md-offset-1">

                            <div class="form-group">
                                <label for="userinscriptiondate" >Date of inscription</label>
                                <input type="date" class="form-control" name="userinscriptiondate" id="userinscriptiondate" value="<?= $childData['chd_inserted'] ?>">
                            </div><!-- End form group -->
                            <div class="form-group">
                                <label for="userparentcontact" >Contact</label>
                                <input type="text" class="form-control" name="userparentcontact" id="userparentcontact" value="<?= $childData['par_mobile'] ?>">
                                <input type="text" class="form-control" name="userparentcontact2" id="userparentcontact2" placeholder="Enter parent2 contact infos.">

                            </div><!-- End form group -->
                        </div>
                    </div>
                    <!--comments-->
                    <div class="row">
                        <div class="col-md-5 ">
                            <div class="col-md-5 ">
                                <div class="form-group">
                                    <label for="usercomments">Comments</label>
                                    <textarea  name="usercomments" id="usercomments" class="form-control"
                                               cols="15" rows="13" value="<?= $childData['chd_comments'] ?>"><?= $childData['chd_comments'] ?></textarea>
                                </div><!-- End form group -->
                            </div>
                        </div>
                        <!--interests-->
                        <div class="col-md-5 col-md-offset-2">
                            <div class="form-group">
                                <label for="userinterests">Interests</label>
                                <textarea  name="userinterests" id="userinterests" class="form-control"
                                           cols="20" rows="13" value="<?= $childData['chd_hobbies'] ?>"><?= $childData['chd_hobbies'] ?></textarea>
                            </div><!-- End form group -->
                        </div>

                    </div>

                </div>
                <!--table pic-->
                <div class="col-md-4 ">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="text-center" style="width:100%; height:300px;" id="avatar">
                                <img src="<?= $this->assetUrl('img/avatar/'.$childData['chd_img_path']) ?>" src="img/avatar/<?= $childData['chd_img_path'] ?>" style="width: 80%;height: auto;">
                            </div>

                            <br>
                            <br>
                            <div class="form-group">
                                <label for="userclass" >Class name</label>
                                <input type="text" class="form-control" name="userclass" id="userclass" value="<?= $childData['cls_name'] ?>">

                            </div><!-- End form group -->
                            <div class="form-group">
                                <label for="usereducator" >Educator name</label>
                                <input type="text" class="form-control" name="usereducator" id="usereducator" value="<?= $childData['usr_firstname'].' '.$childData['usr_lastname'] ?>">

                            </div><!-- End form group -->
                            <div class="form-group">
                                <label for="userlevel" >Program Level</label>
                                <input type="text" class="form-control" name="userlevel" id="userlevel" value="<?= $childData['prg_name'] ?>">
                            </div><!-- End form group -->
                            <div class="form-group">
                                <label for="userschoolaryear" >Schoolar Year</label>
                                <input type="date" class="form-control" name="userschoolaryear" id="userschoolaryear" value="<?= $childData['scy_year'] ?>">
                            </div><!-- End form group -->
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-md btn-block" id="chd_submit">add new child</button>
                        <button type="submit" class="btn btn-primary btn-md btn-block" id="chd_submit">modify child infos</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
</div>






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
            <?php //ligne d'ajout ?>
            <tr id="add">
                <?php foreach ($data[0] as $key => $value): ?>
                    <?php if ($key == $primaryKey): ?>
                    <?php elseif (isset($fkData) && in_array($key, array_keys($fkData))): ?>
                        <td>
                            <select class="form-control kms-add-inp" name="<?= $key ?>">
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
                </form>
            </tr>
            <?php //lignes de données ?>
            <?php foreach ($data as $row): ?>
                <tr>
                    <?php foreach ($row as $key => $value): ?>
                        <?php if ($key == $primaryKey): ?>
                        <?php elseif (isset($fkData) && in_array($key, array_keys($fkData))): ?>
                            <td class="kms-datacolumn"><?= $fkData[$key][$value] ?></td>
                            <?php
                        else: ?>
                            <td class="kms-datacolumn"><?= $value ?></td>
                        <?php endif ?>
                    <?php endforeach ?>
                    <td class="kms-action">
                        <a class="btn btn-success kms-crud-update-btn" href="#" value="<?= $row[$primaryKey] ?>">Modifier</a>
                        <a class="btn btn-danger kms-crud-delete-btn" href="#" value="<?= $row[$primaryKey] ?>">X</a>
                        <a class="btn btn-success kms-crud-select-btn" href="#" value="<?= $row[$primaryKey] ?>">Select</a>
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


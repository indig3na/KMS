<?php $this->layout('layoutSystem', ['title' => '']) ?>

<?php $this->start('main_content') ?>

<?php debug($childList); ?>
<!--display-->
<table class="table table-hover table-striped">
    <caption><h1>Liste de la classe :<?= $childList[0]['cls_name'] ?></h1></caption>
    <thead>
        <tr>
            <th></th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Hobby</th>
            <th>Remarques</th>
            <th>Parent</th>
            <th><span class="glyphicon glyphicon-folder-open"></span></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($childList as $currentChild) : ?>
        <tr class="kms-dataset">
            <td>
               <img src="<?= $this ->assetUrl('img/filesId/'.$currentChild['chd_img_path']) ?>" style="max-height:30px"/> 
            </td>
            <td>
               <?= $currentChild['chd_firstname'] ?> 
            </td>
            <td>
               <?= $currentChild['chd_lastname'] ?> 
            </td>
            <td>
               <?= $currentChild['chd_birthday'] ?> 
            </td>
            <td>
               <?= $currentChild['chd_hobbies'] ?> 
            <td>
               <?= $currentChild['chd_comments'] ?> 
            </td>
            <td>
               <?= $currentChild['usr_firstname'].' '.$currentChild['usr_lastname'] ?> 
            </td>
            <td>
                <a href="<?= $this->url('dailyReport_dailyReport_post'), array('date'=>$currentChild['drp_updated'], 'childId'=>$currentChild['chd_id'])?>">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-eye-open"></span> Daily report
                    </button>
                </a> 
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->stop('main_content') ?>


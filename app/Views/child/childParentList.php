<?php $this->layout('layoutSystem', ['title' => '']) ?>

<?php $this->start('main_content') ?>

<?php /*debug($childDailyReportList);?>
<?php   debug($children); */ ?>
<!--display-->
<h1 align="center"><strong>Liste des enfants</strong></h1><br><br>
<?php if (!empty($childDailyReportList)) : ?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Loisirs</th>
            <th>Commentaires</th>
            <th><span class="glyphicon glyphicon-folder-open"></span></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($childDailyReportList as $currentChild) : ?>
        <tr class="kms-dataset">
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
                <a href="<?= $this->url('daily_report_get_the_daily_report', array('date'=>$currentChild['drp_date'], 'childId'=>$currentChild['chd_id']))?>">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-eye-open"></span> Daily report
                    </button>
                </a> 
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else : ?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Loisirs</th>
            <th>Commentaires</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($children as $currentChild) : ?>
        <tr class="kms-dataset">
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
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif ;?>
<?php $this->stop('main_content') ?>


<?php $this->layout('layoutSystem', ['title' => '']) ?>

<?php $this->start('main_content') ?>

<!--display-->
<table class="table table-hover table-striped">
    <?php if(!empty($childList)): ?>
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
            <?php if ($w_user['usr_role'] === 'ROLE_PAR'): ?>
            <td>
                <a href="<?= $this->url('daily_report_get_the_daily_report', array('date'=>$currentChild['drp_date'], 'childId'=>$currentChild['chd_id']))?>">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-eye-open"></span> Daily report
                    </button>
                </a>
            </td>
            <?php else: ?>
            <td>
                <a href="<?= $this->url('dailyReport_dailyReportSingle_get', array('date'=>$currentChild['drp_date'], 'childId'=>$currentChild['chd_id']))?>">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-pencil"></span> Daily report
                    </button>
                </a>
            </td>
            <?php endif ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <?php else: ?>
    <tr><td style="text-align:center">Aucun enfant!</td></tr>
    <?php endif ?>
</table>
<?php $this->stop('main_content') ?>


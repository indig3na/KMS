<?php $this->layout('layoutSystem', ['title' => '']) ?>

<?php $this->start('main_content') ?>

<?php/* debug($childList);*/ ?>
<!--display-->
<table class="table table-hover table-striped">
    <caption><h1>Liste de la classe</h1></caption>
    <thead>
        <tr>
            <th></th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Hobby</th>
            <th>Remarques</th>
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
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->stop('main_content') ?>


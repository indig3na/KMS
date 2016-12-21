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
        </tr>
    </thead>
    <tbody>
        <?php foreach ($childList as $currentChild) : ?>
        <tr>
            <td>
               <?php if ($currentChild['chd_comments']=='M') : ?>
                <span class="glyphicon glyphicon-log-out"></span>
               <?php else : ?>
                <span class="glyphicon glyphicon-log-out"></span>
               <?php endif; ?> 
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
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->stop('main_content') ?>


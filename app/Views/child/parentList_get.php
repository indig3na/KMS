<?php $this->layout('layoutSystem', ['title' => '']) ?>

<?php $this->start('main_content') ?>

<?php /* debug($parentList);*/?>
<?php /*  debug($w_user); */?>
<!--display-->
<table class="table table-hover table-striped">
    <caption><h1>Liste des parents d'enfants</h1></caption>
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Contacts</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>Ville</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($parentList as $currentParent) : ?>
        <tr class="kms-dataset">
            <td>
               <?= $currentParent['usr_firstname'] ?> 
            </td>
            <td>
               <?= $currentParent['usr_lastname'] ?> 
            </td>
            <td>
               <?= $currentParent['usr_tel_mobile_1'].'<br>'.$currentParent['usr_tel_mobile_2'].'<br>'.$currentParent['usr_tel_domicile'].'<br>'.$currentParent['usr_tel_bureau'] ?> 
            </td>
             <td>
               <?= $currentParent['usr_email'] ?> 
            </td>
            <td>
               <?= $currentParent['usr_address'] ?> 
            </td>
            <td>
               <?= $currentParent['cit_name'] ?> 
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->stop('main_content') ?>


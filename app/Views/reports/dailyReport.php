<?php $this->layout('layoutsystem', ['title' => $title]) ?>

<?php $this->start('main_content') ?>


    <div style="" class="container">
        <h1 style="text-align: center;">Rapport journalier</h1>
        <div>
            <h4>Nom du Enfant:</h4>
            <select id="reportChild" data-placeholder="Sélectionnez l'enfant" class="drp form-control chosen-select">
                <?php foreach ($fkData['child_chd_id'] as $id => $value): ?>
                <option value="0"></option>
                    <option value="<?= $id ?>"><?= $value ?></option>
                <?php endforeach ?>
            </select>
            <div>
                <h4>Date:</h4>
                <p>Date: <input class="drp" type="text" id="datepicker" value="<?= date("Y-m-d") ?>"></p>
            </div>

        </div>
        

        <a id="home" style="display: none;" href=""> BACK TO Home </a>

    </div>



<?php $this->stop('main_content') ?>

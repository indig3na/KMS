<?php $this->layout('layoutsystem', ['title' => $title]) ?>

<?php $this->start('main_content') ?>



<div style="" class="container">
    <h1 style="text-align: center;">My Day today</h1>
    <div>
        <h4>Nom du Enfant:</h4>
        <select data-placeholder="Sélectionnez le enfant" class="form-control chosen-select">
            <?php foreach ($fkData['child_chd_id'] as $id => $value): ?>
                <option value="<?= $id ?>"><?= $value ?></option>
            <?php endforeach ?>
        </select>
        <div>
            <h4>Date:</h4>
            <p>Date: <input type="text" id="datepicker"></p>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    <div class="menu1">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <a href="" id="manger" class="btn btn-block btn-primary ">Manger</a>
            <a href="" id="fisio" class="btn btn-block btn-primary ">Wet / Poo</a>
            <a href="" id="sieste" class="btn btn-block btn-primary ">Sieste</a>
            <a href="" id="comments" class="btn btn-block btn-primary ">Comments</a>
        </div>
    </div>

    <div style="display: none;" id="optionManger">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <a href="" id="matin" class="btn btn-block btn-primary ">Guter matin</a>
            <a href="" id="midi" class="btn btn-block btn-primary ">Repas midi</a>
            <a href="" id="aprésmidi" class="btn btn-block btn-primary ">Guter aprés-midi</a>
        </div>
    </div>

    <div style="display: none;" id="quant">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <a href="" id="tBien" class="btn btn-block btn-primary ">Três bien</a>
            <a href="" id="bien" class="btn btn-block btn-primary ">Bien</a>
            <a href="" id="mal" class="btn btn-block btn-primary ">Mal</a>
        </div>
    </div>

    <div style="display: none;" id="optionFisio">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <a href="" id="wet" class="btn btn-block btn-primary ">J'ai fais Pipi</a>
            <a href="" id="midi" class="btn btn-block btn-primary ">J'ai fais Caca</a>
        </div>
    </div>

    <div style="display: none;" id="optionSieste">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <a href="" id="45m" class="btn btn-block btn-primary ">Sieste 45 min</a>
            <a href="" id="60m" class="btn btn-block btn-primary ">Sieste 60 min</a>
            <a href="" id="90m" class="btn btn-block btn-primary ">Sieste 90 min</a>
        </div>
    </div>

    <div style="display: none;" id="text">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <h4>Only fill if no option available on the Maim Menu</h4>
            <textarea rows="10" cols="151" placeholder="Comments here..."></textarea>
            <button id="submitComments" type="submit" class="btn btn-block btn-success">Submit</button>
        </div>
    </div>

    <a id="home" style="display: none;" href=""> BACK TO Home </a>

</div>


<?php $this->stop('main_content') ?>

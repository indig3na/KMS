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
            <p>Date: <input type="text" id="datepicker" value="<?= date("Y-m-d") ?>"></p>
        </div>
    </div>

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
            <a href="" id="matin" class="btn btn-block btn-primary ">Goûter matin</a>
            <a href="" id="midi" class="btn btn-block btn-primary ">Repas midi</a>
            <a href="" id="apresmidi" class="btn btn-block btn-primary ">Goûter aprés-midi</a>
        </div>
    </div>

    <div style="display: none;" id="quant">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <form method="post">
                <input type="hidden" id="mangerType" name="repas" value=""/>
                <input type="submit" id="tBien" name="quant" class="btn btn-block btn-primary "value="Très bien"/>
                <input type="submit" id="bien" name="quant" class="btn btn-block btn-primary "value="Bien"/>
                <input type="submit" id="mal" name="quant" class="btn btn-block btn-primary "value="Mal"/>
            </form>
        </div>
    </div>

    <div style="display: none;" id="optionFisio">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <form method="post">
            <input type="submit" id="wet" name="quelle" class="btn btn-block btn-primary "value="Pipi">
            <input type="submit" id="poo" name="quelle" class="btn btn-block btn-primary "value="Caca">
            </form>
        </div>
    </div>

    <div style="display: none;" id="optionSieste">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <form method="post">
            <input type="submit" id="45m" name="sieste" class="btn btn-block btn-primary "value="Sieste 45 min">
            <input type="submit" id="60m" name="sieste" class="btn btn-block btn-primary "value="Sieste 60 min">
            <input type="submit" id="90m" name="sieste" class="btn btn-block btn-primary "value="Sieste 90 min">
            </form>
        </div>
    </div>

    <div style="display: none;" id="text">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <h4>Only fill if no option available on the Main Menu</h4>
            <form method="post">
                <textarea name="comments" rows="10" cols="177"></textarea>
                <br><br>
                <input type="submit" class="btn btn-block btn-primary">
            </form>
        </div>
    </div>

    <a id="home" style="display: none;" href=""> BACK TO Home </a>

</div>


<?php $this->stop('main_content') ?>

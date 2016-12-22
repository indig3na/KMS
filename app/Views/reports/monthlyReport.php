<?php $this->layout('layoutSystem', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<div style="" class="container">
    <h1 style="text-align: center;">My Month</h1>
    <div>
        <h4>Nom du Enfant:</h4>
        <select data-placeholder="Sélectionnez le enfant" class="form-control chosen-select">
            <?php foreach ($fkData['child_chd_id'] as $id => $value): ?>
                <option value="<?= $id ?>"><?= $value ?></option>
            <?php endforeach ?>
        </select>
        <div>
           <p>Month: <input type="text" id="datepicker" value="<?= date("F") ?>"></p>
        </div>
    </div>
    <div class="menu3">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <a href="" id="devCog" class="btn btn-block btn-primary ">Development Cognitive</a>
            <div style="display: none;" id="text1">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <form method="post">
                        <textarea name="montRapport" rows="10" cols="177"></textarea>
                        <br><br>
                        <input type="submit" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
            <a href="" id="devMot" class="btn btn-block btn-primary ">Development Motor</a>
            <div style="display: none;" id="text2">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <form method="post">
                        <textarea name="montRapport" rows="10" cols="177"></textarea>
                        <br><br>
                        <input type="submit" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
            <a href="" id="motFin" class="btn btn-block btn-primary ">Motrocite Fine</a>
            <div style="display: none;" id="text3">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <form method="post">
                        <textarea name="montRapport" rows="10" cols="177"></textarea>
                        <br><br>
                        <input type="submit" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
            <a href="" id="devLin" class="btn btn-block btn-primary ">Development Linguistique</a>
            <div style="display: none;" id="text4">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <form method="post">
                        <textarea name="montRapport" rows="10" cols="177"></textarea>
                        <br><br>
                        <input type="submit" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
            <a href="" id="devEmo" class="btn btn-block btn-primary ">Development Emotionnel</a>
            <div style="display: none;" id="text5">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <form method="post">
                        <textarea name="montRapport" rows="10" cols="177"></textarea>
                        <br><br>
                        <input type="submit" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="display: none;" id="text">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <form method="post">
                <textarea name="montRapport" rows="10" cols="177"></textarea>
                <br><br>
                <input type="submit" class="btn btn-block btn-primary">
            </form>
        </div>
    </div>

    <a id="home" style="display: none;" href=""> BACK TO Home </a>

</div>

<?php $this->stop('main_content') ?>


<?php 
//hérite du fichier layout.php à la racine de app/templates/
// à partir du layout.php ns avons créé layoutBootstrap.php pour avoir notre propre template
$this->layout('layout',['title'=>''])
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
<div class="row">
    <div class="col-md-2 col-sm-2 col-xs-0"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
    <div class="page-header">
            <div class="panel panel-primary">
                    <div  class="panel-heading">
                            <h1>Réinitialisez le mot de passe !</h1>
                    </div>
            </div>

    </div>
    <?php if(sizeof($errorList > 0)) : ?>
    <?php foreach ($errorList as $currentErrorList) : ?>
        <button type="button" class="btn btn-danger btn-block">
            <?php echo $currentErrorList; ?>
        </button> <br><br>
    <?php endforeach; ?>
    <?php endif; ?>
            <form action="" method="post" role = "form">
                    <div class="form-group">
                            <fieldset>
                                    <input type="password" class="form-control" name="passwordLogin1" value="" placeholder="Your password" /><br />
                                    <input type="password" class="form-control" name="passwordLogin2" value="" placeholder="Re-enter your password" /><br />
                                    <input type="submit" class="btn btn-success btn-block" value="Sign up" />
                            </fieldset>
                    </div>
            </form>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-0"></div>
</div>

<?php 
//fin du bloc
$this->stop('main_content'); ?>

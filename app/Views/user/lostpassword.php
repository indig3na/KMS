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
                    <h1>Lost password</h1>
                </div>
            </div>
        </div>
        <?php  if(sizeof($successList > 0)) : ?>
        <?php foreach ($successList as $currentSuccessList) : ?>
            <button type="button" class="btn btn-success btn-block">
                <?php echo $currentSuccessList; ?>
            </button> <br><br>
        <?php endforeach; ?>
        <?php endif; ?>
        <form action="" method="post" role = "form">
            <div class="form-group">
            <fieldset>
                <input type="email" class="form-control" name="login" value="<?= $login ?>" placeholder="Email address" /><br />
                <input type="submit" class="btn btn-success btn-block" value="Change password" />
            </fieldset>
            </div>
        </form>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-0"></div>
</div>

<?php 
//fin du bloc
$this->stop('main_content'); ?>
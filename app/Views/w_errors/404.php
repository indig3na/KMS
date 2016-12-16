
<?php $this->layout('layout', ['title' => '404']) ?>

<?php $this->start('main_content'); ?>
<h2>404! Page Not Found</h2>
<div>
    <img src="<?= $this->assetUrl('img/404.jpg') ?>" height="800" width="1100" alt="" />
    <div>
        <a href="<?= $this->url('default_home') ?>"> BACK TO Home </a>
    </div>
</div>
<?php $this->stop('main_content'); ?>

<?php $this->layout('layout', ['title' => '403']) ?>

<?php $this->start('main_content'); ?>
<head>
    <style>
        body{
            background-color: black;
        }
    </style>
</head>
<h2>403! Forbidden!!</h2>
<div>
    <img src="<?= $this->assetUrl('img/403.jpg') ?>" height="800" width="1400" alt="" />
    <div>
        <a href="<?= $this->url('default_home') ?>"> BACK TO Home </a>
    </div>
</div>
<?php $this->stop('main_content'); ?>

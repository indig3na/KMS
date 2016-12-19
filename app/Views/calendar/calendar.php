<?php $this->layout('layoutSystem', ['title' => $title]) ?>

<?php $this->start('main_content') ?>


<!--calendar div-->
<section>
    <div id="myScheduler"></div>
</section>
<script src="http://cdn.alloyui.com/3.0.1/aui/aui-min.js"></script>
<?php $this->stop('main_content') ?>

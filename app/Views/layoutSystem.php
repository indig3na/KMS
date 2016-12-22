<?php// $_SESSION['user']['usr_role'] = 'ROLE_EDU' ?>
<?php// $_SESSION['user']['usr_role'] = 'ROLE_PAR' ?>
<?php// $_SESSION['user']['usr_role'] = 'ROLE_ADMIN' ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KMS</title>
    <meta name="description" content="school App">

    <!-- Latest compiled and minified CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/stylesystem.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/chosen.min.css') ?>">
</head>
<body>
<nav class="navbar navbar-default no-margin">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header fixed-brand">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
            <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
        </button>
        <a class="navbar-brand" href="#"><i class="fa fa-rocket fa-4"></i> School</a>
    </div><!-- navbar-header-->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active" ><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown user user-menu">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                    <span><?= $w_user['usr_firstname'].' '.$w_user['usr_lastname'] ?></span>
                    <!--span>Username <i class="caret"></i></span-->
                </a>
                <!--ul class="dropdown-menu">
                    <li class="user-body">
                        <div class="col-xs-4 text-center">
                            <a href="#accountSettings/profile">change Prof</a>
                        </div>
                        <!--div class="col-xs-4 text-center">
                            <a href="#accountSettings/email">changEmail</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#accountSettings/password">changepswd</a>
                        </div>
                    </li>
                </ul-->
            </li>
            <li class="dropdown user user-menu">
                <a href="<?= $this->url('users_logout')?>">
                    <i class="fa fa-fw fa-sign-out"></i>
                    <span>Lougout</span>
                </a>
            </li>
        </ul>
    </div><!-- end top navbar -->

</nav>
    
   <?php/* debug($w_user) */?>
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
            <li class="active">
                <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a>
                <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                    <li><a href="#">link1</a></li>
                    <li><a href="#">link2</a></li>
                </ul>
            </li>
            <?php  endif ; ?>
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="<?= $this->url('nursery_nursery_get') ?>"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-university   fa-stack-1x "></i></span>Établissement</a>
                </li>
            <?php  endif ; ?>
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="<?= $this->url('user_admin_get') ?>"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-folder-open   fa-stack-1x "></i></span>Administrateurs</a>
                </li>
            <?php  endif ; ?>    
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="<?= $this->url('classroom_classroom_get') ?>"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-sitemap   fa-stack-1x "></i></span>Salles de classe</a>
                </li>
            <?php  endif ; ?>
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="<?= $this->url('schoolYear_schoolyear_get') ?>"><span class="fa-stack fa-lg pull-left"><i class="fa  fa-calendar-o fa-stack-1x "></i></span>Années scolaires</a>
                </li>
            <?php  endif ; ?>
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="<?= $this->url('crud_program_get') ?>"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-book    fa-stack-1x "></i></span>Programmes</a>
                </li>
            <?php  endif ; ?>
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="<?= $this->url('crud_activity_get') ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-magic fa-stack-1x "></i></span>Activités</a>
                </li>
            <?php  endif ; ?>
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="<?= $this->url('user_edu_get') ?>"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-suitcase  fa-stack-1x "></i></span>Educateurs</a>
                </li>
            <?php  endif ; ?>
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="<?= $this->url('class_class_get') ?> "> <span class="fa-stack fa-lg pull-left"><i class="fa fa-list  fa-stack-1x "></i></span>Classes</a>
                </li>
            <?php  endif ; ?>
            
            <?php if (($w_user['usr_role'] == 'ROLE_ADMIN')): ?>
                <li>
                    <a href="<?= $this->url('child_child_get') ?>"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-user  fa-stack-1x "></i></span>Enfants</a>
                </li>
            <?php  endif ; ?>
            <?php if (($w_user['usr_role'] == 'ROLE_PAR')): ?>
                <li>
                    <a href="<?= $this->url('child_parent_child_get', ['userId'=>$w_user['usr_id']]) ?>"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-user  fa-stack-1x "></i></span>Les enfants</a>
                </li>
            <?php  endif ; ?>
            <?php if (($w_user['usr_role'] == 'ROLE_EDU')): ?>
                <li>
                    <a href="<?= $this->url('child_childList_get', ['userId'=>$w_user['usr_id']]) ?>"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-user  fa-stack-1x "></i></span>Liste des Enfants</a>
                </li>
            <?php  endif ; ?>
            <?php if (($w_user['usr_role'] == 'ROLE_ADMIN') || ($w_user['usr_role'] == 'ROLE_EDU')): ?>
                <li>
                    <a href="<?= $this->url('dailyReport_dailyReport_get', ['userId'=>$w_user['usr_id']]) ?>"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-user  fa-stack-1x "></i></span>Rapports journaliers</a>
                </li>
            <?php  endif ; ?>
            <?php if (($w_user['usr_role'] == 'ROLE_ADMIN')): ?>
                <li>
                    <a href="<?= $this->url('user_par_get') ?>"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-users   fa-stack-1x "></i></span>Parents</a>
                </li>
            <?php  endif ; ?>
            <?php if (($w_user['usr_role'] == 'ROLE_EDU')): ?>
                <li>
                    <a href="<?= $this->url('child_parentList_get', ['classeId'=>$w_user['class_cls_id']]) ?>"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-user  fa-stack-1x "></i></span>Contact des parents</a>
                </li>
            <?php  endif ; ?>

            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="<?= $this->url('crud_city_get') ?>"><span class="fa-stack fa-lg pull-left"><i class="fa  fa-building fa-stack-1x "></i></span>Villes</a>
                </li>
            <?php  endif ; ?>
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="<?= $this->url('calendar_calendar_get') ?> "> <span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar  fa-stack-1x "></i></span>Calendrier</a>
                </li>
            <?php  endif ; ?>
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="#"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-clock-o  fa-stack-1x "></i></span>Events</a>
                </li>
            <?php  endif ; ?>
            <?php if ($w_user['usr_role'] == 'ROLE_ADMIN'): ?>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Contact</a>
                </li>
            <?php  endif ; ?>
        </ul>
    </div><!-- end side bar -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid xyz">
            <div class="row">
                <div class="col-lg-12">
                    <section>
                        <?= $this->section('main_content') ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!--Chosen - select enhancer-->
<script src="<?= $this->assetUrl('js/chosen.jquery.min.js') ?>"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= $this->assetUrl('js/scriptsystem.js') ?>"></script>
</body>
</html>
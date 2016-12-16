<head>
    <meta charset="utf-8">
    <title>KMS</title>
    <meta name="description" content="Ahrach App">

    <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/chosen.min.css') ?>">
    <!-- Latest compiled and minified CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/libs/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/libs/bootstrap-theme.min.css">
</head>

<body data-spy="scroll" data-target="#my-navbar">
<div class="container">

    <section>
        <?= $this->section('main_content') ?>
    </section>

    <footer>
    </footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/libs/jquery.min.js"></script>
<!--Chosen - select enhancer-->
<script src="<?= $this->assetUrl('js/chosen.jquery.min.js') ?>"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="/libs/bootstrap.min.js"></script>

<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>
</body>
</html>
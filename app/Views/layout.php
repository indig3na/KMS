<head>
    <meta charset="utf-8">
    <title>KMS</title>
    <meta name="description" content="school App">
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/chosen.min.css') ?>">
    <!-- Latest compiled and minified CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</head>

<body data-spy="scroll" data-target="#my-navbar">


    <section>
        <?= $this->section('main_content') ?>
    </section>

    <footer>
    </footer>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--Chosen - select enhancer-->
<script src="<?= $this->assetUrl('js/chosen.jquery.min.js') ?>"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>
</body>
</html>
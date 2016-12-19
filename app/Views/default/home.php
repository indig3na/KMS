<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<!-- Navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="" class="navbar-brand">TamTam School</a>
        </div>
        <!-- Navbar Header-->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <div class="btn-group navbar-btn navbar-right">
                <a href="#login" class="btn btn-primary">Login</a>
                <a class="btn btn-primary" href="<?= $this->url('users_logout')?>">Logout</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#gallery">Gallery</a>
                <li><a href="#features">Features</a>
                <li><a href="#feedback">Feedback</a>
                <li><a href="#contact">ContactUs</a>
                <li><a href="#faq">Faq</a>
            </ul>
        </div>
    </div>
    <!-- End Container-->
</nav><!-- End navbar -->
<!-- Gallery -->
<div class="container" id="gallery">
    <section>
        <div class="page-header">
            <h2>Gallery.
                <small> Check out the Awesome Gallery</small>
            </h2>
        </div>

        <div class="carousel slide" id="screenshot-carousel" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#screenshot-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#screenshot-carousel" data-slide-to="1"></li>
                <li data-target="#screenshot-carousel" data-slide-to="2"></li>
                <li data-target="#screenshot-carousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= $this->assetUrl('img/highway.jpg') ?>" alt="Text of the image">

                    <div class="carousel-caption">
                        <h3>Highway heading</h3>

                        <p>This is the caption</p>
                    </div>
                </div>
                <div class="item">
                    <img src="<?= $this->assetUrl('img/river.jpg') ?>" alt="Text of the image">

                    <div class="carousel-caption">
                        <h3>River heading</h3>

                        <p>This is the caption</p>
                    </div>
                </div>
                <div class="item">
                    <img src="<?= $this->assetUrl('img/street.jpg') ?>" alt="Text of the image">

                    <div class="carousel-caption">
                        <h3>Street heading</h3>

                        <p>This is the caption</p>
                    </div>
                </div>
                <div class="item">
                    <img src="<?= $this->assetUrl('img/painting.jpg') ?>" alt="Text of the image">

                    <div class="carousel-caption">
                        <h3>Painting heading</h3>

                        <p>This is the caption</p>
                    </div>
                </div>

            </div>
            <!-- End Carousel inner -->
            <a href="#screenshot-carousel" class="left carousel-control" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a href="#screenshot-carousel" class="right carousel-control" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
        <!-- End Carousel -->

    </section>
</div>


<!-- jumbotron-->

<div class="jumbotron">
    <div class="container text-center">
        <h1>Welcome to tamtam nursery school</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>

        <div class="btn-group">
            <a href="#contact" class="btn btn-lg btn-primary">Contact us for more informations</a>
        </div>
    </div>
    <!-- End container -->
</div><!-- End jumbotron-->

<!-- call to action -->
<section id="login">
    <div class="well">
        <div class="container text-center">
            <h3>Login for more stuff</h3>

            <p>Enter your email and password</p>

            <form action="" class="form-inline" method="POST">
                <div class="form-group">
                    <label for="useremail">Login</label>
                    <input type="email" name="login" class="form-control" id="useremail" placeholder="Your email">
                </div>
                <div class="form-group">
                    <label for="userpassword">Password</label>
                    <input type="text" name="password" class="form-control" id="userpassword" placeholder="Enter your Password">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
                <hr>
            </form>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-0"></div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <a href="<?= $this->url('user_lostpassword')?>"><span class="glyphicon glyphicon-refresh"></span> Password oublié </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-0"></div>
            </div>
        </div>
        <!-- end Container-->

    </div>
    <!-- end well-->
</section><!-- Call to action -->

<!-- features -->
<div class="container" id="features">
    <section>
        <div class="page-header">
            <h2>Features.
                <small> Some of the coolest Features of this app.</small>
            </h2>
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-sm-8">
                <h3>This is the heading</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mauris tortor, eleifend sit amet
                    fringilla ac, tincidunt id massa. Proin et odio mattis, venenatis lacus vel, faucibus elit</p>
            </div>
            <div class="col-sm-4">
                <img src="<?= $this->assetUrl('img/imac.jpg') ?>" class="img-responsive" alt="image">
            </div>
        </div>
        <!-- End row -->
        <div class="row">
            <div class="col-sm-8">
                <h3>This is the heading</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mauris tortor, eleifend sit amet
                    fringilla ac, tincidunt id massa. Proin et odio mattis, venenatis lacus vel, faucibus elit</p>
            </div>
            <div class="col-sm-4">
                <img src="<?= $this->assetUrl('img/smartphone.jpg') ?>" class="img-responsive" alt="image">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <h3>This is the heading</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mauris tortor, eleifend sit amet
                    fringilla ac, tincidunt id massa. Proin et odio mattis, venenatis lacus vel, faucibus elit</p>
            </div>
            <div class="col-sm-4">
                <img src="<?= $this->assetUrl('img/user.jpg') ?>" class="img-responsive" alt="image">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-body">
                        <span class="glyphicon glyphicon-ok"></span>
                        <h4>This is the Heading</h4>

                        <p>Nam velit est, tempor vel posuere et, auctor a lectus. Aenean gravida, est accumsan dictum
                            rhoncus, lectus mi suscipit lacus, suscipit accumsan augue tellus vitae dolor. Morbi in
                            euismod dui</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-body">
                        <span class="glyphicon glyphicon-star"></span>
                        <h4>This is the Heading</h4>

                        <p>Nam velit est, tempor vel posuere et, auctor a lectus. Aenean gravida, est accumsan dictum
                            rhoncus, lectus mi suscipit lacus, suscipit accumsan augue tellus vitae dolor. Morbi in
                            euismod dui</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-body">
                        <span class="glyphicon glyphicon-play-circle"></span>
                        <h4>This is the Heading</h4>

                        <p>Nam velit est, tempor vel posuere et, auctor a lectus. Aenean gravida, est accumsan dictum
                            rhoncus, lectus mi suscipit lacus, suscipit accumsan augue tellus vitae dolor. Morbi in
                            euismod dui</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </section>
</div><!-- End Container -->


<!-- Feedback-->
<div class="container" id="feedback">
    <section>
        <div class="page-header">
            <h2>Feedback.
                <small> Check out the Awesome Feedback</small>
            </h2>
        </div>

        <div class="row">
            <div class="col-md-4">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi gravida quam ac ante rutrum, in
                        mollis ligula mattis. Integer nulla nisi, ullamcorper et posuere vel</p>
                    <footer>John doe</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi gravida quam ac ante rutrum, in
                        mollis ligula mattis. Integer nulla nisi, ullamcorper et posuere vel</p>
                    <footer>John doe</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi gravida quam ac ante rutrum, in
                        mollis ligula mattis. Integer nulla nisi, ullamcorper et posuere vel</p>
                    <footer>John doe</footer>
                </blockquote>
            </div>
        </div>
        <!-- End row -->
    </section>
</div><!--End Container-->


<!-- Contact -->

<div class="container" id="contact">
    <section>
        <div class="page-header">
            <h2>Contact Us.
                <small> Contact us for more.</small>
            </h2>
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div id="sent-form-msg" class="col-lg-8  col-lg-offset-2 success">
                <span>Form data sent. Thanks for your comments.We will update you within 24 hours. </span>
            </div>

            <div id="error" class="col-lg-8  col-lg-offset-2 warning">
            </div>

            <div id="message" class="col-lg-8  col-lg-offset-2 warning">
            </div>

            <div class="col-lg-6">
                <div id="address">
                    <p>Send us a message, or contact us from the address below</p>
                    <address>
                        <strong>TamTam Nursery School.</strong></br>
                        111, south case avenue </br>
                        Argonne - chicago</br>
                        P: +1 9999999999
                    </address>
                </div>
                <div id="myMap"></div>

            </div>

            <div class="col-lg-6" id="form">
                <form action="" class="form-horizontal" id="cform" method="POST">
                    <div class="form-group">
                        <label for="username">Name</label>

                        <input type="text" class="form-control" name="username" id="username"
                               placeholder="Enter you name">

                    </div>
                    <!-- End form group -->

                    <div class="form-group">
                        <label for="useremail">Email</label>

                        <input type="text" class="form-control" name="useremail" id="useremail"
                               placeholder="Enter you Email Address">

                    </div>
                    <!-- End form group -->

                    <div class="form-group">
                        <label for="userPhone">Your Phone Number</label>

                        <input type="number" class="form-control" name="userphone" id="userphone"
                               placeholder="Enter your phone number.">

                    </div>
                    <!-- End form group -->

                    <div class="form-group">
                        <label for="usermessage">Any Message</label>

                        <textarea name="usermessage" name="usermessage" id="usermessage" class="form-control"
                                  cols="20" rows="10" placeholder="Enter your Message"></textarea>

                    </div>
                    <!-- End form group -->

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary btn-md btn-block" id="submit">Submit</button>

                    </div>
                </form>
            </div>
        </div>
        <!-- End the row -->

    </section>
</div>

<!-- Faq -->

<div class="container" id="faq">
    <section>
        <div class="page-header">
            <h2>FAQ.
                <small> Engaging with consumers.</small>
            </h2>
        </div>
        <!-- End Page Header -->

        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a href="#collapse-1" data-toggle="collapse" data-parent="#accordion">
                            Question one?
                        </a>
                    </div>
                    <!-- End panel title -->
                    <div id="collapse-1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas non urna in
                            fringilla. Praesent consequat est at feugiat faucibus
                        </div>
                    </div>
                    <!-- End Panel collapse -->
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a href="#collapse-2" data-toggle="collapse" data-parent="#accordion">
                            Question Two?
                        </a>
                    </div>
                    <!-- End panel title -->
                    <div id="collapse-2" class="panel-collapse collapse">
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas non urna in
                            fringilla. Praesent consequat est at feugiat faucibus
                        </div>
                    </div>
                    <!-- End Panel collapse -->
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a href="#collapse-3" data-toggle="collapse" data-parent="#accordion">
                            Question Three?
                        </a>
                    </div>
                    <!-- End panel title -->
                    <div id="collapse-3" class="panel-collapse collapse">
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas non urna in
                            fringilla. Praesent consequat est at feugiat faucibus
                        </div>
                    </div>
                    <!-- End Panel collapse -->
                </div>
            </div>
        </div>
        <!-- End panel group -->

    </section>
</div><!-- End container -->

<!-- Footer -->

<footer>
    <hr>
    <div class="container text-center">
        <h3>Login for more stuff</h3>

        <p>Enter your email and password</p>

        <form action="" class="form-inline">
            <div class="form-group">
                <label for="useremail">Login</label>
                <input type="email" class="form-control" id="useremail" placeholder="Your email">
            </div>
            <div class="form-group">
                <label for="userpassword">Password</label>
                <input type="text" class="form-control" id="userpassword" placeholder="Enter your Password">
            </div>
            <button type="submit" class="btn btn-default">Login</button>
            <hr>
        </form>

        </form>

        <hr>
        <ul class="list-inline">
            <li><a href="http://www.twitter.com/Ahrach">Twitter</a></li>
            <li><a href="http://www.facebook.com/Ahrach">Facebook</a></li>
            <li><a href="http://www.youtube.com/ahrach">YouTube</a></li>
        </ul>

        <p>&copy; Copyright @ 2016</p>

    </div>
    <!-- end Container-->


</footer>
<!--Google Maps API-->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnycWatbGyK6ldFqErjFtko1yeMclNUOA&amp"></script>
<?php $this->stop('main_content') ?>

<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="">KMS</a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Home</a></li>
                        <li class="scroll"><a href="#features">Features</a></li>
                        <li class="scroll"><a href="#services">Services</a></li>
                        <li class="scroll"><a href="#portfolio">Tour & Gallery</a></li>
                        <li class="scroll"><a href="#about">About</a></li>
                        <li class="scroll"><a href="#meet-team">Team</a></li>
                        <li class="scroll"><a href="#get-in-touch">Contact</a></li>
                        <li class="scroll"><a href="#login">Login</a></li>
                        <li class="scroll"><a href="<?= $this->url('users_logout')?>">Logout</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
</header><!--/header-->

<section id="main-slider">
    <div class="owl-carousel">
        <div class="item" style="background-image: url(<?= $this->assetUrl('img/slider/bg1.jpg') ?>);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h2><span>KMS</span> Nursery and Schoolies Club</h2>
                                <p>The Nursery was formally a primary school that has been refurbished with young children in mind.There are 2 rooms suitably equipped to help your child make the transition from baby to infant.</p>
                                <a class="btn btn-primary btn-lg" href="#get-in-touch">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
        <div class="item" style="background-image: url(<?= $this->assetUrl('img/slider/bg2.jpg') ?>);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h2>A safe, stimulating, homely and happy environment</h2>
                                <p>The Next Generation has been created with the aim to provide individual care for each child in a safe, stimulating, homely and happy environment. We recognise the need to encourage your child to develop, to achieve their full potential </p>
                                <a class="btn btn-primary btn-lg" href="#get-in-touch">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
        <div class="item" style="background-image: url(<?= $this->assetUrl('img/slider/creche1.jpg') ?>);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h2>Furthering your child’s development</h2>
                                <p>During your child’s day at nursery, we will observe them incidentally in accordance with the new Early Years Foundation Stage framework </p>
                                <a class="btn btn-primary btn-lg" href="#get-in-touch">Contact Ue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->

        <div class="item" style="background-image: url(<?= $this->assetUrl('img/slider/creche2.jpg') ?>);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h2>Qualified staff</h2>
                                <p>All our staff are qualified to national standards or above. All hold Child & Infant first aid and basic food hygiene certificates. All staff hold enhanced police clearance disclosures and are trained in ‘Safeguarding’.  </p>
                                <a class="btn btn-primary btn-lg" href="#get-in-touch">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
        <div class="item" style="background-image: url(<?= $this->assetUrl('img/slider/creche3.jpg') ?>);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
        <div class="item" style="background-image: url(<?= $this->assetUrl('img/slider/creche4.jpg') ?>);">
            
        </div><!--/.item-->
        <div class="item" style="background-image: url(<?= $this->assetUrl('img/slider/creche6.jpg') ?>);">
            
        </div><!--/.item-->
        <div class="item" style="background-image: url(<?= $this->assetUrl('img/slider/creche7.jpg') ?>);">
            
        </div><!--/.item-->



    </div><!--/.owl-carousel-->
</section><!--/#main-slider-->

<section id="cta" class="wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h2>Nursery and Schoolies Club</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                </p>
            </div>
            <div class="col-sm-3 text-right">
                <a class="btn btn-primary btn-lg" href="#get-in-touch">Contact us</a>
            </div>
        </div>
    </div>
</section><!--/#cta-->

<section id="features">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">OUR FEATURES </h2>
            <p class="text-center wow fadeInDown">We have always wanted our nursery to feel as comfortable to your child as being at home and to provide individual care for each child in a safe, stimulating, happy environment.</p>
        </div>
        <div class="row">
            <div class="col-sm-6 wow fadeInLeft">
                <img class="img-responsive" src="<?= $this->assetUrl('img/nursery.jpg') ?>" alt="">
            </div>
            <div class="col-sm-6">
                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-pie-chart"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Home from home</h4>
                        <p>We have always wanted our nursery to feel as comfortable to your child as being at home and to provide individual care for each child in a safe, stimulating, happy environment.</p>
                    </div>
                </div>
                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Caring staff</h4>
                        <p>Our staff are carefully selected to work together as a team. Our Senior staff all hold minimum level 3. Some staff are qualified to level 4 & 5.</p>
                    </div>
                </div>

                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Doing the extra bit</h4>
                        <p>You may be surprised to find that we have a six weekly “hairdressing sessions” and other additional services to help make life that little bit easier.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section id="cta2">
    <div class="container">
        <div class="text-center">
            <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms"><span>KMS</span> IS A NURSERY AND SCHOOLIES CLUB</h2>
            <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">Mauris pretium auctor quam. Vestibulum et nunc id nisi fringilla <br />iaculis. Mauris pretium auctor quam.</p>
            <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms"><a class="btn btn-primary btn-lg" href="#">Contact Us</a></p>
            <img class="img-responsive wow fadeIn" src="<?= $this->assetUrl('img/cta2/cta2-img.png') ?>" alt="" data-wow-duration="300ms" data-wow-delay="300ms">
        </div>
    </div>
</section>

<section id="services" >
    <div class="container">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Our Services</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="row">
            <div class="features">

                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                    <div class="media service-box">
                        <div class="pull-left">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Hairdressing Service</h4>
                            <p> We know how difficult it can be for some young children and parents when it’s time for a haircut!We have a local hairdresser come to nursery every 6 to 8 weeks.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->

                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                    <div class="media service-box">
                        <div class="pull-left">
                            <i class="fa fa-pie-chart"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Trips & Outings</h4>
                            <p>Trips and outings range from a trip to ‘Farmer Ted’s’ to regular walks along the canal to feed the ducks, to the post box to post letters, to go and watch Wigan Athletic train just around the corner.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->

                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                    <div class="media service-box">
                        <div class="pull-left">
                            <i class="fa fa-language"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Nappies, Sun cream & Teeth cleaning etc</h4>
                            <p>Unlike most nurseries we provide nappies, baby wipes, nappy cream and baby food for the younger children. </p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->


            </div>
        </div><!--/.row-->    
    </div><!--/.container-->
</section><!--/#services-->

<section id="portfolio">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Our Actvivities</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="text-center">
            <ul class="portfolio-filter">
                <li><a class="active" href="#" data-filter="*">All Rooms</a></li>
                <li><a href="#" data-filter=".babyR">Baby Room</a></li>
                <li><a href="#" data-filter=".infantR">Infant Room</a></li>
                <li><a href="#" data-filter=".preS">Pre-School</a></li>
                <li><a href="#" data-filter=".school">Schoolies</a></li>
                <li><a href="#" data-filter=".ress">Resource Areas</a></li>
                <li><a href="#" data-filter=".outD">Outdoors</a></li>
                <li><a href="#" data-filter=".portfolio">Portfolio</a></li>
            </ul><!--/#portfolio-filter-->
        </div>

        <div class="portfolio-items">
            <div class="portfolio-item babyR">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/br1.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 1</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item babyR portfolio">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/br2.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 2</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item babyR">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/br3.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 3</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item infantR">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/ir1.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 4</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item infantR portfolio">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/ir2.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 5</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item infantR">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/ir3.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 6</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item preS portfolio">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/ps1.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 7</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item preS">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/ps2.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 8</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->
            <div class="portfolio-item preS">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/ps3.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 9</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->
            <div class="portfolio-item school">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/ps4.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 10</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->
            <div class="portfolio-item ress">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/res1.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 11</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->
            <div class="portfolio-item ress">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/res2.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 12</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->
            <div class="portfolio-item ress">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/res3.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 13</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->
            <div class="portfolio-item outD">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/odn1.png') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 14</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->
            <div class="portfolio-item outD">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/odn2.jpg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 15</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->
            <div class="portfolio-item outD">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?= $this->assetUrl('img/portfolio/odn3.jpeg') ?>" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 16</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="<?= $this->assetUrl('img/portfolio/full.jpg') ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->
        </div>
    </div><!--/.container-->
</section><!--/#portfolio-->

<section id="about">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">About Us</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="row">
            <div class="col-sm-6 wow fadeInLeft">
                <h3 class="column-title">Video Intro</h3>
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="//player.vimeo.com/video/58093852?title=0&amp;byline=0&amp;portrait=0&amp;color=e79b39" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-sm-6 wow fadeInRight">
                <h3 class="column-title">KMS Capability</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                <div class="row">
                    <div class="col-sm-6">
                        <ul class="nostyle">
                            <li><i class="fa fa-check-square"></i> Ipsum is simply dummy</li>
                            <li><i class="fa fa-check-square"></i> When an unknown</li>
                        </ul>
                    </div>

                    <div class="col-sm-6">
                        <ul class="nostyle">
                            <li><i class="fa fa-check-square"></i> The printing and typesetting</li>
                            <li><i class="fa fa-check-square"></i> Lorem Ipsum has been</li>
                        </ul>
                    </div>
                </div>

                <a class="btn btn-primary" href="#">Learn More</a>

            </div>
        </div>
    </div>
</section><!--/#about-->

<section id="work-process">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Our Methodology</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="row text-center">
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                    <div class="icon-circle">
                        <span>1</span>
                        <i class="fa fa-coffee fa-2x"></i>
                    </div>
                    <h3>Community</h3>
                </div>
            </div>
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                    <div class="icon-circle">
                        <span>2</span>
                        <i class="fa fa-bullhorn fa-2x"></i>
                    </div>
                    <h3>Care</h3>
                </div>
            </div>
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                    <div class="icon-circle">
                        <span>3</span>
                        <i class="fa fa-image fa-2x"></i>
                    </div>
                    <h3>Curiosity</h3>
                </div>
            </div>
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                    <div class="icon-circle">
                        <span>4</span>
                        <i class="fa fa-heart fa-2x"></i>
                    </div>
                    <h3>Coherence</h3>
                </div>
            </div>
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="400ms">
                    <div class="icon-circle">
                        <span>5</span>
                        <i class="fa fa-shopping-cart fa-2x"></i>
                    </div>
                    <h3>Creativity</h3>
                </div>
            </div>
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="500ms">
                    <div class="icon-circle">
                        <span>6</span>
                        <i class="fa fa-space-shuttle fa-2x"></i>
                    </div>
                    <h3>Challenge</h3>
                </div>
            </div>
        </div>
    </div>
</section><!--/#work-process-->

<section id="meet-team">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Meet The Team</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                    <div class="team-img">
                        <img class="img-responsive" src="images/team/01.jpg" alt="">
                    </div>
                    <div class="team-info">
                        <h3>Bin Burhan</h3>
                        <span>Director</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores blanditiis consectetur dignissimoso Blanditiis, error, molestiae</p>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                    <div class="team-img">
                        <img class="img-responsive" src="images/team/02.jpg" alt="">
                    </div>
                    <div class="team-info">
                        <h3>Jane Man</h3>
                        <span>Nursery Assistant</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores blanditiis consectetur dignissimoso Blanditiis, error, molestiae</p>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                    <div class="team-img">
                        <img class="img-responsive" src="images/team/03.jpg" alt="">
                    </div>
                    <div class="team-info">
                        <h3>Pahlwan</h3>
                        <span>Nurse Supervisor</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores blanditiis consectetur dignissimoso Blanditiis, error, molestiae.</p>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                    <div class="team-img">
                        <img class="img-responsive" src="images/team/04.jpg" alt="">
                    </div>
                    <div class="team-info">
                        <h3>Nora Nassir</h3>
                        <span>Pre-School Assistant</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores blanditiis consectetur dignissimoso Blanditiis, error, molestiae</p>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <div class="row">
            <div class="col-sm-4">
                <h3 class="column-title">Our Skills</h3>
                <strong>Social Perceptiveness</strong>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary" role="progressbar" data-width="85">85%</div>
                </div>
                <strong>Coordination - Adjusting actions</strong>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary" role="progressbar" data-width="80">80%</div>
                </div>
                <strong>Service Orientation</strong>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary" role="progressbar" data-width="90">90%</div>
                </div>
                <strong>Operation Monitoring </strong>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary" role="progressbar" data-width="80">80%</div>
                </div>
            </div>

            <div class="col-sm-4">
                <h3 class="column-title">Our History</h3>
                <div role="tabpanel">
                    <ul class="nav main-tab nav-justified" role="tablist">
                        <li role="presentation" >
                            <a href="#tab1" role="tab" data-toggle="tab" aria-controls="tab1" aria-expanded="true">2013</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab2" role="tab" data-toggle="tab" aria-controls="tab2" aria-expanded="false">2014</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab3" role="tab" data-toggle="tab" aria-controls="tab3" aria-expanded="false">2015</a>
                        </li>
                        <li role="presentation" class="active">
                            <a href="#tab4" role="tab" data-toggle="tab" aria-controls="tab4" aria-expanded="false">2016</a>
                        </li>
                    </ul>
                    <div id="tab-content" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab1" aria-labelledby="tab1">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters readable English.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab2" aria-labelledby="tab2">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters readable English.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab3" aria-labelledby="tab3">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters readable English.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab4" aria-labelledby="tab3">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters readable English.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <h3 class="column-title">Faqs</h3>
                <div class="panel-group" id="accordion" role="tablist" aria-KMSselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Enim eiusmod high life accusamus
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Nihil anim keffiyeh helvetica
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Vegan excepteur butcher vice lomo
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!--/#meet-team-->

<section id="animated-number">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Fun Facts</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="row text-center">
            <div class="col-sm-3 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                    <div class="animated-number" data-digit="2305" data-duration="1000"></div>
                    <strong>CUPS OF COFFEE CONSUMED</strong>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                    <div class="animated-number" data-digit="1231" data-duration="1000"></div>
                    <strong>CLIENT WORKED WITH</strong>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                    <div class="animated-number" data-digit="3025" data-duration="1000"></div>
                    <strong>PROJECT COMPLETED</strong>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                    <div class="animated-number" data-digit="1199" data-duration="1000"></div>
                    <strong>QUESTIONS ANSWERED</strong>
                </div>
            </div>
        </div>
    </div>
</section><!--/#animated-number-->


<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <div id="carousel-testimonial" class="carousel slide text-center" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <p><img class="img-circle img-thumbnail" src="<?= $this->assetUrl('img/testimonial/01.jpg') ?>" alt=""></p>
                            <h4>Louise S. Morgan</h4>
                            <small>Treatment, storage, and disposal (TSD) worker</small>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                        <div class="item">
                            <p><img class="img-circle img-thumbnail" src="<?= $this->assetUrl('img/testimonial/01.jpg') ?>" alt=""></p>
                            <h4>Louise S. Morgan</h4>
                            <small>Treatment, storage, and disposal (TSD) worker</small>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>

                    <!-- Controls -->
                    <div class="btns">
                        <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="prev">
                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="next">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#testimonial-->

<section id="login">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Login for more</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="container text-center">
            <p>Enter your email and password</p>

            <form action="<?= $this->url('user_login_post') ?>" class="form-inline" method="POST">
                <div class="form-group">
                    <label for="useremail">Login</label>
                    <input type="email" name="login" class="form-control" id="useremail" placeholder="Your email">
                </div>
                <div class="form-group">
                    <label for="userpassword">Password</label>
                    <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter your Password">
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

    </div><!--/.container-->
</section><!--/#portfolio-->

<section id="get-in-touch">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Get in Touch</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
    </div>
</section><!--/#get-in-touch-->


<section id="contact">
    <div id="google-map" style="height:650px" data-latitude="49.52273" data-longitude="5.888959999999997"></div>
    <div class="container-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <div class="contact-form">
                        <h3>Contact Info</h3>

                        <address>
                          <strong>Tamtam </strong><br>
                          4 rue du puits<br>
                          Differdange,Luxembourg<br>
                          <abbr title="Phone">P:</abbr> (00352) 456-7890
                        </address>
                        <form id="main-contact-form" name="contact-form" method="post" action="">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="8" placeholder="Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#bottom-->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; KMS
            </div>
            <div class="col-sm-6">
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->
<!--Google Maps API-->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnycWatbGyK6ldFqErjFtko1yeMclNUOA&amp"></script>

<?php $this->stop('main_content') ?>

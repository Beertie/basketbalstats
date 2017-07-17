<!DOCTYPE html>
<html>
<head>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php

        // Show title
        echo $this->fetch('title');

        ?>
    </title>


    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('/bower_components/datatables-responsive/css/responsive.dataTables.css') ?>
    <?= $this->Html->css('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') ?>
    <?= $this->Html->css('https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:400,400i,400,400i,600,600i,700,700i') ?>
    <?= $this->Html->css('style.css'); ?>
    <?= $this->Html->css('preloader.css'); ?>
    <?= $this->Html->css('content.css'); ?>
    <?= $this->Html->css('components.css'); ?>
    <?= $this->Html->css('custom.css'); ?>
    <?= $this->Html->css('/fonts/font-awesome/css/font-awesome.min.css'); ?>
    <?= $this->Html->css('/fonts/simple-line-icons/css/simple-line-icons.css'); ?>


    <?= $this->Html->script('/bower_components/datatables/media/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->script('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') ?>
    <?= $this->Html->script('https://code.jquery.com/jquery-2.2.4.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/lightbox.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/js.cookie.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/bootstrap.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/plugins/summernote.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/dropzone.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/bootstrap-editable.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/custom.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/comments.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('jquery-validation.js') ?>
    <?= $this->Html->script('sb-admin-2.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/core-min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/init.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/custom.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/plugins/jquery.canvasjs.min.js', ['block' => 'scriptBottom']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="template-basketball">

<div class="site-wrapper clearfix">
    <div class="site-overlay"></div>

    <!-- Header
    ================================================== -->

    <!-- Header Mobile -->
    <div class="header-mobile clearfix" id="header-mobile">
        <div class="header-mobile__logo">
            <a href="/"><img src="/images/logo.png" alt="Basketballstats" class="header-mobile__logo-img"></a>
        </div>
        <div class="header-mobile__inner">
            <a id="header-mobile__toggle" class="burger-menu-icon"><span class="burger-menu-icon__line"></span></a>
            <span class="header-mobile__search-icon" id="header-mobile__search-icon"></span>
        </div>
    </div>

    <!-- Header Desktop -->
    <header class="header">

        <!-- Header Top Bar -->
        <div class="header__top-bar clearfix">
            <div class="container">

                <!-- Account Navigation -->
                <ul class="nav-account">
                    <li class="nav-account__item"><a href="#" data-toggle="modal" data-target="#modal-login-register">Your Account</a></li>
                    <li class="nav-account__item nav-account__item--logout"><a href="#">Logout</a></li>
                </ul>
                <!-- Account Navigation / End -->

            </div>
        </div>
        <!-- Header Top Bar / End -->

        <!-- Header Secondary -->
        <div class="header__secondary">
            <div class="container">
                <!-- Header Search Form -->
                <div class="header-search-form">
                    <form action="#" id="mobile-search-form" class="search-form">
                        <input type="text" class="form-control header-mobile__search-control" value="" placeholder="Enter your seach here...">
                        <button type="submit" class="header-mobile__search-submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- Header Search Form / End -->
                <ul class="info-block info-block--header">
                    <li class="info-block__item info-block__item--contact-secondary">
                        <svg role="img" class="df-icon df-icon--basketball">
                            <use xlink:href="/images/icons-basket.svg#basketball"/>
                        </svg>
                        <h6 class="info-block__heading">Contact Us</h6>
                        <a class="info-block__link" href="mailto:info@basketbalstats.nl">info@basketbalstats.nl</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header Secondary / End -->

        <!-- Header Primary -->
        <div class="header__primary">
            <div class="container">
                <div class="header__primary-inner">
                    <!-- Header Logo -->
                    <div class="header-logo">
                        <a href="/"><img src="/images/logo.png" alt="basketbalstats" class="header-logo__img"></a>
                    </div>
                    <!-- Header Logo / End -->

                    <!-- Main Navigation -->
                    <nav class="main-nav clearfix">
                        <ul class="main-nav__list">
                            <li class="active"><a href="/">Home</a>
                                <ul class="main-nav__sub">
                                    <li class=""><a href="#">Games</a></li>
                                    <li class=""><a href="#">Uitslagen</a></li>
                                    <li class=""><a href="#">Teams</a></li>
                                    <li class=""><a href="#">History teams</a></li>
                                    <li class=""><a href="#">Agenda</a></li>
                                    <li class=""><a href="#">Coaches en Trainers</a></li>
                                    <li class=""><a href="#">Contact</a></li>
                                </ul>
                            </li>


                        <!--    <li class=""><a href="#">Info</a>
                                <div class="main-nav__megamenu clearfix">
                                    <ul class="col-lg-2 col-md-3 col-xs-12 main-nav__ul">
                                        <li class="main-nav__title">Informatie</li>
                                        <li><a href="/">Over River Trotters</a></li>
                                        <li><a href="/">Bestuur</a></li>
                                        <li><a href="/">Veilig sportklimaat</a></li>
                                        <li><a href="/">VOG-verklaring</a></li>
                                        <li><a href="/">Vertrouwenspersoon</a></li>
                                        <li><a href="/">Technische Commissie</a></li>
                                        <li><a href="/">Wedstrijdsecretaris en Taken</a></li>
                                        <li><a href="/">Bijzondere Leden</a></li>
                                        <li><a href="/">30-jarig bestaan</a></li>
                                        <li><a href="/">Historie Website</a></li>
                                    </ul>

                                    <ul class="col-lg-2 col-md-3 col-xs-12 main-nav__ul">
                                        <li class="main-nav__title">Features</li>
                                        <li><a href="/">Trainingsschema</a></li>
                                        <li><a href="/">Wedstrijdenplanning</a></li>
                                        <li><a href="/">Takenplanning</a></li>
                                        <li><a href="/">Tafelen</a></li>
                                        <li><a href="/">Routebeschrijvingen</a></li>
                                        <li><a href="/">Programma 2 weken</a></li>
                                        <li><a href="/">Programma volledig</a></li>
                                        <li><a href="/">Uitslagen 2 weken</a></li>
                                    </ul>

                                    <div class="col-lg-4 col-md-3 col-xs-12">

                                        <div class="posts posts--simple-list posts--simple-list--lg">
                                            <div class="posts__item posts__item--category-1">
                                                <div class="posts__inner">
                                                    <div class="posts__cat">
                                                        <span class="label posts__cat-label">The Team</span>
                                                    </div>
                                                    <h6 class="posts__title"><a href="#">The team is starting a new power breakfast regimen</a></h6>
                                                    <time datetime="2017-08-23" class="posts__date">August 23rd, 2017</time>
                                                    <div class="posts__excerpt">
                                                        Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </div>
                                                </div>
                                                <div class="posts__footer card__footer">
                                                    <div class="post-author">
                                                        <figure class="post-author__avatar">
                                                            <img src="/images/samples/avatar-1.jpg" alt="Post Author Avatar">
                                                        </figure>
                                                        <div class="post-author__info">
                                                            <h4 class="post-author__name">James Spiegel</h4>
                                                        </div>
                                                    </div>
                                                    <ul class="post__meta meta">
                                                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 530</a></li>
                                                        <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 col-md-3 col-xs-12">
                                        <ul class="posts posts--simple-list">
                                            <li class="posts__item posts__item--category-1">
                                                <figure class="posts__thumb">
                                                    <a href="#"><img src="/images/samples/post-img3-xs.jpg" alt=""></a>
                                                </figure>
                                                <div class="posts__inner">
                                                    <div class="posts__cat">
                                                        <span class="label posts__cat-label">The Team</span>
                                                    </div>
                                                    <h6 class="posts__title"><a href="#">The new eco friendly stadium won a Leafy Award in 2016</a></h6>
                                                    <time datetime="2016-08-21" class="posts__date">August 21st, 2016</time>
                                                </div>
                                            </li>
                                            <li class="posts__item posts__item--category-2">
                                                <figure class="posts__thumb">
                                                    <a href="#"><img src="/images/samples/post-img1-xs.jpg" alt=""></a>
                                                </figure>
                                                <div class="posts__inner">
                                                    <div class="posts__cat">
                                                        <span class="label posts__cat-label">Injuries</span>
                                                    </div>
                                                    <h6 class="posts__title"><a href="#">Mark Johnson has a Tibia Fracture and is gonna be out</a></h6>
                                                    <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                                                </div>
                                            </li>
                                            <li class="posts__item posts__item--category-1">
                                                <figure class="posts__thumb">
                                                    <a href="#"><img src="/images/samples/post-img4-xs.jpg" alt=""></a>
                                                </figure>
                                                <div class="posts__inner">
                                                    <div class="posts__cat">
                                                        <span class="label posts__cat-label">The Team</span>
                                                    </div>
                                                    <h6 class="posts__title"><a href="#">The team is starting a new power breakfast regimen</a></h6>
                                                    <time datetime="2016-08-21" class="posts__date">August 21st, 2016</time>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>-->


                            <li class=""><a href="/rivertrotters/teams">De Teams</a>

                                <ul class="main-nav__sub">
                                    <?php
                                    foreach ($menu as $menuItem){
                                        echo '<li><a href="#">'.$menuItem->name.'</a>';
                                        echo '<ul class="main-nav__sub-2">';
                                        foreach ($menuItem->teams as $teamMenu){
                                            echo '<li><a href="/teams/index/'.$teamMenu->id.'">'.$teamMenu->name.'</a></li>';
                                        }
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                    ?>


                                </ul>
                            </li>
                            <li class=""><a href="#">History teams</a>

                                <ul class="main-nav__sub">
                                    <?php
                                    foreach ($history as $hisMenuItem){
                                        echo '<li><a href="#">'.$hisMenuItem->name.'</a>';
                                        echo '<ul class="main-nav__sub-2">';
                                        foreach ($hisMenuItem->history_teams as $hisTeamMenu){
                                            echo '<li><a href="/historyTeams/index/'.$hisTeamMenu->id.'">'.$hisTeamMenu->name.'</a></li>';
                                        }
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                    ?>


                                </ul>
                            </li>
                        </ul>

                        <!-- Social Links -->
                        <ul class="social-links social-links--inline social-links--main-nav">
                            <li class="social-links__item">
                                <a href="https://www.facebook.com/basketbalstats.basketbal/?fref=ts" class="social-links__link" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="social-links__item">
                                <a href="https://twitter.com/basketbalstats" class="social-links__link" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                        </ul>
                        <!-- Social Links / End -->

                        <!-- Pushy Panel Toggle -->
                        <a href="#" class="pushy-panel__toggle">
                            <span class="pushy-panel__line"></span>
                        </a>
                        <!-- Pushy Panel Toggle / Eng -->
                    </nav>
                    <!-- Main Navigation / End -->
                </div>
            </div>
        </div>
        <!-- Header Primary / End -->

    </header>
    <!-- Header / End -->

    <!-- Content
    ================================================== -->
    <div class="site-content">
        <div class="container">

            <div class="row">
                <?= $this->Flash->render() ?>

                <?= $this->fetch('content') ?>
            </div>

        </div>
    </div>

    <!-- Content / End -->

    <!-- Footer
    ================================================== -->
    <footer id="footer" class="footer">

        <!-- Footer Widgets -->
        <div class="footer-widgets">
            <div class="footer-widgets__inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <div class="footer-col-inner">

                                <!-- Footer Logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="/images/logo.png" alt="basketbalstats" class="footer-logo__img"></a>
                                </div>
                                <!-- Footer Logo / End -->

                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <div class="footer-col-inner">
                                <!-- Widget: Contact Info -->
                                <div class="widget widget--footer widget-contact-info">
                                    <h4 class="widget__title">Contact Info</h4>
                                    <div class="widget__content">
                                        <div class="widget-contact-info__desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                                        </div>
                                        <div class="widget-contact-info__body info-block">
                                            <div class="info-block__item">
                                                <svg role="img" class="df-icon df-icon--basketball">
                                                    <use xlink:href="/images/icons-basket.svg#basketball"/>
                                                </svg>
                                                <h6 class="info-block__heading">Contact Us</h6>
                                                <a class="info-block__link" href="mailto:info@basketbalstats.nl">info@basketbalstats.nl</a>
                                            </div>
                                            <div class="info-block__item info-block__item--nopadding">
                                                <ul class="social-links">
                                                    <li class="social-links__item">
                                                        <a href="#" class="social-links__link"><i class="fa fa-facebook"></i> Facebook</a>
                                                    </li>
                                                    <li class="social-links__item">
                                                        <a href="#" class="social-links__link"><i class="fa fa-twitter"></i> Twitter</a>
                                                    </li>
                                                    <li class="social-links__item">
                                                        <a href="#" class="social-links__link"><i class="fa fa-google-plus"></i> Google+</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Widget: Contact Info / End -->
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <div class="footer-col-inner">
                                <!-- Widget: Popular Posts / End -->
                                <div class="widget widget--footer widget-popular-posts">
                                    <h4 class="widget__title">Popular News</h4>
                                    <div class="widget__content">
                                        <ul class="posts posts--simple-list">
                                            <li class="posts__item posts__item--category-2">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label">Injuries</span>
                                                </div>
                                                <h6 class="posts__title"><a href="#">Mark Johnson has a Tibia Fracture and is gonna be out</a></h6>
                                                <time datetime="2016-08-23" class="posts__date">August 23rd, 2016</time>
                                            </li>
                                            <li class="posts__item posts__item--category-1">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label">The Team</span>
                                                </div>
                                                <h6 class="posts__title"><a href="#">Jay Rorks is only 24 points away from breaking the record</a></h6>
                                                <time datetime="2016-08-22" class="posts__date">August 22nd, 2016</time>
                                            </li>
                                            <li class="posts__item posts__item--category-1">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label">The Team</span>
                                                </div>
                                                <h6 class="posts__title"><a href="#">The new eco friendly stadium won a Leafy Award in 2016</a></h6>
                                                <time datetime="2016-08-21" class="posts__date">August 21st, 2016</time>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Widget: Popular Posts / End -->
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <div class="footer-col-inner">

                                <!-- Widget: Instagram / End -->
                                <div class="widget widget--footer widget-instagram">
                                    <h4 class="widget__title">Instagram Widget</h4>
                                    <div class="widget__content">
                                        <ul class="widget-instagram__list">
                                            <li class="widget-instagram__item">
                                                <a href="#" class="widget-instagram__link-wrapper">
                            <span class="widget-instagram__plus-sign">
                              <img src="/images/samples/img-instagram-1.jpg" class="widget-instagram__img" alt="">
                            </span>
                                                </a>
                                            </li>
                                            <li class="widget-instagram__item">
                                                <a href="#" class="widget-instagram__link-wrapper">
                            <span class="widget-instagram__plus-sign">
                              <img src="/images/samples/img-instagram-2.jpg" class="widget-instagram__img" alt="">
                            </span>
                                                </a>
                                            </li>
                                            <li class="widget-instagram__item">
                                                <a href="#" class="widget-instagram__link-wrapper">
                            <span class="widget-instagram__plus-sign">
                              <img src="/images/samples/img-instagram-3.jpg" class="widget-instagram__img" alt="">
                            </span>
                                                </a>
                                            </li>
                                            <li class="widget-instagram__item">
                                                <a href="#" class="widget-instagram__link-wrapper">
                            <span class="widget-instagram__plus-sign">
                              <img src="/images/samples/img-instagram-4.jpg" class="widget-instagram__img" alt="">
                            </span>
                                                </a>
                                            </li>
                                            <li class="widget-instagram__item">
                                                <a href="#" class="widget-instagram__link-wrapper">
                            <span class="widget-instagram__plus-sign">
                              <img src="/images/samples/img-instagram-5.jpg" class="widget-instagram__img" alt="">
                            </span>
                                                </a>
                                            </li>
                                            <li class="widget-instagram__item">
                                                <a href="#" class="widget-instagram__link-wrapper">
                            <span class="widget-instagram__plus-sign">
                              <img src="/images/samples/img-instagram-6.jpg" class="widget-instagram__img" alt="">
                            </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <a href="#" class="btn btn-sm btn-instagram btn-icon-right">Follow Our Instagram <i class="icon-arrow-right"></i></a>
                                    </div>
                                </div>
                                <!-- Widget: Instagram / End -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Widgets / End -->

        <!-- Footer Secondary -->
        <div class="footer-secondary footer-secondary--has-decor">
            <div class="container">
                <div class="footer-secondary__inner">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <ul class="footer-nav">
                                <li class="footer-nav__item"><a href="#">Home</a></li>
                                <li class="footer-nav__item"><a href="#">Features</a></li>
                                <li class="footer-nav__item"><a href="#">Statistics</a></li>
                                <li class="footer-nav__item"><a href="#">The Team</a></li>
                                <li class="footer-nav__item"><a href="#">News</a></li>
                                <li class="footer-nav__item"><a href="#">Shop</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Secondary / End -->
    </footer>
    <!-- Footer / End -->


    <!-- Login/Register Modal -->
    <div class="modal fade" id="modal-login-register" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal--login" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="modal-account-holder">
                        <div class="modal-account__item">

                            <!-- Register Form -->
                            <form action="#" class="modal-form">
                                <h5>Register Now!</h5>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter your email address...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Enter your password...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Repeat your password...">
                                </div>
                                <div class="form-group form-group--submit">
                                    <a href="shop-account.html" class="btn btn-primary btn-block">Create Your Account</a>
                                </div>
                                <div class="modal-form--note">You’ll receive a confirmation email in your inbox with a link to activate your account. </div>
                            </form>
                            <!-- Register Form / End -->

                        </div>
                        <div class="modal-account__item">

                            <!-- Login Form -->
                            <form action="#" class="modal-form">
                                <h5>Login to your account</h5>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter your email address...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Enter your password...">
                                </div>
                                <div class="form-group form-group--pass-reminder">
                                    <label class="checkbox checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1" checked> Remember Me
                                        <span class="checkbox-indicator"></span>
                                    </label>
                                    <a href="#">Forgot your password?</a>
                                </div>
                                <div class="form-group form-group--submit">
                                    <a href="shop-account.html" class="btn btn-primary-inverse btn-block">Enter to your account</a>
                                </div>
                                <div class="modal-form--social">
                                    <h6>or Login with your social profile:</h6>
                                    <ul class="social-links social-links--btn text-center">
                                        <li class="social-links__item">
                                            <a href="#" class="social-links__link social-links__link--lg social-links__link--fb"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="social-links__item">
                                            <a href="#" class="social-links__link social-links__link--lg social-links__link--twitter"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="social-links__item">
                                            <a href="#" class="social-links__link social-links__link--lg social-links__link--gplus"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                            <!-- Login Form / End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login/Register Modal / End -->


</div>

<?= $this->fetch('scriptBottom'); ?>
</body>

</html>

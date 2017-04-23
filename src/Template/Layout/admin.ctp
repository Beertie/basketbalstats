
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


    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css') ?>
    <?= $this->Html->css('/backend/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/backend/css/comments.css'); ?>
    <?= $this->Html->css('/backend/css/sb-admin-2.css') ?>
    <?= $this->Html->css('/backend/css/metismenu.min.css') ?>
    <?= $this->Html->css('/bower_components/datatables-responsive/css/responsive.dataTables.css') ?>
    <?= $this->Html->css('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') ?>
    <?= $this->Html->css('/backend/css/lightbox.css') ?>
    <?= $this->Html->css('https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:400,400i,400,400i,600,600i,700,700i') ?>
    <?= $this->Html->css('/backend/css/style.css'); ?>

    <?= $this->Html->css('/backend/css/plugins/summernote.css') ?>

    <?= $this->Html->script('/backend/bower_components/datatables/media/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->script('/backend/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') ?>
    <?= $this->Html->script('https://code.jquery.com/jquery-2.2.4.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/backend/js/lightbox.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/backend/js/js.cookie.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/backend/js/bootstrap.min.js', ['block' => 'scriptBottom']) ?>

    <?= $this->Html->script('/backend/js/plugins/summernote.min.js', ['block' => 'scriptBottom']) ?>


    <?= $this->Html->script('/backend/js/dropzone.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/backend/js/bootstrap-editable.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/backend/js/custom.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/backend/js/comments.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/backend/js/jquery-validation.js') ?>
    <?= $this->Html->script('/backend/js/sb-admin-2.js', ['block' => 'scriptBottom']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="default">
<div id="wrapper">


    <nav class="navbar navbar-default navbar-static-top" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li class="teams">
                        <a href="<?php echo $this->Url->build(['controller' => 'teams', 'action' => 'index']); ?>"><i class="fa fa-money fa-fw"></i><span><?php echo __('Teams'); ?></span></a>
                    </li>
                    <li class="hytory">
                        <a href="<?php echo $this->Url->build(['controller' => 'players', 'action' => 'index']); ?>"><i class="fa fa-mobile-phone fa-fw"></i><span><?php echo __('History teams'); ?></span></a>
                    </li>
                    <li class="years">
                        <a href="<?php echo $this->Url->build(['controller' => 'players', 'action' => 'index']); ?>"><i class="fa fa-mobile-phone fa-fw"></i><span><?php echo __('Years'); ?></span></a>
                    </li>
                    <li class="players">
                        <a href="<?php echo $this->Url->build(['controller' => 'players', 'action' => 'index']); ?>"><i class="fa fa-mobile-phone fa-fw"></i><span><?php echo __('Players'); ?></span></a>
                    </li>
                    <li class="News">
                        <a href="<?php echo $this->Url->build(['controller' => 'news', 'action' => 'index']); ?>"><i class="fa fa-newspaper-o fa-fw"></i><span><?php echo __('News'); ?></span></a>
                    </li>
                </ul>

                <ul class="nav toggle">
                    <li class="toggle-menu"><a href=""><i class="fa fa-chevron-right fa-fw"></i><i class="fa fa-chevron-left fa-fw"></i><span> Close Menu</span></a></li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div class="site-content">
        <div class="container">

            <div class="row">
                <?= $this->Flash->render() ?>

                <?= $this->fetch('content') ?>
            </div>

        </div>
    </div>

    <?= $this->fetch('scriptBottom'); ?>

</body>
</html>

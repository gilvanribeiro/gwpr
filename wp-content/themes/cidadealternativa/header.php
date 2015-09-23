<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CIDADE ALTERIDADE</title>

    <!-- Bootstrap -->
    <link href="<?php echo bloginfo('template_directory') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory') ?>/css/util-menu.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory') ?>/css/navbar.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory') ?>/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo bloginfo('template_directory') ?>/img/image2.png"/>
    <?php wp_head(); ?>
</head>
<body>
<div class="container">
    <div class=" container-header">
        <ol class="hmenu pull-right">
            <li><a href="https://webmail.cidadeealteridade.com.br/">e-mail</a></li>
            <li><a href="#">forum</a></li>
        </ol>
    </div>
</div>

<div class="container" id="bglogo">
    <img src="<?php echo bloginfo('template_directory') ?>/img/banner.png" class="banner">
</div>
<div class="container">
    <nav class="navbar navbar-default menu-top" style="border-radius:0">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle collapsed " data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>">Pagina Inicial</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <?php wp_list_pages('sort_column=menu_order&exclude=2&title_li'); ?>
        </ul>
    </div>-->
        <?php
        wp_nav_menu(array(
                'menu' => 'primary',
                'theme_location' => 'primary',
                'depth' => 20,
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'bs-example-navbar-collapse-1',
                'menu_class' => 'nav navbar-nav',
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                'echo' => true,
                'walker' => new wp_bootstrap_navwalker())
        );
        ?>
    </nav>
</div>
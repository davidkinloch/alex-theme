<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url')?>/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url')?>/favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url')?>/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url')?>/favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url')?>/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url')?>/favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url')?>/favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url')?>/favicons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url')?>/favicons/apple-touch-icon-180x180.png">
        <link rel="shortcut icon" href="<?php bloginfo('template_url')?>/favicons/favicon.ico">

        <?php get_stylesheet(); ?>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/main.css" />
        <script src="<?php bloginfo('template_url')?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <?php wp_head(); ?> 
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="header-container" id="core-nav">
            <header class="wrapper clearfix site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
                <a href="/" class="logo">Alexanders College | Suffolk England</a>
                    
                 <nav class="site-navigation nav-primary" >
                    <a href="#" class="nav-toggle" aria-hidden="false">Menu</a>  
                    <?php $defaults = array( 'theme_location'  => 'main-nav', 'container' => '','menu_class'      => 'site-nav-menu', );
                        wp_nav_menu( $defaults );
                    ?>
                    
                </nav><!--.site-navigation -->
                <nav class="site-navigation nav-social" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <a href="#" class="social-nav-toggle" aria-hidden="false">Share</a>
                    <ul class="social-nav-menu">
                        <li class="facebook"><a href="https://www.facebook.com/pages/Alexanders-College-Bawdsey/1601083530113315" target="_blank">Facebook</a></li>
                        <li class="twitter"><a href="https://twitter.com/Alexanders_Coll" target="_blank">Twitter</a></li>
                        <li class="login desktop"><a href="/wordpress/wp-admin" target="_blank">Login</a></li></li>
                        <li class="contact desktop"><a href="?page_id=321">Contact</a></li></li>
                    </ul>
                </nav>
            </header>
        </div><!-- end of header container -->
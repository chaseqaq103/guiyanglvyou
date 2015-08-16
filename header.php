<?php 
    include 'languages/properties.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo LanguageProperty::getText('title'); ?></title>
    <link rel="shortcut icon" href="<?php bloginfo('template_url');?>/assets/img/logo.png" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/assets/css/jquery.dropdown.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/assets/css/style.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header">
        <img src="<?php bloginfo('template_url');?>/assets/img/flag.png" />
        <?php wp_nav_menu( array( 'menu' => 'navmenu', 'depth' => 1) ); ?>
        <div class="header-form">
            <div class="language">
                <button value="Dropdown" data-jq-dropdown="#jq-dropdown-1"><?php echo $_COOKIE['language'] == 'en' ? 'EN' : '中文'; ?>&nbsp;&nbsp;<i class="fa fa-angle-down"></i></button>
                <div id="jq-dropdown-1" class="jq-dropdown jq-dropdown-tip">
                    <ul class="jq-dropdown-menu">
                        <li><a href="<?php echo home_url(add_query_arg(array('language'=>'en'),$wp->request));?>">EN</a></li>
                        <li><a href="<?php echo home_url(add_query_arg(array('language'=>'zh'),$wp->request));?>">中文</a></li>
                    </ul>
                </div>
            </div>
            <?php get_search_form(); ?>
        </div>
    </div>
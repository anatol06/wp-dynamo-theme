<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php bloginfo('name'); ?>
            |
            <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

        <?php if(get_theme_mod('preset', 'dark') == 'dark') :  ?>
            <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-darkness/jquery-ui.min.css">
        <?php else : ?> 
            <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <?php endif; ?>
        <?php wp_head(); ?>        
        
        <?php if(get_theme_mod('preset', 'dark') == 'dark') :  ?>
        <style>
            body { background: #232323; color: #fff; }
            .main-nav { background: #333; color: #fff; }
            .main-nav a { color: #fff;}
            .caption { background-color: #333; color: #dddddd; }
            .post-wrap  { border: 1px solid #666; }
            .button { background-color: #333; color: #fff; border: 1px solid #232323; }
            .post { border-bottom: 1px solid #333; }
            footer { background: #333; }
            input[type="text"] { border: none; }
            .meta { border-bottom: 3px double #444; color: #bbbbbb; }
            .sidebar-widget li { border-bottom: 1px solid #666; }
        </style>
        <?php else : ?>        
        <style>
            body { background: #fff; color: #333; }
            .main-nav { background: #f4f4f4; color: #333; }
            .main-nav a { color: #333;}
            .caption { background-color: #f4f4f4; color: #333;}
            .post-wrap  { border: 1px solid #ccc; }
            .button { background-color: #f4f4f4; color: #333; border: 1px solid #ccc; }
            .post { border-bottom: 1px solid #ccc; }
            footer { background: #f4f4f4; color: #666;}
            input[type="text"] { border: 1px solid #ddd; }
            .meta { border-bottom: 3px double #ddd; color: #999; }
            .sidebar-widget li { border-bottom: 1px solid #ddd; }
        </style>    
        <?php endif; ?>

        <style>
            a { color:<?php echo get_theme_mod('color', '#f9992b'); ?> }
            .main-nav a:hover { background: <?php echo get_theme_mod('color', '#f9992b'); ?> }
            .button:hover { background-color: <?php echo get_theme_mod('color', '#f9992b'); ?> }
            .bar { background-color: <?php echo get_theme_mod('color', '#f9992b'); ?> }
            .current_page_item a { background-color: <?php echo get_theme_mod('color', '#f9992b'); ?> }

            .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
                border-color:<?php echo get_theme_mod('color','#f9992b'); ?>;
                background:<?php echo get_theme_mod('color','#f9992b'); ?>;
            }
        </style>
    </head>

    <body <?php body_class(); ?>>
        <header>
            <div class="wrap wider">
                <div class="grid">
                    <div class="unit half">
                        <h1 class="logo"><?php bloginfo('name'); ?></h1>
                        <p class="tagline"><?php bloginfo('description');  ?></p>
                    </div>
                    <div class="unit half">
                        <div class="header_r">
                            <form class="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="text" name="s" placeholder="Search...">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <nav class="main-nav">
            <div class="wrap wider">
                <div class="grid">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary'
                    )); ?>
                </div>
            </div>
        </nav>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="author" content="http://web.ra-kolibri.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/wp-content/themes/finservice/favicon.ico" type="image/x-icon">
    <?if (is_category()): ?>
        <title><?single_cat_title();?></title>
    <?elseif(is_page()): ?>
        <title><?the_title();?></title>
    <?endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <div class="callback" data-toggle="modal" data-target="#myModal"></div>
    <header class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="/"><div class="logo" style="background: url(/wp-content/themes/finservice/img/logo.png) no-repeat";></div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="contact_info">
                    <div class="phones">
                        <p class="primary_phone"><a href="tel:8343594426">+7 (343) <strong> 359-44-26</strong></p></a>
                        <p class="primary_phone"><a href="tel:83433594233">+7 (343) <strong> 359-42-33</strong></p></a>
                        <p class="primary_phone"><a href="tel:83433718501">+7 (343) <strong> 371-85-01</strong></p></a>
                        <div class="phones_hide">
                            <p class="secondary_phone"><a href="tel:+7 (343) 359-44-26">+7 (343) <strong> 359-44-26</strong></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 hamburger">
                <i class="fa fa-bars fa-4x" aria-hidden="true" id="nav"></i>
            </div>
        </div>
    </header>
    <?$args = array(
        'child_of'           => 0,
        'exclude'            => '1,4,27,28,29',
        'hierarchical'       => true,
        'echo'               => 1,
        'title_li'           => '',
        'depth'              => 0,
        'current_category'   => 1,
        'hide_empty'          => 0,
    );?>
    <nav id="head_menu" class="menu-header-container">
        <ul id="menu-header" class="container">
            <li ><a href="/o-kompanii/" class="hvr-underline-reveal">О компании</a></li>
            <?php wp_list_categories( $args ); ?>
            <li><a href="/colored/" class="hvr-underline-reveal">ОКРАШЕННЫЕ ОБЪЕКТЫ</a></li>
            <li><a href="/kontakty/" class="hvr-underline-reveal">Контакты</a></li>
        </ul>
    </nav>
                
           
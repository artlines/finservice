<? get_header();?>
<?php
$args =[
    'numberposts' => -1,
    'category' => "11,47",
    'orderby'  => 'title ',
    'order' => 'ASC'
];

$posts = get_posts($args);
?>
<main class="container-big">
    <div class="row">
        <div class="col-md-3 left_menu">
            <? get_template_part('left-sidebar'); ?>
        </div>

        <div class="col-md-9">
            <? if ( function_exists('yoast_breadcrumb')) {yoast_breadcrumb('<ol class="breadcrumb">','</ol>');} ?>
            <h1><?single_cat_title();?></h1>

            <dl>
                <? foreach($posts as $post) : setup_postdata($post);?>
                    <dt><?the_title();?></dt>
                    <dd>
                        <?the_excerpt();?><br />
                        <a href="<?the_permalink();?>" class="readmore">Подробнее...</a>
                    </dd>
                <?
                endforeach;
                wp_reset_postdata();
                ?>
            </dl>

        </div>
        <div class="clear"></div>
        <div class="pagination_container">
        <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
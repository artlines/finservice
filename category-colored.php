<?php
/**
 * Created by PhpStorm.
 * User: kumigy
 * Date: 15.11.2016
 * Time: 17:58
 */

get_header();
if( isset($_GET['tags']) &&  $_GET['tags'] != '0'){
   $tag_filter =  $_GET['tags'];
}else{
   $tag_filter = '';
}

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'category_name'=>'colored',
    'paged' => $paged,
    'tag'=>$tag_filter
);

query_posts( $args );
?>

<main class="container">
	<section>
        <?php if ( function_exists('yoast_breadcrumb')) yoast_breadcrumb('<ol class="breadcrumb">','</ol>'); ?>
        <h1><? single_cat_title(); ?></h1>
        <div class="row">
            <form method="get" action="/colored" class="colored_form">
                <div class="col-md-6 col-xs-12">
                    <input type="hidden" name="paged" value="1" />

                    <?
                    wp_dropdown_categories([
                        'show_option_all' 	=> 'Все',
                        'orderby' 			=> 'name',
                        'show_count'		=> true,
                        'hide_empty'		=> 1,
                        'name'				=> 'tags',
                        'id'				=> 'tags',
                        'class'				=> 'form-control tags',
                        'taxonomy' 			=> 'post_tag',
                        'value_field'       => 'slug',
                        'selected'			=> $tag_filter,
                        //'hierarchical'		=> 1
                    ]);
                    ?>
                </div>
                <div class="col-md-6 col-xs-12">
                    <button type="submit" class="more more__colored">Показать</button>
                </div>
            </form>
        </div>

        <div class="row">
            <?
            while ( have_posts() ) : the_post();?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a class="colored_item" href="<? the_post_thumbnail_url("large"); ?>" rel="lightbox">
                    <div class="colored_item_img" style="background-image: url(<? the_post_thumbnail_url("medium"); ?>);"></div>
                    <div class="colored_item_caption">
                        <? the_title(); ?>
                    </div>
                </a>
            </div>
            <?
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <div class="pagination_container">
            <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
        </div>
    </section>
</main>

<?php
wp_reset_query();
get_footer();
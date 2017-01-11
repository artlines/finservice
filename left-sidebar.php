<?php
/**
 * Created by PhpStorm.
 * User: kumigy
 * Date: 14.12.2016
 * Time: 12:39
 */

$current_category = get_query_var('cat');
$all_categories = get_categories(['parent' => $current_category,'hide_empty' => 0]);

if(!empty($all_categories)):
?>
    <div class="col-md-3 col-sm-3 hidden-xs left_menu">
        <ul class="menu primary_menu">
            <?foreach ($all_categories as $value):?>
                <li class="cat-item"><a href="<?=$value->slug;?>"><?=$value->name;?></a>
                    <ul class="children">
                        <? wp_list_categories([
                                'order' => 'ASC',
                                'title_li'			 =>0,
                                'child_of'           => $value->term_id,
                                'style'              => 'list',
                                'depth'				=> 5,
                                'hierarchical'       => 1,
                                'show_count'         => 0,
                                'hide_empty'         => 0,
                                'exclude_tree'       => '1, 27, 28, 29, 31']
                        );?>
                    </ul>
                </li>
                <?$child_categories[] = $value->term_id; endforeach;?>
            <?php if (empty($all_categories)):
                $posts = get_posts(array('numberposts' => -1, 'category' => $current_category));?>
                <?php foreach ($posts as $post): setup_postdata($post); ?>
                <li class="cat-item"><a href="<?the_permalink();?>"><?=$post->post_title;?></a></li>
            <?php endforeach ?>
            <?php endif ?>
        </ul>
    </div>
<?endif;?>
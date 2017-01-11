<?
get_header();
if (is_category(array('calendar', 'art', 'tech'))): $i=0;?>
	<main class="container">
			<section class="col-md-12 right_content">
                <?php if ( function_exists('yoast_breadcrumb')) {yoast_breadcrumb('<ol class="breadcrumb">','</ol>');} ?>

				<h1><?single_cat_title();?></h1>
                <div class="row">
                    <?while(have_posts()):the_post();$i++;?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="calendar_item">
                                <div class="calendar_img" style="background-image: url(<?=wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?> );"></div>
                                <div class="item_caption">
                                    <h2><?the_title();?></h2>
                                    <p class="date"><?the_field('date');?></p>
                                    <?if (is_category(array('calendar'))):?>
                                        <p><?the_truncated_post(150);?></p>
                                    <?else:?>
                                        <p><?the_truncated_post(90);?></p>
                                    <?endif;?>
                                    <a href="<? the_permalink(); ?>">Подробнее ></a>
                                </div>
                            </div>
                        </div>
                    <?endwhile;?>
                </div>

				<div class="pagination_container">
					<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
				</div>
			</section>

	</main>
<?else:?>
<main class="container">
	<?php
	$current_category = get_query_var('cat');
	$all_categories = get_categories(['parent' => $current_category,'hide_empty' => 0]);
	?>
	<div class="row">
		<?php if(!empty($all_categories)): ?>
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
		<section class="col-md-<?= (!empty($all_categories))? "9" : "12"; ?>">
            <? if ( function_exists('yoast_breadcrumb')) {yoast_breadcrumb('<ol class="breadcrumb">','</ol>');} ?>

            <h1><?single_cat_title();?></h1>

            <? $category = get_category(get_query_var('cat'), false);
			if (!empty($all_categories)):
				echo category_description();
			else:
				echo category_description();
				while(have_posts()):the_post();?>
					<div class="item row">
                        <? if( get_the_post_thumbnail() ) : ?>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="thumbnail">
                                    <? the_post_thumbnail('thumbnail'); ?>
                                </div>
                            </div>
                        <? endif; ?>
                        <div class="<?= get_the_post_thumbnail() ? 'col-md-9 col-sm-8 col-xs-12' : 'col-md-12 col-sm-12 col-xs-12';?>">
                            <a href="<?the_permalink();?>"><h2><?the_title();?></h2></a>
                            <p>
                                <?the_excerpt();?>
                            </p>
                            <a class="readmore" href="<?the_permalink();?>">Подробнее...</a>
                        </div>
					</div>
				<?endwhile;?>
				<div class="pagination_container">
				    <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
				</div>
			<?endif;?>
		</section>
	</div>
</main>
<?endif;?>

<?php get_footer(); ?>
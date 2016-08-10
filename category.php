<?
get_header(); 
if (is_category(array('calendar', 'art', 'tech'))): $i=0;?>
	<main class="container">
		<div class="row">
			<section class="col-md-12 right_content">
				    <?php if ( function_exists('yoast_breadcrumb')) 
    				 {yoast_breadcrumb('<ol class="breadcrumb">','</ol>');} ?>
				<h1><?single_cat_title();?></h1>
				<?while(have_posts()):the_post();$i++;?>
		            
					<a href="<?the_permalink();?>"><div class="calendar_item <?=$i%2==0?'right':'left';?>">
						<div class="calendar_img" style="background: url(<?=wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?> )no-repeat top;"></div></a>
						<div class="item_caption">
							<h2><?the_title();?></h2>
							<p class="date"><?the_field('date');?></p> 
							<?if (is_category(array('calendar'))):?>
								<p><?the_truncated_post(150);?></p>
							<?else:?>
								<p><?the_truncated_post(90);?></p>
							<?endif;?>
							<a href="">Подробнее ></a>
						</div>
					</div>
				<?endwhile;?>
				<div class="clear"></div>
				<div class="pagination_container">
					<ul class="pagination">
					    <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
					</ul>
				</div>
			</section>
		</div>

	</main>
<?elseif (is_category('order_by_name_tikkurila')):?>
<main class="container-big">
	<div class="row">
		<nav class="col-md-3 left_menu">
			<ul class="primary_menu">
				<?$posts = get_posts(array('numberposts' => -1, 'category' => 2,'orderby'  => 'title ', 'order' => 'ASC'));?>
				<?php foreach ($posts as $post): setup_postdata($post); ?>
					<li class="cat-item"><a href="<?the_permalink();?>"><?=$post->post_title;?></a></li>
				<?php endforeach ?>
		  	</ul>
		</nav>
		<section class="col-md-9 right_content ">
		<?php if ( function_exists('yoast_breadcrumb')) 
			{yoast_breadcrumb('<ol class="breadcrumb">','</ol>');} ?>
		<h1><?single_cat_title();?></h1>
			<?$posts = get_posts(array('category' => 2, 'numberposts' => -1, 'orderby'  => 'title ', 'order' => 'ASC'));
			    foreach($posts as $post) : setup_postdata($post);?>
						<a href="<?the_permalink();?>" class="item">
							<h2><?the_title();?></h2>
							<p><?the_excerpt();?></p>
						</a>
					<?endforeach;?>
		</div>
					<div class="clear"></div>
					<div class="pagination_container">
						<ul class="pagination">
						    <?=the_posts_pagination( array(
								'mid_size'  => 3,
								'prev_text' => __( '&laquo;', 'textdomain' ),
								'next_text' => __( '&raquo;', 'textdomain' ),
							) );;?>
						</ul>
					</div>
				</section>
			</div>
		</main>
<?elseif (is_category('colored')):?>
	<main class="container">
		<div class="row">
			<section class="col-md-12 right_content">
			    <?php if ( function_exists('yoast_breadcrumb')) 
				 {yoast_breadcrumb('<ol class="breadcrumb">','</ol>');} ?>
				<h1><?single_cat_title();?></h1>
				<? 
				$tags = get_tags();
				$tag_filter = '';?>
				<div class="row">
					<form method="get" action="" class="colored_form">
						<div class="col-md-6 col-xs-12">
							<select name="tags" class="form-control tags">
								<option value="">Все</option>
								<?foreach ($tags as $tag):?>
									<option value="<?=$tag->slug;?>"><?=$tag->name;?></option>
								<?endforeach;?>
							</select>
						</div>
						<div class="col-md-6 col-xs-12">
							<button type="submit" class="more more__colored">Показать</button>
						</div>
					</form>
					 <?$tag_filter = isset($_GET['tags'])?$_GET['tags']:'';
					 $args = array(
					 	'posts_per_page'=>12,
					 	'category_name'=>'colored',
					 	'tag'=>$tag_filter
					 );
					 $posts = get_posts($args); ?>
					<?foreach ($posts as $post): setup_postdata($post);?>
			            
						<a href="<?=wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>" rel="lightbox">
						<div class="colored_item  col-md-4 col-sm-6 col-xs-12">
							<div class="colored_item_img" style="background: url(<?=wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?> )no-repeat top;"></div></a>
							<div class="colored_item_caption">
								<h2><?the_title();?></h2>
							</div>
						</div>
					<?endforeach;?>
				</div>
			</section>
		</div>
	</main>
<?else:?>
<main class="container-big">
	<div class="row">
		<nav class="col-md-3 left_menu">
			<ul class="primary_menu">
				<?php
				$current_category = get_query_var('cat');
				$all_categories = get_categories(array('parent' => $current_category,'hide_empty' => 0));?>
				<?php /*echo '<pre>'; var_dump($all_categories);*/ ?>	
				<?foreach ($all_categories as $value):?>
					<li class="cat-item"><a href="<?=$value->slug;?>"><?=$value->name;?></a>
						<ul class="children">
							<?wp_list_categories(array(
								'order' => 'ASC',
								'title_li'			 =>0,
								'child_of'           => $value->term_id,
								'style'              => 'list',
								'depth'				=> 5,
								'hierarchical'       => 1,
								'show_count'         => 0,
								'hide_empty'         => 0,
								'exclude_tree'       => '1, 27, 28, 29, 31')
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
		</nav>
		<section class="col-md-9 right_content ">
		<?php if ( function_exists('yoast_breadcrumb')) 
			{yoast_breadcrumb('<ol class="breadcrumb">','</ol>');} ?>
		<h1><?single_cat_title();?></h1>

			<?while(have_posts()):the_post();?>
				<a href="<?the_permalink();?>" class="item">
					<h2><?the_title();?></h2>
					<p><?the_excerpt();?></p>
				</a>
			<?endwhile;?>
		</section>
	</div>
</main>
<?endif;?>

<?php get_footer(); ?>

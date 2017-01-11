<?php get_header(); ?>
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
							<a href="<? the_permalink(); ?>">Подробнее ></a>
						</div>
					</div>
				<?endwhile;?>
				<div class="clear"></div>
				<div class="pagination_container">
					<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
				</div>
			</section>
		</div>
	</main>
<?php get_footer(); ?>
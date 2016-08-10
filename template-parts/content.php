<?if(in_category(array('calendar', 'tech', 'art'))):?>
<main class="container">
	<div class="row">
		<section class="col-md-12 right_content">
			<?php if ( function_exists('yoast_breadcrumb')) 
    			{yoast_breadcrumb('<ol class="breadcrumb">','</ol>');} ?>
			<h1><?the_title();?></h1>
			<?the_content();?>
		</section>
	</div>
</main>
<?else:?>
<main class="container-big">
	<div class="row">
		<nav class="col-md-3 left_menu">
			<ul class="primary_menu">
				<?$current_category = get_the_category();?>
				<li class="cat-item"><a href="<?=get_category_link($current_category[0]->term_id );?>">Назад к <?=$current_category[0]->name;?></a></li>
		  	</ul>
		</nav>
		<section class="col-md-9 right_content">
		<?php if ( function_exists('yoast_breadcrumb')) 
			{yoast_breadcrumb('<ol class="breadcrumb">','</ol>');} ?>
		<h1><?the_title();?></h1>
		<?if(get_field('pdf_upload')):?>
			<p class="upload">Файлы для скачивания:</p>
			<div class="upload_files">
				<?the_field('pdf_upload');?>
			</div>
		<?endif;?>
		<?the_content();?>
	</section>
	</div>
</main>
<?endif;?>

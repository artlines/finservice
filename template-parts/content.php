<?if(in_category(['calendar', 'tech', 'art'])):?>
<main class="container">
	<div class="row">
		<section class="col-md-12">
			<? if ( function_exists('yoast_breadcrumb')) {yoast_breadcrumb('<ol class="breadcrumb">','</ol>');} ?>
			<h1><?the_title();?></h1>
			<?the_content();?>
		</section>
	</div>
</main>
<?else:?>
<main class="container">
	<div class="row">
		<div class="left_menu col-md-3 col-sm-3 hidden-xs">
			<ul class="menu primary_menu">
				<?$current_category = get_the_category();?>
				<li class="cat-item"><a href="<?=get_category_link($current_category[0]->term_id );?>">Назад к <?=$current_category[0]->name;?></a></li>
		  	</ul>
		</div>

		<section class="col-md-9">
            <div class="hidden-xs">
                <? if ( function_exists('yoast_breadcrumb')) {yoast_breadcrumb('<ol class="breadcrumb">','</ol>');} ?>
            </div>
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

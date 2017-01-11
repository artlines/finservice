<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="container" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">404</h1>
				</header>

				<div class="page-content">
                    <p>По данному адресу ничего не найдено. Попробуйте вернуться на предыдущую страницу или начать с <a href="<?= home_url();?>">главной</a> или воспользоваться поиском.</p>
					<?php get_search_form(); ?>
				</div>
			</section>
		</main>
	</div>
<?php get_footer(); ?>

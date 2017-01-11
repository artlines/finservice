<?php

if (!function_exists('finservice_setup')):

	function finservice_setup() {
		add_theme_support('post-formats', array(
			'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
		));

		add_theme_support( 'post-thumbnails');
		add_theme_support('category-thumbnails');
	}

endif; 
add_action( 'after_setup_theme', 'finservice_setup' );

//preview
add_filter('excerpt_more', function($more) {
	return '...';
});


function the_truncated_post($symbol_amount) {
	$filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))) );
	echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}

//remove wraps
remove_filter( 'the_excerpt', 'wpautop' );

/* Кастомные  стили/скрипты */
if ( !is_admin() ) {
	function finservice_scripts() {
        wp_enqueue_style( 'css', get_template_directory_uri().'/css/main.css');
        wp_enqueue_style( 'owl-css', get_template_directory_uri().'/css/owl.carousel.css');

        wp_deregister_script('jquery');
        wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js');
		wp_enqueue_script( 'plugins_js', get_template_directory_uri() . '/js/plugins.js', ['jquery'], true );
        wp_enqueue_script( 'js', get_template_directory_uri() . '/js/main.js', ['jquery'], true );
	}
	
	add_action( 'wp_enqueue_scripts', 'finservice_scripts' );
}

register_nav_menus(array(
    'header' => 'Верхнее меню',
	'footer_left' => 'Нижнее меню слева',
	'footer_right' => 'Нижнее меню справа',
));

function wp_corenavi() {
  global $wp_query;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="pagination">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
    return $a;
}

function exclude_tags($tags) {
    foreach ($tags as $tag)
        switch ($tag->slug) {
            case 'top-prodazh':
            break;
            default:
            $newtags[] = $tag;
        }
    return $newtags;
}
add_filter( 'get_tags', 'exclude_tags');

get_template_part('functions/post_types');
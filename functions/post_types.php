<?php

// Добавляем свои типы записей
add_action('init', 'catalog');

function catalog(){
    $labels = [
        'name'               => 'Каталог товаров', // основное название для типа записи
        'singular_name'      => 'Товар', // название для одной записи этого типа
        'add_new'            => 'Добавить', // для добавления новой записи
        'add_new_item'       => 'Добавить', // заголовка у вновь создаваемой записи в админ-панели.
        'edit_item'          => 'Отредактировать', // для редактирования типа записи
        'new_item'           => 'Новый товар', // текст новой записи
        'view_item'          => 'Просмотреть', // для просмотра записи этого типа.
        'search_items'       => 'Искать', // для поиска по этим типам записи
        'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
        'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
        'parent_item_colon'  => '', // для родителей (у древовидных типов)
        'menu_name'          => 'Каталог', // название меню
    ];
    $args = [
        'label'  => 'Каталог',
        'labels'          => $labels,
        'public'          => true,
        'exclude_from_search' => null,
        'show_ui'         => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'has_archive'     => false,
        //'rewrite'         => 'slug',
        'menu_position'   => 4,
        'supports'        => [ 'title', 'editor', 'thumbnail', 'comments' ],
        'taxonomies'      => [ 'portfolio_category' ],
        'menu_icon'       => 'dashicons-awards',
    ];
    register_post_type('catalog', $args);
}


// Категории портфолио
if ( ! function_exists( 'catalog_category' ) ) {
    function catalog_category() {
        $labels = array(
            'name'                       => 'Категории' ,
            'singular_name'              => 'Категория',
            'menu_name'                  => 'Категории',
            'all_items'                  => 'Категории',
            'parent_item'                => 'Родительская категория',
            'parent_item_colon'          => 'Родительская категория:',
            'new_item_name'              => 'Новая категория',
            'add_new_item'               => 'Добавить новую категорию',
            'edit_item'                  => 'Редактировать категорию',
            'update_item'                => 'Обновить категорию',
            'search_items'               => 'Найти',
            'add_or_remove_items'        => 'Добавить или удалить категорию',
            'choose_from_most_used'      => 'Поиск среди популярных',
            'not_found'                  => 'Не найдено',
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
        );
        register_taxonomy( 'catalog_category', array( 'catalog' ), $args );
    }
    add_action( 'init', 'catalog_category', 0 );
}


// Производитель
if ( ! function_exists( 'manufacture' ) ) {
    function manufacture() {
        $labels = array(
            'name'                       => 'Производители' ,
            'singular_name'              => 'Производитель',
            'menu_name'                  => 'Производители',
            'all_items'                  => 'Производители',
            'parent_item'                => 'Родительская категория',
            'parent_item_colon'          => 'Родительская категория:',
            'new_item_name'              => 'Новый',
            'add_new_item'               => 'Добавить',
            'edit_item'                  => 'Редактировать',
            'update_item'                => 'Обновить',
            'search_items'               => 'Найти',
            'add_or_remove_items'        => 'Добавить или удалить',
            'choose_from_most_used'      => 'Поиск среди популярных',
            'not_found'                  => 'Не найдено',
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
        );
        register_taxonomy( 'manufacture', array( 'catalog' ), $args );
    }
    add_action( 'init', 'manufacture', 0 ); // инициализируем
}
/*
// Сферы деятельности
if ( ! function_exists( 'areas_of_activity' ) ) {
    function areas_of_activity() {
        $labels = array(
            'name'                       => 'Сферы деятельности' ,
            'singular_name'              => 'Сферы',
            'menu_name'                  => 'Сферы деятельности',
            'all_items'                  => 'Все сферы',
            'parent_item'                => 'Родительская категория сфер деятельности',
            'parent_item_colon'          => 'Родительская категория сфер деятельности:',
            'new_item_name'              => 'Новая сфера',
            'add_new_item'               => 'Добавить новую сферу',
            'edit_item'                  => 'Редактировать',
            'update_item'                => 'Обновить',
            'search_items'               => 'Найти',
            'add_or_remove_items'        => 'Добавить или удалить',
            'choose_from_most_used'      => 'Поиск среди популярных',
            'not_found'                  => 'Не найдено',
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
        );
        register_taxonomy( 'areas_of_activity', array( 'portfolio' ), $args );
    }
    add_action( 'init', 'areas_of_activity', 0 ); // инициализируем
}

*/
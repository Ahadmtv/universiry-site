<?php
function add_post_type()
{

    $labels = array(
        'name' => 'رویداد ها',
        'add_new' => 'افزودن رویداد',
        'singular_name' => 'رویداد',
        'add_new_item' => 'افزودن رویداد',
        'new_item' => 'افزودن رویداد',
        'edit_item' => 'ویرایش رویداد',
        'view_item' => 'نمایش رویداد',
        'all_items' => 'تمام رویداد ها',
        'search_items' => 'جستجوی رویداد ها',
    );
    $labels1 = array(
        'name' => 'رشته ها',
        'add_new' => 'افزودن رشته',
        'singular_name' => 'رشته',
        'add_new_item' => 'افزودن رشته',
        'new_item' => 'افزودن رشته',
        'edit_item' => 'ویرایش رشته',
        'view_item' => 'نمایش رشته',
        'all_items' => 'تمام رشته ها',
        'search_items' => 'جستجوی رشته ها',
    );

    $labels2 = array(
        'name' => 'استاد ها',
        'add_new' => 'افزودن استاد',
        'singular_name' => 'استاد',
        'add_new_item' => 'افزودن استاد',
        'new_item' => 'افزودن استاد',
        'edit_item' => 'ویرایش استاد',
        'view_item' => 'نمایش استاد',
        'all_items' => 'تمام استاد ها',
        'search_items' => 'جستجوی استاد ها',
    );

    $labels3 = array(
        'name' => 'اماکن دانشگاه',
        'add_new' => 'افزودن اماکن',
        'singular_name' => 'مکان',
        'add_new_item' => 'افزودن مکان',
        'new_item' => 'افزودن مکان',
        'edit_item' => 'ویرایش مکان',
        'view_item' => 'نمایش مکان',
        'all_items' => 'تمام  اماکن',
        'search_items' => 'جستجوی  اماکن',
    );
    $labels4 = array(
        'name' => 'یادداشت ها',
        'add_new' => 'افزودن یادداشت',
        'singular_name' => 'یادداشت',
        'add_new_item' => 'افزودن یادداشت',
        'new_item' => 'افزودن یادداشت',
        'edit_item' => 'ویرایش یادداشت',
        'view_item' => 'نمایش یادداشت',
        'all_items' => 'تمام  یادداشت ها',
        'search_items' => 'جستجوی  یادداشت ها',
    );
    $label5 = array(
        'name' => 'لایک ها',
        'add_new' => 'افزودن لایک',
        'singular_name' => 'لایک',
        'add_new_item' => 'افزودن لایک',
        'new_item' => 'افزودن لایک',
        'edit_item' => 'ویرایش لایک',
        'view_item' => 'نمایش لایک',
        'all_items' => 'تمام  لایک ها',
        'search_items' => 'جستجوی  لایک ها',
    );

    register_post_type('event', array(
        'capability_type'=>'event',
        'map_meta_cap'=>'true',
        'supports'=>array('title','editor','thumbnail'),
        'has_archive' => true,
        'rewrite'=>array('slug'=>'رویداد ها'),
        'public' => true,

        'labels' => $labels

    )
    );

    register_post_type('program', array(
        'show_in_rest'=>true,
        'supports'=>array('title','editor','thumbnail'),
        'has_archive' => true,
        'rewrite'=>array('slug'=>'رشته ها'),
        'public' => true,

        'labels' => $labels1

    )
    );

    register_post_type('profesor', array(
        'show_in_rest'=>true,
        'supports'=>array('title','editor','thumbnail'),
        'has_archive' => true,
        'rewrite'=>array('slug'=>'استاد ها'),
        'public' => true,

        'labels' => $labels2

    )
    );
    register_post_type('compus', array(
        'supports'=>array('title','editor','thumbnail'),
        'has_archive' => true,
        'rewrite'=>array('slug'=>'اماکن دانشگاه'),
        'public' => true,

        'labels' => $labels3

    )
    );
    register_post_type('note', array(
        'show_in_rest'=>true,
        'capability_type'=>'note',
        'map_meta_cap'=>'true',
        'supports'=>array('title','editor',),
        'has_archive' => true,
        'rewrite'=>array('slug'=>'یادداشت ها'),
        'public' => false,
        'show_ui'=>true,

        'labels' => $labels4

    )
    );

    register_post_type('like', array(
        'supports'=>array('title'),
        'has_archive' => true,
        'rewrite'=>array('slug'=>'لایک ها'),
        'public' => false,
        'show_ui'=>true,

        'labels' => $label5

    )
    );
}

add_action('init', 'add_post_type');
?>
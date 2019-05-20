<?php

add_action('init', 'type_editais', 1);  
function type_editais(){
  $labels = array(
    'name' => _x('Editais', 'post type general name', 'forumuab-ciar'),
    'singular_name' => _x('Edital', 'post type singular name', 'forumuab-ciar'),
    'add_new' => _x('Adicionar edital', 'projeto', 'forumuab-ciar'),
    'add_new_item' => __('Adicionar edital', 'forumuab-ciar'),
    'edit_item' => __('Editar edital', 'forumuab-ciar'),
    'new_item' => __('Novo edital', 'forumuab-ciar'),
    'view_item' => __('Ver edital', 'forumuab-ciar'),
    'search_items' => __('Buscar', 'forumuab-ciar'),
    'not_found' =>  __('Nenhum edital encontrado', 'forumuab-ciar'),
    'not_found_in_trash' => __('Nenhum edital encontrado na lixeira', 'forumuab-ciar'),
    'parent_item_colon' => '',
    'menu_name' => 'Editais'
  );
  
  $args = array(
    'labels' => $labels,
    'show_in_rest' => false, // gutenberg
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 4,
    'exclude_from_search' => false,
    'menu_icon' => 'dashicons-format-aside',
    'supports' => array('title','editor'),
    'rewrite' => array('slug' => 'editais')
  );
  
  register_post_type('uabeditais',$args);
}
<?php

add_action('init', 'type_eventos', 1);  
function type_eventos(){
  $labels = array(
    'name' => _x('Eventos', 'post type general name', 'forumuab-ciar'),
    'singular_name' => _x('Evento', 'post type singular name', 'forumuab-ciar'),
    'add_new' => _x('Adicionar evento', 'projeto', 'forumuab-ciar'),
    'add_new_item' => __('Adicionar evento', 'forumuab-ciar'),
    'edit_item' => __('Editar evento', 'forumuab-ciar'),
    'new_item' => __('Novo evento', 'forumuab-ciar'),
    'view_item' => __('Ver evento', 'forumuab-ciar'),
    'search_items' => __('Buscar', 'forumuab-ciar'),
    'not_found' =>  __('Nenhum evento encontrado', 'forumuab-ciar'),
    'not_found_in_trash' => __('Nenhum evento encontrado na lixeira', 'forumuab-ciar'),
    'parent_item_colon' => '',
    'menu_name' => 'Eventos'
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
    'menu_icon' => 'dashicons-calendar-alt',
    'supports' => array('title','editor'),
    'rewrite' => array('slug' => 'eventos')
  );
  
  register_post_type('uabeventos',$args);
}
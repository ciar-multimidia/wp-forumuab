<?php

add_action('init', 'type_experiencias', 1);  
function type_experiencias(){
  $labels = array(
    'name' => _x('Experiências', 'post type general name', 'forumuab-ciar'),
    'singular_name' => _x('Experiência', 'post type singular name', 'forumuab-ciar'),
    'add_new' => _x('Adicionar relato', 'projeto', 'forumuab-ciar'),
    'add_new_item' => __('Adicionar relato', 'forumuab-ciar'),
    'edit_item' => __('Editar relato', 'forumuab-ciar'),
    'new_item' => __('Novo relato', 'forumuab-ciar'),
    'view_item' => __('Ver relato', 'forumuab-ciar'),
    'search_items' => __('Buscar', 'forumuab-ciar'),
    'not_found' =>  __('Nenhum relato encontrado', 'forumuab-ciar'),
    'not_found_in_trash' => __('Nenhum relato encontrado na lixeira', 'forumuab-ciar'),
    'parent_item_colon' => '',
    'menu_name' => 'Experiências'
  );
  
  $args = array(
    'labels' => $labels,
    'show_in_rest' => true, // gutenberg
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
    'menu_icon' => 'dashicons-testimonial',
    'supports' => array('title','editor'),
    'rewrite' => array('slug' => 'experiencias')
  );
  
  register_post_type('uabexperiencias',$args);
}
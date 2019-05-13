<?php

// ========================================//
// SETUP THEME
// ========================================// 

add_action( 'after_setup_theme', 'ciar_setup' );
function ciar_setup() {
    if( function_exists('acf_add_options_page') ) {
      acf_add_options_page(array(
        'page_title'  => 'Configurações gerais do layout',
        'menu_title'  => 'Configurações',
        'menu_slug'   => 'ciar-opcoes',
        'capability'  => 'edit_posts',
        'icon_url'    => 'dashicons-admin-generic',
        'position'    => 3,
        'redirect'    => false
      ));
    }


    // seguranca
    add_filter( 'style_loader_src', 'ciar_scripts_remove_versao', 9999 );
    add_filter( 'script_loader_src', 'ciar_scripts_remove_versao', 9999 );
    add_filter( 'style_loader_src', 'ciar_removequerystring', 10, 2 );
    add_filter( 'script_loader_src', 'ciar_removequerystring', 10, 2 );

    // limpeza
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10);
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wp_generator_tag' );
    remove_action( 'wp_head', 'wp_resource_hints', 2);
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'rest_output_link_wp_head');
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
    remove_action( 'wp_head', 'wlwmanifest_link');

    // thumbnails
    add_theme_support( 'post-thumbnails' ); 
    add_image_size( 'banner_home', 1280, 495, true );

    // configuracoes de layout
    if ( ! isset( $content_width ) ) { $content_width = 840; }
    add_action( 'wp_enqueue_scripts', 'ciar_load_styles', 999 );
    add_action( 'wp_head', 'ciar_load_scripts_head', 999 );
    add_action( 'wp_footer', 'ciar_load_scripts_footer', 999 );
    add_filter( 'excerpt_more', 'ciar_excerpt_more' );
    add_filter( 'excerpt_length', 'ciar_excerpt_length', 999 );
    add_filter( 'body_class', 'ciar_body_class' );

    include_once(get_template_directory().'/func/shortcodes.php' );
    include_once(get_template_directory().'/func/blocks.php' );

    // menus
    register_nav_menus( array( 
      'primary' => __( 'Menu do site'),
    ) );

    // GUTENBERG
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-full' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'editor-color-palette' );
    add_theme_support( 'disable-custom-colors' );
    add_theme_support(
      'editor-font-sizes',
      array(
        array(
          'name'      => __( 'Normal', 'engsat-afc' ),
          'shortName' => __( 'N', 'engsat-afc' ),
          'size'      => 16,
          'slug'      => 'normal',
        )
      )
    );

    show_admin_bar(false);
}

// ========================================//
// DEFINICOES DE MENU DE PAINEL
// ========================================// 
function ciar_menu_adm(){
  global $menu, $submenu;

  remove_menu_page( 'tools.php' );
  remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'ciar_menu_adm', 999 );

function ciar_remove_customize() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('customize');
}
add_action( 'wp_before_admin_bar_render', 'ciar_remove_customize' );

function ciar_admin_css() {
    // echo '<style>';
    //   echo '#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {width: 182px;}';
    //   echo '#wpcontent, #wpfooter { margin-left: 182px; }';
    //   echo '#adminmenu .wp-submenu { left: 182px;}';
    //   echo '@media (min-width: 960px) { .auto-fold .edit-post-header { left: 182px; } }';
    // echo '</style>';
}
add_action( 'admin_head', 'ciar_admin_css' );



// ========================================//
// SCRIPTS E STYLES
// ========================================// 
function ciar_load_styles() {  

    wp_enqueue_style('fontawesome', '//use.fontawesome.com/releases/v5.8.1/css/all.css', array(), 'all', null);
    wp_enqueue_style('layout', get_template_directory_uri() . '/css/layout.css', array(), '', 'all', null); 
    
    if (function_exists('barra_brasil')) {wp_enqueue_script( 'barra-br', '//barra.brasil.gov.br/barra_2.0.js', array('jquery'), '', true);}
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox.js', array('jquery'), '', true);
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true);

    if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); }
} 

function ciar_load_scripts_head() { }
function ciar_load_scripts_footer() { }



// ========================================//
// BARRA BRASIL
// ========================================// 
function barra_brasil() {
  // https://softwarepublico.gov.br/gitlab/govbr/barra-govbr/tree/master
  echo '<div id="barra-brasil"></div>';
}


// ========================================//
// RESUMO
// ========================================// 
function ciar_excerpt_more( $more ) { return '...'; }
function ciar_excerpt_length( $length ) { return 20; }

function ciar_get_excerpt($out_excerpt) {
  while (have_posts()):the_post(); 
    $out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", strip_tags(get_the_excerpt())); 
    echo apply_filters("the_excerpt_rss", $out_excerpt); 
  endwhile;
}


// ========================================//
// SEGURANCA
// ========================================// 
// remover versão do wp nos scripts 
function ciar_scripts_remove_versao( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// retirar query strings de scripts e css
function ciar_removequerystring( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}


// ========================================//
// THUMB
// ========================================// 
function ciar_thumb($size) {
  global $post;
  $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),$size); 
  $url = $thumb['0'];
  echo $url;
}


function ciar_autothumb($size) {
    $attachment = get_children(
        array(
            'post_parent'    => get_the_ID(),
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'order'          => 'DESC',
            'numberposts'    => 1,
        )
    );
    if ( ! is_array( $attachment ) || empty( $attachment ) ) {
        return;
    }
    $attachment = current( $attachment );
    echo wp_get_attachment_url( $attachment->ID,$size);
}



// ========================================//
// BODY CLASS
// ========================================// 
function ciar_body_class($classes) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
    return $classes;
}


// ========================================//
// SHORTCODES
// ========================================// 
function ciar_shortcode_paragraph_fix($content) {  
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );

    $content = strtr($content, $array);

    return $content;
}
add_filter('the_content', 'ciar_shortcode_paragraph_fix');


// ========================================//
// PLUGINS
// ========================================// 
include_once(get_template_directory().'/plugins.php');

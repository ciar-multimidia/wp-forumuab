<?php

// ========================================//
// SETUP THEME
// ========================================// 

add_action( 'after_setup_theme', 'ciar_setup' );
function ciar_setup() {
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
    include_once(get_template_directory().'/func/type-eventos.php' );
    include_once(get_template_directory().'/func/type-editais.php' );
    include_once(get_template_directory().'/func/type-experiencias.php' );

    add_filter( 'gutenberg_can_edit_post_type', 'desabilitar_gutenberg', 10, 2 );
    add_filter( 'use_block_editor_for_post_type', 'desabilitar_gutenberg', 10, 2 );

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
          'name'      => __( 'Normal', 'forumuab-ciar' ),
          'shortName' => __( 'N', 'forumuab-ciar' ),
          'size'      => 16,
          'slug'      => 'normal',
        )
      )
    );

    // show_admin_bar(false);
}


// ========================================//
// DEFINICOES DE MENU DE PAINEL
// ========================================// 
function ciar_menu_adm(){
  global $menu, $submenu;

  $menu[5][0] = 'Notícias';
  $menu[20][0] = 'Páginas do site';

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
    echo '<style>';
      echo '#adminmenu .dashicons-admin-page:before { content: "\f472"; }';
      echo 'img {max-width:100%;}';
      echo '.inside.acf-fields > .acf-field > .acf-label > label {font-size:22px;}';
    echo '</style>';
}
add_action( 'admin_head', 'ciar_admin_css' );



// ========================================//
// SCRIPTS E STYLES
// ========================================// 
function ciar_load_styles() {  

    wp_enqueue_style('fontawesome', '//use.fontawesome.com/releases/v5.8.2/css/all.css', array(), 'all', null);
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
// CONVERTE LINK VIDEO PARA EMBED
// ========================================//
function ciar_video_youtube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<iframe src=\"//www.youtube.com/embed/$2?enablejsapi=1&amp;rel=0&amp;controls=0&amp;showinfo=0\" frameborder=\"0\" allowfullscreen></iframe>",
        $string
    );
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


function ciar_primeira_img() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = ciar_autothumb('large');
  }
  return $first_img;
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
// NAV SIMPLES ENTRE PAGS
// ========================================// 
add_filter('next_posts_link_attributes', 'ciar_next_posts');
add_filter('previous_posts_link_attributes', 'ciar_prev_posts');
function ciar_next_posts() { return 'class="dir"'; }
function ciar_prev_posts() { return 'class="esq"'; }


// ========================================//
// DESABILITANDO GUTENBERG NOS TEMPLATES
// ========================================// 
// credito: https://www.billerickson.net/disabling-gutenberg-certain-templates/
function desabilitar_editor( $id = false ) {
  $excluded_templates = array(
    'front-page.php',
    'page-documentos.php'
  );
  $excluded_ids = array(
    // get_option( 'page_on_front' )
  );
  if( empty( $id ) )
    return false;
  $id = intval( $id );
  $template = get_page_template_slug( $id );
  return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}
function desabilitar_gutenberg( $can_edit, $post_type ) {
  if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
    return $can_edit;
  if( desabilitar_editor( $_GET['post'] ) )
    $can_edit = false;
  return $can_edit;
}



// ========================================//
// REDIRECIONA ASSINANTES
// ========================================// 
function my_login_redirect( $url, $request, $user ){
	if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
		if( $user->has_cap( 'subscriber')) {
			$url = home_url('/forum/');
		} else {
			$url = admin_url();
		}
	}
	return $url;
}
add_filter('login_redirect', 'my_login_redirect', 10, 3 );
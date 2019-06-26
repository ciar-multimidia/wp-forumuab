<?php
$homepageid = get_option('page_on_front');
$noticiaspageid = get_option('page_for_posts');
$bannerhome = get_field('banner_home',$homepageid);
$bannerclass = '';
if(! is_front_page()) { $bannerclass = ' class="pagina-interna"'; }

$type_eventos = 'uabeventos';
$type_editais = 'uabeditais';
$type_experiencias = 'uabexperiencias';
$type_noticias = 'post';
$type_pags = 'page';

$categoriapag = '';


if (is_post_type_archive($type_eventos) || is_singular($type_eventos)) { 
	$obj = get_post_type_object( $type_eventos );
	$categoriapag = $obj->labels->name;
}
if (is_post_type_archive($type_editais) || is_singular($type_editais)) {  
	$obj = get_post_type_object( $type_editais );
	$categoriapag = $obj->labels->name;
}
if (is_post_type_archive($type_experiencias) || is_singular($type_experiencias)) {  
	$obj = get_post_type_object( $type_experiencias );
	$categoriapag = $obj->labels->name;
}
if (is_home() || is_singular($type_noticias)) { 
	$categoriapag = 'Notícias';
}
if (is_singular($type_pags)) { 
	$categoriapag = get_the_title();
}



echo '<div id="banner"'.$bannerclass.'>';
	if ($bannerhome) { echo '<img src="'.$bannerhome.'">'; }

	if(! is_front_page()) {
		echo '<div class="container">';

			echo '<h1>'.$categoriapag.'</h1>';

		echo '</div>';
	}
echo '</div>';
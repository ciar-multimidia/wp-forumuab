<?php

$bannerhome = get_field('banner_home','option');
$bannerclass = '';
if(! is_front_page()) { $bannerclass = ' class="pagina-interna"'; }

echo '<div id="banner"'.$bannerclass.'>';
	if ($bannerhome) { echo '<img src="'.$bannerhome.'">'; }
	if(! is_front_page()) {
		echo '<div class="container">';
			global $post; 
			echo '<h1>'.get_the_title($post->ID).'</h1>';
		echo '</div>';
	}
echo '</div>';
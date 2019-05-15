<?php

$bannerhome = get_field('banner_home','option');
$bannerclass = '';
if(! is_front_page()) { $bannerclass = ' class="pagina-interna"'; }

echo '<div id="banner"'.$bannerclass.'>';
	if ($bannerhome) { echo '<img src="'.$bannerhome.'">'; }
echo '</div>';
<?php
$homepageid = get_option('page_on_front');

if( have_rows('banners_chamada',$homepageid) ) { 
	echo '<aside class="chamadas">';
		while (have_rows('banners_chamada',$homepageid)) : the_row(); 
			$chamadaimg = esc_url(get_sub_field('imagem'));
			$link = esc_url(get_sub_field('destino'));
			echo '<a href="'.$link.'" target="_blank"><img src="'.$chamadaimg.'"></a>';
		endwhile;
	echo '</aside>';
}
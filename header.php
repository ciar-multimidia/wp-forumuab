<?php 

echo '<!DOCTYPE html>';
echo '<html lang="pt-BR" dir="ltr">';
echo '<head>';
	echo '<title>';
		echo wp_title( '|', true, 'right' ); 
		echo get_bloginfo('name');
	echo '</title>';
get_template_part('inc/metatags');
echo '</head>';
echo '<body class="' . join( ' ', get_body_class() ) . '">';

get_template_part('inc/menu-mobile');

echo '<main>';

	$homepageid = get_option('page_on_front');

	if (class_exists(barra_brasil())) { barra_brasil(); }

	
	if( have_rows('menu_superior',$homepageid) ) { 
		while (have_rows('menu_superior',$homepageid)) : the_row(); 
			$pgdocumentos = esc_url(get_sub_field('pgdocumentos'));
			$pgficha = esc_url(get_sub_field('pgficha'));

			echo '<div id="barra-site" aria-label="Barra de navegação rápida">';
				echo '<div class="container">';
					echo '<ul>';
						echo '<li><a href="'.get_permalink($homepageid).'"><i class="fas fa-home" aria-hidden="true"></i> <span>Página inicial</span></a></li>';
						if($pgdocumentos) { echo '<li><a href="'.$pgdocumentos.'"><i class="fas fa-folder-open" aria-hidden="true"></i> <span>Documentos</span></a></li>'; }
						if($pgficha) { echo '<li><a href="'.$pgficha.'"><i class="fas fa-user-friends" aria-hidden="true"></i> <span>Ficha técnica</span></a></li>'; }
					echo '</ul>';
				echo '</div>';
			echo '</div>';
		endwhile; 
	}	

	echo '<header id="cabecalho" class="container" aria-label="Área de marca e navegação global do site">';
		echo '<a href="'.get_bloginfo('url').'" class="marca"><img src="'.get_template_directory_uri().'/img/marca.svg" alt="'.get_bloginfo('name').'"></a>';

		echo '<nav>';
			echo '<ul>';
				  echo '<li class="menu-mobile"><button class="button" id="bt-menu"><i class="fas fa-bars"></i> Navegar</button></li>';
				  wp_nav_menu ( array( 
				    'theme_location' => 'primary', 
				    'menu' => 'primary', 
				    'container' => '', 
				    'container_class' => '', 
				    'container_id' => '', 
				    'menu_class' => '', 
				    'menu_id' => '', 
				    'echo' => true, 
				    'fallback_cb' => 'wp_page_menu', 
				    'link_before' => '',
				    'link_after' => '',
				    'items_wrap' => '%3$s', 
				    'depth' => 0, 
				    'walker' => '' 
				  )); 			
				echo '<li><a href="'.get_bloginfo('url').'/forum/" class="button">Acessar Forum</a></li>';
			echo '</ul>';
		echo '</nav>';
	echo '</header>';

	get_template_part('inc/banner-paginas');

	

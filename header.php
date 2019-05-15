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

echo '<main>';

	if (class_exists(barra_brasil())) { barra_brasil(); }

	echo '<div id="barra-site">';
		echo '<div class="container">';
			echo '<ul>';
				echo '<li><a href="#"><i class="fas fa-folder-open" aria-hidden="true"></i> Documentos</a></li>';
				echo '<li><a href="#"><i class="fas fa-user-friends" aria-hidden="true"></i> Ficha técnica</a></li>';
				echo '<li class="mostra-mobile"><a href="#"><i class="fas fa-comments" aria-hidden="true"></i> Fórum</a></li>';
			echo '</ul>';
		echo '</div>';
	echo '</div>';

	echo '<header id="cabecalho" class="container">';
		echo '<a href="'.get_bloginfo('url').'" class="marca"><img src="'.get_template_directory_uri().'/img/marca.svg" alt="'.get_bloginfo('name').'"></a>';

		echo '<nav>';
			echo '<ul>';
				echo '<li><a href="#">Notícias</a></li>';
				echo '<li><a href="#">Eventos</a></li>';
				echo '<li><a href="#">Editais</a></li>';
				echo '<li><a href="#">Coordenadores</a></li>';
				echo '<li><a href="#">Experiências</a></li>';
				echo '<li><a href="#" class="button">Acessar Forum</a></li>';
			echo '</ul>';
		echo '</nav>';
	echo '</header>';

	get_template_part('inc/banner-paginas');

	

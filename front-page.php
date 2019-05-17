<?php /* Template Name: Página Inicial */
$homepageid = get_option('page_on_front');
get_header();

////////////////////////////////////////////////////////////////////////
echo '<section id="ultimas-novidades" class="container">';

	// NOVIDADES
	echo '<div class="novidades">';

		echo '<aside>';
			echo '<header>';
				echo '<h1>Notícias</h1>';
				echo '<a href="#" class="vermais">ver tudo</a>';
			echo '</header>';

			echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat recusandae in quo commodi facilis ratione quas laborum maiores quos incidunt earum quidem neque';
		echo '</aside>';

		echo '<aside>';
			echo '<header>';
				echo '<h1>Eventos</h1>';
				echo '<a href="#" class="vermais">ver tudo</a>';
			echo '</header>';

			echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat recusandae in quo commodi facilis ratione quas laborum maiores quos incidunt earum quidem neque';
		echo '</aside>';

		echo '<aside>';
			echo '<header>';
				echo '<h1>Editais</h1>';
				echo '<a href="#" class="vermais">ver tudo</a>';
			echo '</header>';

			echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat recusandae in quo commodi facilis ratione quas laborum maiores quos incidunt earum quidem neque';
		echo '</aside>';

	echo '</div>';



	// CHAMADAS BANNERS
	if( have_rows('banners_chamada',$homepageid) ) { 
		echo '<div class="chamadas">';
			while (have_rows('banners_chamada',$homepageid)) : the_row(); 
				$chamadaimg = esc_url(get_sub_field('imagem'));
				$link = esc_url(get_sub_field('destino'));
				echo '<a href="'.$link.'" target="_blank"><img src="'.$chamadaimg.'"></a>';
			endwhile;
		echo '</div>';
	}

echo '</section>';


////////////////////////////////////////////////////////////////////////
echo '<section id="experiencias">';
	echo '<div class="container">';

		echo '<div class="video">'; 
			echo '<figure>'; 
				$videodestaque = 'https://www.youtube.com/watch?v=14EyODpXQtg';
				echo ciar_video_youtube($videodestaque);
			echo '</figure>';
		echo '</div>';
		
		echo '<div class="info">';
			echo '<h1>Nossas experiências</h1>';
			echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat recusandae in quo commodi facilis ratione quas laborum maiores quos incidunt earum quidem neque</p>';
			echo '<a href="#" class="button">Saiba mais</a>';
		echo '</div>';
	echo '</div>';
echo '</section>';

get_footer();
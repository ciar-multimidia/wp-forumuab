<?php /* Template Name: Página Inicial */
$noticiaspageid = get_option('page_for_posts');
$homepageid = get_option('page_on_front');
get_header();

////////////////////////////////////////////////////////////////////////
echo '<section id="ultimas-novidades" class="container">';

	// NOVIDADES
	echo '<div class="novidades">';

		$numposts = 6;
		$loopnoticias = array('showposts' => $numposts, 'post_type' => 'post');
		$loopeventos = array('showposts' => $numposts, 'post_type' => 'uabeventos');
		$loopeditais = array('showposts' => $numposts, 'post_type' => 'uabeditais');

		$noticias = new WP_Query($loopnoticias);
		if ( $noticias->have_posts() ) {
			echo '<aside>';
				echo '<header>';
					echo '<h1>Notícias</h1>';
					echo '<a href="'.get_permalink($noticiaspageid).'" class="vermais">ver tudo</a>';
				echo '</header>';		
				echo '<ul>';
					while ( $noticias->have_posts() ) { $noticias->the_post();
					echo '<li><a href="'.get_the_permalink().'"><time datetime="'.get_the_time('Y-m-d h:i').'">'.get_the_time('m/d/Y').'</time> <i class="fas fa-circle"></i> <strong>'.get_the_title().'</strong></a><li>';
					}
				echo '</ul>';
			echo '</aside>';
			wp_reset_postdata();
		}


		$eventos = new WP_Query($loopeventos);
		if ( $eventos->have_posts() ) {
			echo '<aside>';
				echo '<header>';
					echo '<h1>Eventos</h1>';
					echo '<a href="#" class="vermais">ver tudo</a>';
				echo '</header>';
				echo '<ul>';
					while ( $eventos->have_posts() ) { $eventos->the_post();
					echo '<li><a href="#"><time datetime="2011-01-12">04/04/19</time> <i class="far fa-calendar-alt"></i> <strong>'.get_the_title().'</strong></a><li>';
					}
				echo '</ul>';
			echo '</aside>';
			wp_reset_postdata();
		}


		$editais = new WP_Query($loopeditais);
		if ( $editais->have_posts() ) {
		echo '<aside>';
				echo '<header>';
					echo '<h1>Editais</h1>';
					echo '<a href="#" class="vermais">ver tudo</a>';
				echo '</header>';
				echo '<ul>';
					while ( $editais->have_posts() ) { $editais->the_post();
					echo '<li><a href="#"><i class="fas fa-file"></i> <strong>'.get_the_title().'</strong></a><li>';
					}
				echo '</ul>';
			echo '</aside>';
			wp_reset_postdata();
		}

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
		$videodestaque = get_field('experiencias_video',$homepageid);

		if ($videodestaque) {
			echo '<div class="video">'; 
				echo '<figure>'; 
					// $videodestaque = 'https://www.youtube.com/watch?v=14EyODpXQtg';
					// echo ciar_video_youtube($videodestaque);
					echo $videodestaque;
				echo '</figure>';
			echo '</div>';
		}
		
		
		if( have_rows('experiencias_texto',$homepageid) ) { 
			while (have_rows('experiencias_texto',$homepageid)) : the_row(); 
				$titulo = get_sub_field('titulo');
				$apresentacao = get_sub_field('apresentacao');
				$pagina = esc_url(get_sub_field('pagina'));


				echo '<div class="info">';
					if ($titulo) { echo '<h1>'.$titulo.'</h1>'; }
					if ($apresentacao) { echo $apresentacao; }
					if ($pagina) { echo '<a href="'.$pagina.'" class="button">Saiba mais</a>'; }
				echo '</div>';
			endwhile; 
		}
	echo '</div>';
echo '</section>';

get_footer();
<?php /* Template Name: Página Inicial */
$noticiaspageid = get_option('page_for_posts');
$homepageid = get_option('page_on_front');
get_header();

////////////////////////////////////////////////////////////////////////
echo '<section id="ultimas-novidades" class="container">';

	// NOVIDADES
	echo '<div class="novidades">';

		$numposts = 4;
		$type_eventos = 'uabeventos';
		$type_editais = 'uabeditais';


		$loopnoticias = array('showposts' => $numposts, 'post_type' => 'post');
		$loopeventos = array(
			'showposts' => $numposts, 
			'post_type' => $type_eventos, 
			// 'order' => 'DESC',
			// 'orderby' => 'meta_value',
			// 'meta_key' => 'evento_data',
			// 'meta_type' => 'DATETIME', 
		);
		$loopeditais = array('showposts' => $numposts, 'post_type' => $type_editais);

		$noticias = new WP_Query($loopnoticias);
		if ( $noticias->have_posts() ) {
			echo '<aside>';
				echo '<header>';
					echo '<h1>Notícias</h1>';
					echo '<a href="'.get_permalink($noticiaspageid).'" class="vermais">ver tudo</a>';
				echo '</header>';		
				echo '<ul>';
					while ( $noticias->have_posts() ) { $noticias->the_post();
					echo '<li><a href="'.get_the_permalink().'"><time datetime="'.get_the_time('Y-m-d h:i').'">'.get_the_time('d/m/Y').'</time> <i class="fas fa-circle"></i> <strong>'.get_the_title().'</strong></a><li>';
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
					echo '<a href="'.get_post_type_archive_link($type_eventos).'" class="vermais">ver tudo</a>';
				echo '</header>';
				echo '<ul>';
					while ( $eventos->have_posts() ) { $eventos->the_post();
						$timestamp = get_field('evento_data');
						$data = date_i18n("d/m/Y", strtotime($timestamp));

						// echo '<li><a href="'.get_the_permalink().'"><time datetime="'.$timestamp.'">'; echo $data; echo '</time> <i class="far fa-calendar-alt"></i> <strong>'.get_the_title().'</strong></a><li>';
						echo '<li><a href="'.get_the_permalink().'"><i class="far fa-calendar-alt"></i> <strong>'.get_the_title().'</strong></a><li>';
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
					echo '<a href="'.get_post_type_archive_link($type_editais).'" class="vermais">ver tudo</a>';
				echo '</header>';
				echo '<ul>';
					while ( $editais->have_posts() ) { $editais->the_post();
					echo '<li><a href="'.get_the_permalink().'"><i class="fas fa-file"></i> <strong>'.get_the_title().'</strong></a><li>';
					}
				echo '</ul>';
			echo '</aside>';
			wp_reset_postdata();
		}

	echo '</div>';



	// CHAMADAS BANNERS
	get_template_part('inc/programas-uab');

echo '</section>';


////////////////////////////////////////////////////////////////////////
echo '<section id="experiencias">';
	$tipo_apresentacao = get_field('experiencias_apresentacao',$homepageid);
	$imagemdestaque = get_field('experiencias_imagem',$homepageid);
	$videodestaque = get_field('experiencias_video',$homepageid);
	
	echo '<div class="container'; if (empty($tipo_apresentacao)) { echo ' sem-video';} echo'">';
		

		
			echo '<div>'; 
				if ($videodestaque && $tipo_apresentacao == 'video') { 
					echo '<figure class="video">'; 
						echo $videodestaque;
					echo '</figure>'; 
				} elseif ($imagemdestaque && $tipo_apresentacao == 'foto') {
					echo '<figure class="foto">'; 
						echo '<img src="'.$imagemdestaque['sizes']['large'].'">';
					echo '</figure>';
				}
			echo '</div>';
		
		
		
		if( have_rows('experiencias_texto',$homepageid) ) { 
			while (have_rows('experiencias_texto',$homepageid)) : the_row(); 
				$titulo = get_sub_field('titulo');
				$apresentacao = get_sub_field('apresentacao');
				$pagina = get_post_type_archive_link('uabexperiencias');


				echo '<div class="info">';
					if ($titulo) { echo '<h1>'.$titulo.'</h1>'; }
					if ($apresentacao) { echo '<article>'.$apresentacao.'</article>'; }
					if ($pagina) { echo '<a href="'.$pagina.'" class="button">Saiba mais</a>'; }
				echo '</div>';
			endwhile; 
		}
	echo '</div>';
echo '</section>';

get_footer();
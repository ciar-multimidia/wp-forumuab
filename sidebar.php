<?php 
$noticiaspageid = get_option('page_for_posts');
$homepageid = get_option('page_on_front');
$type_eventos = 'uabeventos';
$type_editais = 'uabeditais';
$type_noticias = 'post';
$type_pags = 'page';


echo '<div class="lateral">';


	///// MOSTRAR EDITAIS
	if (is_singular($type_editais)) {
		echo '<div class="lateral-info-editais">'; 
			if( have_rows('edital') ) { 
				while (have_rows('edital')) : the_row(); 

					$edital_principal = esc_url(get_sub_field('edital_principal'));
					
					if ($edital_principal) {
						echo '<a href="'.$edital_principal.'" target="_blank"><h2><i class="fas fa-file-export"></i> Baixar edital</h2></a>';
					}

					if( have_rows('editais_complementares') ) { 
						echo '<hr>';
						echo '<div class="complementares"><h4>Editais complementares:</h4>';
						while (have_rows('editais_complementares')) : the_row();
							$edital_complementar = get_sub_field('complementar');
							echo '<a href="'.$edital_complementar['url'].'" target="_blank"><i class="fas fa-download"></i> '.$edital_complementar['filename'].'</a><br>';
						endwhile; 
						echo '</div>';
					}

				endwhile; 
			}			

			if( have_rows('anexos') ) { 
				echo '<hr>';
				echo '<div class="complementares"><h4>Anexos:</h4>';
					while (have_rows('anexos')) : the_row();
						$anexo = get_sub_field('itemanexo');
						echo '<a href="'.$anexo['url'].'" target="_blank"><i class="fas fa-download"></i> '.$anexo['filename'].'</a><br>';
					endwhile; 
				echo '</div>';
			}
		echo '</div>';
	}


	///// MOSTRAR DATA EVENTO
	if (is_singular($type_eventos)) {

		$timestamp = get_field('evento_data');
		$dataevento = date_i18n("d/m/Y", strtotime($timestamp));
		$hora = date_i18n("h:i", strtotime($timestamp));

		echo '<div class="lateral-info-evento">'; 
			echo '<strong>data e hora do evento</strong>';
			echo '<h3>'.$dataevento.', às '.$hora.'</h3>';
		echo '</div>';
	}


	///// COMPARTILHAR PÁGINA
	get_template_part('inc/compartilhar');


	///// CHAMADAS BANNERS
	if (is_home() || is_singular('post') || is_page_template('page-documentos.php')) {
		get_template_part('inc/programas-uab');

		///// FACEBOOK UAB
		// echo '<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FForumNacionalDeCoordenadoresUAB%2F&tabs=timeline&width=300&height=350&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true" width="100%" height="350" style="border:none;overflow:hidden;margin-top:20px" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>';
	}
	

echo '</div>';



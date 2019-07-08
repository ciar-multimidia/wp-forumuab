<?php /* Template Name: Pag Documentos */
get_header(); 

	if (have_posts()) {
		while (have_posts()) : the_post(); 
			echo '<div class="container paginterna area-util">';
				echo '<article class="coluna-maior">';
					the_content();

					if( have_rows('lista_documentos') ) { 
						echo '<ul class="lista-docs">';
							while (have_rows('lista_documentos')) : the_row(); 
								$arquivo = get_sub_field('arquivo');
								$nome = get_sub_field('nome');
								echo '<li><h4>'.$nome.'</h4><i class="fas fa-download"></i> <a href="'.$arquivo['url'].'" title="Baixar - '.$nome.'">Baixar</a></li>';
							endwhile;
						echo '</ul>';
					}
				echo '</article>';
				get_sidebar();
			echo '</div>';
		endwhile;
	}

get_footer(); ?>
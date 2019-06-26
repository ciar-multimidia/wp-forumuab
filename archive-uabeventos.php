<?php get_header(); 

echo '<div class="container paginterna area-util">';
	echo '<div class="coluna-maior">';
		if (have_posts()) {
			while (have_posts()) : the_post(); 

				$timestamp = get_field('evento_data');
				$diames = date_i18n("d/m", strtotime($timestamp));
				$ano = date_i18n("Y", strtotime($timestamp));

				echo '<div class="item-loop"><a href="'.get_the_permalink().'">';

					echo '<div class="data-evento"><div class="infos">'; 
						echo '<span class="desc">Data do evento</span>';
						echo '<span class="diames">'.$diames.'</span>';
						echo '<span class="ano">'.$ano.'</span>';
					echo '</div></div>';

					get_template_part('inc/loop-resumo');

				echo '</a></div>';
			endwhile;
		}

		get_template_part('inc/navegacao');

	    $qde_eventos = wp_count_posts('uabeventos');
		$qde_eventos_publicados = $qde_eventos->publish;
		echo '<p><small>'.$qde_eventos_publicados; 
			if($qde_eventos_publicados == 1) {echo ' evento divulgado'; } else {echo ' eventos divulgados';}
		echo '</small></p>';

	echo '</div>';
	get_sidebar();
echo '</div>';
get_footer(); 
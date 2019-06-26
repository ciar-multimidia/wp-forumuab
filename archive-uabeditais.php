<?php get_header(); 

echo '<div class="container paginterna area-util">';
	echo '<div class="coluna-maior">';
		if (have_posts()) {
			while (have_posts()) : the_post(); 

				echo '<div class="item-loop"><a href="'.get_the_permalink().'">';

					if (has_post_thumbnail()) {
						echo '<picture>';
							echo '<img src="'; ciar_thumb('thumbnail'); echo '" alt="'.get_the_title().'">';
						echo '</picture>';
					}

					get_template_part('inc/loop-resumo');

				echo '</a></div>';
			endwhile;
		}

	    get_template_part('inc/navegacao');

	    $qde_editais = wp_count_posts('uabeditais');
		$qde_editais_publicados = $qde_editais->publish;
		echo '<p><small>'.$qde_editais_publicados; 
			if($qde_editais_publicados == 1) {echo ' edital publicado'; } else {echo ' editais publicados';}
		echo '</small></p>';

	echo '</div>';
	get_sidebar();
echo '</div>';
get_footer(); 
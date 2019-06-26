<?php /* Template Name: Largura grande */
get_header(); 

	if (have_posts()) {
		while (have_posts()) : the_post(); 
			echo '<div class="container paginterna area-util">';
				echo '<article class="coluna-maior">';
					the_content();
				echo '</article>';
			echo '</div>';
		endwhile;
	}

get_footer(); ?>
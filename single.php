<?php get_header(); 

	if (have_posts()) {
		while (have_posts()) : the_post(); 
			echo '<div class="container paginterna">';
			the_content();
			echo '</div>';
		endwhile;
	}

get_footer(); ?>
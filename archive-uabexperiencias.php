<?php
get_header(); 
echo '<div class="container paginterna area-util"><div class="lista-experiencias">';

	$homepageid = get_option('page_on_front');
	if( have_rows('experiencias_texto',$homepageid) ) { while (have_rows('experiencias_texto',$homepageid)) : the_row(); 

		$apresentacao = get_sub_field('apresentacao');
		if ($apresentacao) { echo '<article>'.$apresentacao.'</article>'; }

	endwhile; }

	if (have_posts()) {
		while (have_posts()) : the_post(); 
			
			echo '<div class="item-experiencia">'; 

				echo '<div class="thumb" style="background-image: url('; 
					if (has_post_thumbnail()) { ciar_thumb('medium'); }
					else { echo ciar_primeira_img();  }
				echo ');"></div>';
				echo '<h3>'.get_the_title().'</h3>';
				echo '<a href="'.get_the_permalink().'" class="link"></a>';

			echo '</div>';
		endwhile;
	}

	get_template_part('inc/navegacao');
    $qde_relatos = wp_count_posts('uabexperiencias');
	$qde_relatos_publicados = $qde_relatos->publish;
	echo '<p><small>'.$qde_relatos_publicados; 
		if($qde_relatos_publicados == 1) {echo ' relato divulgado'; } else {echo ' relatos divulgados';}
	echo '</small></p>';

echo '</div></div>';
get_footer(); ?>
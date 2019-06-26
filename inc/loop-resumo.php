<?php
echo '<div class="loop-resumo">';
	echo '<h1>'.get_the_title().'</h1>';
	echo '<time datetime="'.get_the_time('Y-m-d h:i').'">'; 
		echo '<i class="far fa-calendar-check"></i> Publicado em '.get_the_time('d/m/Y');
		$horapublicada = get_the_time('Ymdhi'); 
		$horamodificada = get_the_modified_time('Ymdhi');  
		if ($horamodificada !== $horapublicada) {echo ' <span><i class="far fa-edit"></i> Atualizado em '.get_the_modified_time('d/m/Y').'</span>';}

	echo '</time>';

	echo '<article>'; the_excerpt(); echo '</article>';
echo '</div>';
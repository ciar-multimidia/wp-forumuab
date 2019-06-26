<?php
echo '<div class="navegacao">';
	$voltar = 'Voltar';
	$avancar = 'Próxima página';
    echo get_previous_posts_link($voltar);
	echo get_next_posts_link($avancar);
echo '</div>';
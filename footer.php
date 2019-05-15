<?php 
$footerclass = '';
if(! is_front_page()) { $footerclass = ' class="pagina-interna"'; }

	echo '<footer id="rodape-site"'.$footerclass.'>';
		echo '<div class="container">';
			echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat recusandae in quo commodi facilis ratione quas laborum maiores quos incidunt earum quidem neque';
		echo '</div>';

		echo '<div class="creditos">';
			echo 'Design, desenvolvimento e apoio: <a href="https://www.ciar.ufg.br" title="Ciar UFG">Ciar UFG</a>';
		echo '</div>';
	echo '</footer>';
	
echo '</main>';


wp_footer(); 

echo '</body>';
echo '</html>';
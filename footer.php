<?php 
$footerclass = '';
if(! is_front_page()) { $footerclass = ' class="pagina-interna"'; }

	echo '<footer id="rodape-site"'.$footerclass.'>';
		echo '<div class="container">';
			
			echo '<div class="redes">';
				echo '<a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>';
				echo '<a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>';
			echo '</div>';
			
			echo '<div class="marcas">';
				echo '<img src="'.get_template_directory_uri().'/img/logo-uab.svg">';
				echo '<img src="'.get_template_directory_uri().'/img/logo-capes.svg" style="margin-bottom:9px">';
				echo '<img src="'.get_template_directory_uri().'/img/logo-brasil.svg" style="margin-bottom:9px">';
			echo '</div>';

		echo '</div>';

		echo '<div class="creditos">';
			echo 'Design, desenvolvimento e apoio: <a href="https://www.ciar.ufg.br" title="Ciar UFG">Ciar UFG</a>';
		echo '</div>';
	echo '</footer>';
	
echo '</main>';


wp_footer(); 

echo '</body>';
echo '</html>';
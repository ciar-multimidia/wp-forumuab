<?php /* Template Name: Página Inicial */
get_header();

////////////////////////////////////////////////////////////////////////
echo '<section id="ultimas-novidades" class="container">';

	// NOVIDADES
	echo '<div class="novidades">';

		echo '<aside>';
			echo '<header>';
				echo '<h1>Notícias</h1>';
				echo '<a href="#" class="vermais">ver tudo</a>';
			echo '</header>';

			echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat recusandae in quo commodi facilis ratione quas laborum maiores quos incidunt earum quidem neque';
		echo '</aside>';

		echo '<aside>';
			echo '<header>';
				echo '<h1>Eventos</h1>';
				echo '<a href="#" class="vermais">ver tudo</a>';
			echo '</header>';

			echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat recusandae in quo commodi facilis ratione quas laborum maiores quos incidunt earum quidem neque';
		echo '</aside>';

		echo '<aside>';
			echo '<header>';
				echo '<h1>Editais</h1>';
				echo '<a href="#" class="vermais">ver tudo</a>';
			echo '</header>';

			echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat recusandae in quo commodi facilis ratione quas laborum maiores quos incidunt earum quidem neque';
		echo '</aside>';

	echo '</div>';



	// CHAMADAS BANNERS
	echo '<div class="chamadas">';
		echo '<a href="https://educapes.capes.gov.br/" target="_blank"><img src="https://www.capes.gov.br/images/banners/banner-uab-educapes.png"></a>';
		echo '<a href="https://sisuab2.capes.gov.br/sisuab2/login.xhtml/" target="_blank"><img src="https://www.capes.gov.br/images/banners/04-06-2018-banner-sisuab-uab.jpg"></a>';
		echo '<a href="https://www.capes.gov.br/acolhimento-uab" target="_blank"><img src="https://www.capes.gov.br/images/banners/07062018-banner-acolhimento.jpg"></a>';
		echo '<a href="https://www.capes.gov.br/uab/rea" target="_blank"><img src="https://www.capes.gov.br/images/banner-uab-recursos-educacionais-abertos-unesco2.jpg"></a>';
	echo '</div>';


echo '</section>';


////////////////////////////////////////////////////////////////////////
echo '<section id="experiencias">';
	echo '<div class="container">';

		echo '<div class="video">'; 
			echo '<figure>'; 
				$videodestaque = 'https://www.youtube.com/watch?v=14EyODpXQtg';
				echo ciar_video_youtube($videodestaque);
			echo '</figure>';
		echo '</div>';
		
		echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat recusandae in quo commodi facilis ratione quas laborum maiores quos incidunt earum quidem neque';
	echo '</div>';
echo '</section>';

get_footer();
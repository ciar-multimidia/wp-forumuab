<?php
$permalink = get_the_permalink();
$titulo = get_the_title();
$resumo = get_the_excerpt();
$url = get_bloginfo('url');
$nomesite = get_bloginfo('name');

echo '<aside class="compartilhar">';
	echo '<h2>Compartilhe:</h2>';

	echo '<ul>';
		echo '<li class="facebook"><a onclick="window.open(this.href,this.target,\'width=570,height=400\');return false;" href="http://www.facebook.com/share.php?u='.$permalink.'&amp;t='.$titulo.'"><i class="fab fa-facebook-f"></i></a></li>';
		echo '<li class="linkedin"><a onclick="window.open(this.href,this.target,\'width=570,height=400\');return false;" href="http://www.linkedin.com/shareArticle?mini=true&url='.$permalink.'&title='.$titulo.'&summary='.$resumo.'&source='.$url.'"><i class="fab fa-linkedin-in"></i></a></li>';
		echo '<li class="twitter"><a onclick="window.open(this.href,this.target,\'width=570,height=400\');return false;" href="http://twitter.com/share?text='.$titulo.'&url='.$permalink.'&counturl='.$permalink.'"><i class="fab fa-twitter"></i></a></li>';
		echo '<li class="whatsapp"><a href="whatsapp://send?text='.$permalink.'"><i class="fab fa-whatsapp"></i></a></li>';
		echo '<li class="mail"><a onclick="window.open(this.href,this.target,\'width=670,height=520\');return false;" href="mailto:?subject='.$titulo.', de '.$nomesite.'&amp;body=Acesse: '.$permalink.'"><i class="fas fa-envelope"></i></a></li>';
	echo '</ul>';
echo '</aside>';
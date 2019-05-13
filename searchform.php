<?php

echo '<form method="get" class="busca" action="'.esc_url(home_url('/')).'" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">';
	echo '<input itemprop="query-input" style="margin:0" type="search" name="s" id="s" placeholder="Digite o que procura e clique enter">';
	echo '<input type="hidden" name="post_type" value="post">';
	echo '<input type="submit" style="display: none;" name="" value="Buscar!">';
echo '</form>';
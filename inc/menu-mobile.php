<?php

echo '<div class="canvas" aria-hidden="true">'; 
	echo '<ul>'; 
		  wp_nav_menu ( array( 
		    'theme_location' => 'primary', 
		    'menu' => 'primary', 
		    'container' => '', 
		    'container_class' => '', 
		    'container_id' => '', 
		    'menu_class' => '', 
		    'menu_id' => '', 
		    'echo' => true, 
		    'fallback_cb' => 'wp_page_menu', 
		    'link_before' => '',
		    'link_after' => '',
		    'items_wrap' => '%3$s', 
		    'depth' => 0, 
		    'walker' => '' 
		  )); 	
	echo '</ul>';
echo '</div>';
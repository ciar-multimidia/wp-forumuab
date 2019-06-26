<?php
	// Exit if accessed directly
	if( !defined( 'ABSPATH' ) ) exit;

	$fields = wpforo_profile_fields();
?>

<div class="wpforo-profile-home">

    <div class="wpf-profile-section wpf-mi-section">
        <div class="wpf-table">
            <?php wpforo_fields( $fields ); ?>
        </div>
    </div>

</div>
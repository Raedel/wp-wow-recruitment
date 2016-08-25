<?php
wp_register_style( 'wp_wow_recruitment_css', plugin_dir_url( __FILE__ ) . 'css/wp_wow_recruitment.css' );
wp_enqueue_style('wp_wow_recruitment_css');
?>
<div class="wrap">
<h2>WP WoW Recruitment</h2>
<form method="post" action="options.php">
<?php @settings_fields('wp_wow_recruitment_options'); ?>
<?php @do_settings_fields('wp_wow_recruitment_options'); ?>
<?php do_settings_sections('wp_wow_recruitment'); ?>
<?php @submit_button(); ?>
</form>
</div>

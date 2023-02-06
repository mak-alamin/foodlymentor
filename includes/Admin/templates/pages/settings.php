<div class="wrap">
	<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
	<hr>
	<?php settings_errors(); ?>

	<div class="cart-icon-settings">
		<form action="options.php" method="post">
			<?php
			// output security fields for the registered setting
			settings_fields('foodly_cart_settings');

			do_settings_sections('foodlymentor-settings');

			// output save settings button
			submit_button('Save Settings');
			?>
		</form>
	</div>

	<div class="side-cart-settings">

	</div>
</div>
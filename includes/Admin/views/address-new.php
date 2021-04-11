<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e( 'Add Address', 'ar-academy' ); ?></h1>

	<form action="" method="POST">
		<table class="form-table">
			<tr>
				<td><label for="name">Name</label></td>
				<td><input class="regular-text" type="text" name="name" id="name" > </td>
			</tr>
			<tr>
				<td><label for="address">Address</label></td>
				<td><textarea class="regular-text" name="address" id="address" ></textarea> </td>
			</tr>
			<tr>
				<td><label for="phone">Phone</label></td>
				<td><input class="regular-text" type="text" name="phone" id="phone" > </td>
			</tr>
		</table>
		<?php wp_nonce_field( 'new-address' );?>
		<?php submit_button( __( 'Add Address', 'ar-academy' ), 'primary', 'submit_address' );?>
	</form>
</div>
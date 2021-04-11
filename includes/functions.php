<?php
/**
 * Insert a new address 
 * 
 * @param  array $args
 * 
 * @return int|WP_Error
 */
function ar_ac_insert_address( $args = [] ) {
	global $wpdb;
	
	if( empty( $args['name'] ) ) {
		return new \WP_Error('no-name', __('You must provide a name', 'ar-academy') );
	}
	
	$defaults = [
		'name' => '',
		'address' => '',
		'phone' => '',
		'created_by' => get_current_user_id(),
		'created_at' => current_time( 'mysql' ),
	];
	
	$data = wp_parse_args( $args, $defaults );
	
	$inserted = $wpdb->insert( 
		$wpdb->prefix . 'ac_addresses',
		$data,
		[
			'%s',
			'%s',
			'%s',
			'%d',
			'%s'
		]
	);
	
	if( ! $inserted ) {
		return new \WP_Error('failed-to-insert', __('Failed to insert data', 'ar-academy' ) );
	}
	
	return $wpdb->insert_id;
}
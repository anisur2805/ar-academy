<?php
namespace AR\Academy\Admin;

class Menu {
	public $addressbook;
    public function __construct( $addressbook ) {
		$this->addressbook = $addressbook;
        add_action( 'admin_menu', [$this, 'admin_menu'] );
    }

    public function admin_menu() {
        $parent_slug = 'ar-academy';
        $capability  = 'manage_options';

        add_menu_page( __( 'Academy', 'ar-academy' ), __( 'Academy', 'ar-academy' ), $capability, $parent_slug, [$this->addressbook, 'plugin_page'], 'dashicons-welcome-learn-more' );
        add_submenu_page( $parent_slug, __( 'Address Book', 'ar-academy' ), __( 'Address Book', 'ar-academy' ), $capability, $parent_slug, [$this->addressbook, 'plugin_page'] );
        add_submenu_page( $parent_slug, __( 'Settings', 'ar-academy' ), __( 'Settings', 'ar-settings' ), $capability, 'ar-academy-settings', [$this, 'settings_page'] );
    }


    public function settings_page() {
        echo "Something";
    }
}
<?php
namespace AR\Academy\Admin;

// use AR\Academy\Admin\AddressBook;

class Menu {
    public function __construct() {
        add_action( 'admin_menu', [$this, 'admin_menu'] );
    }

    public function admin_menu() {
        $parent_slug = 'ar-academy';
        $capability  = 'manage_options';

        add_menu_page( __( 'ar Academy', 'ar-academy' ), __( 'Academy', 'ar-academy' ), $capability, $parent_slug, [$this, 'addressbook_page'], 'dashicons-welcome-learn-more' );
        add_submenu_page( $parent_slug, __( 'Address Book', 'ar-academy' ), __( 'Address Book', 'ar-academy' ), $capability, $parent_slug, [$this, 'addressbook_page'] );
        add_submenu_page( $parent_slug, __( 'Settings', 'ar-academy' ), __( 'Settings', 'ar-settings' ), $capability, 'ar-academy-settings', [$this, 'ar_settings'] );
    }

    public function addressbook_page() {
        $addressbook = new AddressBook();
        $addressbook->plugin_page();

    }

    public function ar_settings() {
        echo "Something";
    }
}
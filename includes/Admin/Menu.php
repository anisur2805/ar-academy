<?php
namespace Wedevs\Academy\Admin;

// use Wedevs\Academy\Admin\AddressBook;

class Menu {
    public function __construct() {
        add_action( 'admin_menu', [$this, 'admin_menu'] );
    }

    public function admin_menu() {
        $parent_slug = 'wedevs-academy';
        $capability  = 'manage_options';

        add_menu_page( __( 'Wedevs Academy', 'wedevs-academy' ), __( 'Academy', 'wedevs-academy' ), $capability, $parent_slug, [$this, 'addressbook_page'], 'dashicons-welcome-learn-more' );
        add_submenu_page( $parent_slug, __( 'Address Book', 'wedevs-academy' ), __( 'Address Book', 'wedevs-academy' ), $capability, $parent_slug, [$this, 'addressbook_page'] );
        add_submenu_page( $parent_slug, __( 'Settings', 'wedevs-academy' ), __( 'Settings', 'wedevs-settings' ), $capability, 'wedevs-academy-settings', [$this, 'wedevs_settings'] );
    }

    public function addressbook_page() {
        $addressbook = new AddressBook();
        $addressbook->plugin_page();

    }

    public function wedevs_settings() {
        echo "Something";
    }
}
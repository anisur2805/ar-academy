<?php
namespace AR\Academy;

class Admin {
    public function __construct() {
        $this->dispatch_actions();
        new Admin\Menu();
    }

    public function dispatch_actions() {
        $addressbook = new Admin\AddressBook();
        add_action( 'admin_init', [$addressbook, 'form_handler'] );
    }

}
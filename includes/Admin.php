<?php
namespace AR\Academy;

class Admin {
    public function __construct() {
		$addressbook = new Admin\AddressBook();
		
        $this->dispatch_actions( $addressbook );
        new Admin\Menu( $addressbook );
    }

    public function dispatch_actions( $addressbook ) {
        add_action( 'admin_init', [ $addressbook, 'form_handler' ] );
    }

}
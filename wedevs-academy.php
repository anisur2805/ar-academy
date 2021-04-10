<?php
/**
 * Plugin Name:       WeDevs Academy
 * Plugin URI:        https://example.com/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Anisur Rahman
 * Author URI:        https://anisur-rahman.xyz/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wedevs-academy
 * Domain Path:       /languages
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Wedevs_Academy {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * class Constructor
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [$this, 'activate'] );

        add_action( 'plugins_loaded', [$this, 'init_plugin'] );
    }

    /**
     * Initialize a singleton instance
     *
     * @return \Wedevs_Academy
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'WD_ACADEMY_VERSION', self::version );
        define( 'WD_ACADEMY_FILE', __FILE__ );
        define( 'WD_ACADEMY_PATH', __DIR__ );
        define( 'WD_ACADEMY_URL', plugins_url( '', WD_ACADEMY_FILE ) );
        define( 'WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {
        if ( is_admin() ) {
            new Wedevs\Academy\Admin();
        } else {
            new Wedevs\Academy\Frontend();
        }
    }

    /**
     * Do stuff upon plugin activated
     *
     * @return void
     */
    public function activate() {
        $installer = new Wedevs\Academy\Installer();
        $installer->run();
    }
}

/**
 * Initialize the main plugin
 *
 * @return \Wedevs_Academy
 */
function wedevs_academy() {
    return Wedevs_Academy::init();
}

// Kick-off the plugin
wedevs_academy();
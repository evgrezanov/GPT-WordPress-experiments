<?php
/*
Plugin Name: GPT Experimental Plugin
Description: A simple plugin to demonstrate creating a settings page in WordPress.
Author: Your Name
Author URI: Your website URL
Version: 1.0
*/

class WP_Settings_Page {
    
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
    }
    
    public function add_settings_page() {
        add_options_page(
            'GPT Experimental Plugin Settings Page',
            'GPT Experimental Plugin',
            'manage_options',
            'gpt-experimental-plugin-settings',
            array( $this, 'render_settings_page' )
        );
    }
    
    public function register_settings() {
        register_setting( 'gpt-experimental-plugin-settings-group', 'field_1' );
        register_setting( 'gpt-experimental-plugin-settings-group', 'field_2' );
        register_setting( 'gpt-experimental-plugin-settings-group', 'field_3' );
    }
    
    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1>GPT Experimental Plugin Settings Page</h1>
            <form method="post" action="options.php">
                <?php settings_fields( 'gpt-experimental-plugin-settings-group' ); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Field 1</th>
                        <td><input type="text" name="field_1" value="<?php echo esc_attr( get_option( 'field_1' ) ); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Field 2</th>
                        <td><input type="text" name="field_2" value="<?php echo esc_attr( get_option( 'field_2' ) ); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Field 3</th>
                        <td><input type="text" name="field_3" value="<?php echo esc_attr( get_option( 'field_3' ) ); ?>" /></td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
    
}

new WP_Settings_Page();


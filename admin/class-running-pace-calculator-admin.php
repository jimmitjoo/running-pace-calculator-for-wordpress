<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Running_Pace_Calculator
 * @subpackage Running_Pace_Calculator/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Running_Pace_Calculator
 * @subpackage Running_Pace_Calculator/admin
 * @author     Your Name <email@example.com>
 */
class Running_Pace_Calculator_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $running_pace_calculator The ID of this plugin.
     */
    private $running_pace_calculator;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * @since   1.0.0
     * @access  private
     * @var     array $options Array of options for this plugin.
     */
    private $options;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $running_pace_calculator The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($running_pace_calculator, $version)
    {

        $this->running_pace_calculator = $running_pace_calculator;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Running_Pace_Calculator_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Running_Pace_Calculator_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->running_pace_calculator, plugin_dir_url(__FILE__) . 'css/running-pace-calculator-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Running_Pace_Calculator_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Running_Pace_Calculator_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->running_pace_calculator, plugin_dir_url(__FILE__) . 'js/running-pace-calculator-admin.js', array('jquery'), $this->version, false);

    }

    /**
     * Register an options page and a menu item for that page
     */
    public function menu_pages()
    {
        add_menu_page(__('RPC Settings', 'running-pace-calculator'), __('RPC Settings', 'running-pace-calculator'), 'manage_options', 'running-pace-calculator-setting-admin', [$this, 'options_page']);
        add_options_page(__('RPC Settings', 'running-pace-calculator'), __('RPC Settings', 'running-pace-calculator'), 'manage_options', 'running-pace-calculator-setting-admin', [$this, 'options_page']);
    }

    /**
     * The markup for the options page
     */
    public function options_page()
    {
        $this->options = get_option('running_pace_calculator_metric');
        ?>
        <div class="wrap">

            <h1><?php echo __('Running Pace Calculator!', 'running-pace-calculator'); ?></h1>

            <form method="post" action="options.php">
                <?php settings_fields('running_pace_calculator_group'); ?>
                <?php do_settings_sections('running-pace-calculator-setting-admin'); ?>
                <?php submit_button(); ?>
            </form>

            <section>
                <p>To display this calculator on your website, simply use this shortcode: <code>[running-pace-calculator]</code>.</p>
            </section>

        </div>
        <?php
    }

    public function settings_init()
    {
        register_setting('running_pace_calculator_group', 'running_pace_calculator_metric', [$this, 'sanitize']);

        add_settings_section(
            'running_pace_calculator_primary_section', // ID
            __('Running Pace Calculator Settings', 'running-pace-calculator'), // Title
            array($this, 'settings_description'), // Callback
            'running-pace-calculator-setting-admin' // Page
        );

        add_settings_field(
            'metric', // ID
            __('Default metric', 'running-pace-calculator'), // Title
            array($this, 'settings_metric_input'), // Callback
            'running-pace-calculator-setting-admin', // Page
            'running_pace_calculator_primary_section' // Section
        );
    }

    public function settings_description()
    {
        return 'Enter your settings below...';
    }

    public function settings_metric_input()
    {
        $this->options = get_option('running_pace_calculator_metric');
        ?>
        <div>
            <input type="radio" id="metric_km" name="running_pace_calculator_metric[metric]" value="km"
                <?php if (isset($this->options['metric']) && $this->options['metric'] == 'km') : echo 'checked'; endif; ?>
            >

            <label for="metric_km"><?php echo __('Kilometers', 'running-pace-calculator'); ?></label>
        </div>

        <div>
            <input type="radio" id="metric_miles" name="running_pace_calculator_metric[metric]" value="m"
                <?php if (isset($this->options['metric']) && $this->options['metric'] == 'm') : echo 'checked'; endif; ?>
            >
            <label for="metric_miles"><?php echo __('Miles', 'running-pace-calculator'); ?></label>
        </div>
        <?php
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     * @return array
     */
    public function sanitize($input)
    {
        $new_input = array();
        if (isset($input['metric']))
            $new_input['metric'] = sanitize_text_field($input['metric']);

        return $new_input;
    }

}

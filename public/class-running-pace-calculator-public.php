<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Running_Pace_Calculator
 * @subpackage Running_Pace_Calculator/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Running_Pace_Calculator
 * @subpackage Running_Pace_Calculator/public
 * @author     Your Name <email@example.com>
 */
class Running_Pace_Calculator_Public
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
     * The plugin options.
     *
     * @since    1.0.0
     * @access   private
     * @var      array $options
     */
    private $options;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $running_pace_calculator The name of the plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($running_pace_calculator, $version)
    {

        $this->running_pace_calculator = $running_pace_calculator;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
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

        wp_enqueue_style($this->running_pace_calculator, plugin_dir_url(__FILE__) . 'css/running-pace-calculator-public.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
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

        wp_enqueue_script($this->running_pace_calculator, plugin_dir_url(__FILE__) . 'js/running-pace-calculator-public.js', array('jquery'), $this->version, false);

    }

    public function component_dom()
    {
        $this->options = get_option('running_pace_calculator_metric');
        ?>
        <div id="running-pace-calculator-component" data-metric="<?php if (isset($this->options['metric'])) : echo $this->options['metric']; endif; ?>">
            <h3><?php echo __('Calculate Your Running Pace', 'running-pace-calculator'); ?></h3>
            <p><?php echo __('Enter the duration and distance of your run.', 'running-pace-calculator'); ?></p>
            <fieldset class="time">
                <legend><?php echo __('Duration', 'running-pace-calculator'); ?></legend>

                <div class="flex">
                    <div>
                        <label for="hours"><?php echo __('Hours', 'running-pace-calculator'); ?></label>
                        <input type="number" min="0" max="999" step="1" id="hours" name="hours" placeholder="0">
                    </div>

                    <div>
                        <label for="minutes"><?php echo __('Minutes', 'running-pace-calculator'); ?></label>
                        <input type="number" min="0" max="59" step="1" id="minutes" name="minutes" placeholder="0"
                               value="34">
                    </div>

                    <div>
                        <label for="seconds"><?php echo __('Seconds', 'running-pace-calculator'); ?></label>
                        <input type="number" min="0" max="59" step="1" id="seconds" name="seconds" placeholder="0">
                    </div>
                </div>

            </fieldset>

            <div class="distance">
                <label for="distance"><?php echo __('Distance', 'running-pace-calculator'); ?>
                    <input type="number" min="0" max="9999" id="distance" name="distance" placeholder="10" value="10">
                    <?php if (isset($this->options['metric']) && $this->options['metric'] == 'km') : ?>
                        <span>kilometers</span>
                    <?php else : ?>
                        <span>miles</span>
                    <?php endif; ?>
                </label>

                <div>
                    <button id="mathonDistance">Marathon</button>
                    <button id="halfMarathonDistance">Half marathon</button>
                    <button id="tenKilometersDistance">10K</button>
                </div>
            </div>

            <fieldset class="pace">
                <legend><?php echo __('Pace', 'running-pace-calculator'); ?></legend>

                <div class="flex">
                    <span id="pace_hours"></span>
                    <span id="pace_minutes"></span>
                    <span id="pace_seconds"></span>
                    <?php if (isset($this->options['metric']) && $this->options['metric'] == 'km') : ?>
                        <span>/km</span>
                    <?php else : ?>
                        <span>/mile</span>
                    <?php endif; ?>
                </div>

            </fieldset>
        </div>
        <?php
    }

}

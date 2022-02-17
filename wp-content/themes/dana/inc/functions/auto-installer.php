<?php
/* Install All Plugins Automatically */
add_action('tgmpa_register', 'dana_news_required_plugins');
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function dana_news_required_plugins()
{
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name' => 'افزونه تنظیمات قالب', // The plugin name.
            'slug' => 'redux-framework', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        array(
            'name' => 'افزونه ادیتور کلاسیک', // The plugin name.
            'slug' => 'classic-editor', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        array(
            'name' => 'افزونه ادیتور پیشرفته', // The plugin name.
            'slug' => 'tinymce-advanced', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),

        array(
            'name' => 'افزونه شمسی ساز وردپرس', // The plugin name.
            'slug' => 'wp-parsidate', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),
		array(
            'name' => 'افزونه فرم تماس', // The plugin name.
            'slug' => 'contact-form-7', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        /*array(
            'name' => 'اوقات شرعی', // The plugin name.
            'slug' => 'azan', // The plugin slug (typically the folder name).
            'source' => get_stylesheet_directory() . '/lib/plugins/azan.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),*/

    );

    tgmpa($plugins, $config);
}
<?php
/**
 * @package RobotsTxt\Extender
 * @author Humberto "Betto" Adami
 * @link https://www.linkedin.com/in/bettoadami/
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version 1.0.0
 */
/*
 Plugin Name: Robots.txt Extender
 Description: A Multisite Network plugin that removes the automatic sitemap link (deprecated practice) and adds custom parameters/lines at the end of the default Robots.txt whenever called. It will enable small adjustments for each site on the network - like pointing again to specific sitemaps if needed - without sacrificing the default conventions coded to WordPress' core. To make the adjustments, look for a text area at the end of General Settings Page.
 Tags: robotstxt, robots.txt, robots, crawler, spiders, virtual, search, google, seo, plugin, network, wpmu, multisite
 Version: 1.0.0
 License: GPLv3 or later
 Author: Humberto "Betto" Adami
 Author URI: https://www.linkedin.com/in/bettoadami/
*/

/** Verify if WordPress is not running. */
if(!defined('ABSPATH')){
    exit;
}

/** Verify if the request comes from outside the application. */
if(!function_exists('add_action')){
	exit;
}

/**
 * robotsTxtExtender__init
 * 
 * Add the new options to the end of General Settings page.
 *
 * @return void
 */
function robotsTxtExtender__init() {
    add_settings_section(
        'robotsTxtExtender_settingsSection',
        'Robots.txt Extender',
        'robotsTxtExtender_settingsSectionCallback',
        'general'
    );
    add_settings_field(
        'robotsTxtExtender_settingsCode',
        'Adicione parâmetros que farão parte das últimas linhas do robots.txt padrão.',
        'robotsTxtExtender_settingsCallback',
        'general',
        'robotsTxtExtender_settingsSection'
    );
    register_setting( 'general', 'robotsTxtExtender_settingsCode' );
}

/**
 * robotsTxtExtender_settingsSectionCallback
 * 
 * Add a summary for the setting.
 *
 * @return void
 */
function robotsTxtExtender_settingsSectionCallback() {
    echo '<p>Escreva instruções que complementarão o robots.txt quando solicitado.</p>';
}

/**
 * robotsTxtExtender_settingsCallback
 * 
 * Add an input for data setting.
 *
 * @return void
 */
function robotsTxtExtender_settingsCallback() {
    echo '<textarea name="robotsTxtExtender_settingsCode" id="robotsTxtExtender_settingsCode" class="code"'
    .'rows="20" cols="80"'
    .'placeholder="'."#Exemplo\nSitemap: https://domain.tld/sitemap.xml".'">'
    .get_option('robotsTxtExtender_settingsCode')
    .'</textarea>';
}

/**
 * robotsTxtExtender_parameters
 * 
 * Add the user settings to the end of robots.txt values whenever those are requested.
 *
 * @param  mixed $output
 * @param  mixed $public
 * @return void
 */
function robotsTxtExtender_parameters($output, $public) {
    if ( $public ) {
        $output = preg_replace('/(Sitemap\:).(\w).*$/i', get_option('robotsTxtExtender_settingsCode'), $output);
    }
    return $output;
}

/**
 * Hook all the functions to Wordpress
 */
add_action('admin_init', 'robotsTxtExtender__init');
add_filter('robots_txt', 'robotstxtextender_parameters', 10, 2);
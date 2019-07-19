<?php
/**
* Plugin Name: 				CPO Companion
* Description: 				Creates Post Types, Shortcodes and Widgets in order to create a powerful business website.
* Version: 					1.0.2
* Author: 					MachoThemes
* Author URI: 				https://www.machothemes.com/
* Requires: 				4.6 or higher
* License: 					GPLv3 or later
* License URI:       		http://www.gnu.org/licenses/gpl-3.0.html
* Requires PHP: 			5.6
*
* Copyright 2018-2019 		MachoThemes 		office@machothemes.com
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License, version 3, as
* published by the Free Software Foundation.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


define( 'CPO_COMPANION_ASSETS', plugins_url( 'assets/', __FILE__ ) );
define( 'CPO_COMPANION_PATH', plugin_dir_path( __FILE__ ) );

require CPO_COMPANION_PATH . 'includes/functions.php';

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require CPO_COMPANION_PATH . 'includes/class-cpo-companion.php';

function run_cpo_companion() {
	$plugin = new CPO_Companion();
}
run_cpo_companion();

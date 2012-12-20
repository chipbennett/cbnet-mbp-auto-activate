<?php
/*
 * Plugin Name:   cbnet MBP Auto-Activate
 * Plugin URI:    http://www.chipbennett.net/wordpress/plugins/cbnet-mbp-auto-activate/
 * Description:   Automatically activate MaxBlogPress plugins, without registering and without subscribing to the MaxBlogPress email list.
 * Version:       1.2
 * Author:        chipbennett
 * Author URI:    http://www.chipbennett.net/
 *
 * License:       GNU General Public License, v2 (or newer)
 * License URI:  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * Thanks to andreasnrb for his assistance (and patience)
 * with this plugin. And thanks also to all the other fine folks at  the
 * WPTavern Forum (http://www.wptavern.com/forum) for their help.
 */
 
/**
 * Load Plugin textdomain
 */
function cbnetmbpauto_load_textdomain() {
	load_plugin_textdomain( 'cbnetmbpauto', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
// Load Plugin textdomain
add_action( 'plugins_loaded', 'cbnetmbpauto_load_textdomain' );

/**
 * cbnetMBPauto - cbnet MBP Auto-Activate Class
 * Holds all the necessary functions and variables
 */
class cbnetmbpauto 
{
	/**
	 * Constructor. Adds cbnet MBP Auto-Update plugin's actions/filters.
	 * @access public
	 */
	function cbnetmbpauto() { 
	
		// Define an array containing the prefixes for all MaxBlogPress plugins:
		$this->cbnetmbpautoPrefixes = array( 'dppp', 'mdw', 'mup', 'mpo', 'msa', 'ps', 'mfi', 'spl', 'mban', 'dpc', 'mcn', 'ofa', 'fpbc', 'adr', 'ffr', 'mbp_lmw', 'mbp_ba', 'mbp_apl', 'mbpri', 'abc', 'captcha', 'mbp_alt', 'mbp_io', 'rc', 'mbp_po', 'mbp_pi', 'mbp_plbc', 'mbp_el' );
		
		// Define arrays for each plugin, with the following values: name, prefix, installed state
		$this->cbnetmbpauto_dppp = array( 'plugin' => 'different-posts-per-page', 'pluginname' => __( 'Different Posts Per Page', 'cbnetmbpauto' ), 'prefix' => 'dppp', 'installed' => 'false' );
		$this->cbnetmbpauto_mdw = array( 'plugin' => 'dealdotcom-widget-54', 'pluginname' => __( 'DealDotCom Widget', 'cbnetmbpauto' ), 'prefix' => 'mdw', 'installed' => 'false' );
		$this->cbnetmbpauto_mup = array( 'plugin' => 'maxblogpress-unblockable-popup', 'pluginname' => __( 'Unblockable Popup', 'cbnetmbpauto' ), 'prefix' => 'mup', 'installed' => 'false' );
		$this->cbnetmbpauto_mpo = array( 'plugin' => 'maxblogpress-ping-optimizer', 'pluginname' => __( 'Ping Optimizer', 'cbnetmbpauto' ), 'prefix' => 'mpo', 'installed' => 'false' );
		$this->cbnetmbpauto_msa = array( 'plugin' => 'maxblogpress-stripe-ad', 'pluginname' => __( 'Stripe Ad', 'cbnetmbpauto' ), 'prefix' => 'msa', 'installed' => 'false' );
		$this->cbnetmbpauto_ps = array( 'plugin' => 'psychic-search', 'pluginname' => __( 'Psychic Search', 'cbnetmbpauto' ), 'prefix' => 'ps', 'installed' => 'false' );
		$this->cbnetmbpauto_mfi = array( 'plugin' => 'maxblogpress-favicon', 'pluginname' => __( 'Favicon', 'cbnetmbpauto' ), 'prefix' => 'mfi', 'installed' => 'false' );
		$this->cbnetmbpauto_spl = array( 'plugin' => 'seo-post-link', 'pluginname' => __( 'SEO Post Link', 'cbnetmbpauto' ), 'prefix' => 'spl', 'installed' => 'false' );
		$this->cbnetmbpauto_mban = array( 'plugin' => 'max-banner-ads', 'pluginname' => __( 'Banner Ads', 'cbnetmbpauto' ), 'prefix' => 'mban', 'installed' => 'false' );
		$this->cbnetmbpauto_dpc = array( 'plugin' => 'duplicate-post-checker', 'pluginname' => __( 'Duplicate Post Checker', 'cbnetmbpauto' ), 'prefix' => 'dpc', 'installed' => 'false' );
		$this->cbnetmbpauto_mcn = array( 'plugin' => 'multi-author-comment-notification', 'pluginname' => __( 'Multi Author Comment Notification', 'cbnetmbpauto' ), 'prefix' => 'mcn', 'installed' => 'false' );
		$this->cbnetmbpauto_ofa = array( 'plugin' => 'maxblogpress-optin-form-adder', 'pluginname' => __( 'Optin Form Adder', 'cbnetmbpauto' ), 'prefix' => 'ofa', 'installed' => 'false' );
		$this->cbnetmbpauto_fpbc = array( 'plugin' => 'front-page-by-category', 'pluginname' => __( 'Front Page By Category', 'cbnetmbpauto' ), 'prefix' => 'fpbc', 'installed' => 'false' );
		$this->cbnetmbpauto_adr = array( 'plugin' => 'adsense-deluxe-revisited', 'pluginname' => __( 'AdSense Deluxe Revisited', 'cbnetmbpauto' ), 'prefix' => 'adr', 'installed' => 'false' );
		$this->cbnetmbpauto_ffr = array( 'plugin' => 'flash-fader-revived', 'pluginname' => __( 'Flash Fader Revived', 'cbnetmbpauto' ), 'prefix' => 'ffr', 'installed' => 'false' );
		$this->cbnetmbpauto_mbp_lmw = array( 'plugin' => 'links-manage-widget', 'pluginname' => __( 'Links Manage Widget', 'cbnetmbpauto' ), 'prefix' => 'mbp_lmw', 'installed' => 'false' );
		$this->cbnetmbpauto_mbp_ba = array( 'plugin' => 'banner-ads', 'pluginname' => __( 'Banner Ads', 'cbnetmbpauto' ), 'prefix' => 'mbp_ba', 'installed' => 'false' );
		$this->cbnetmbpauto_mbp_apl = array( 'plugin' => 'ajax-post-listing', 'pluginname' => __( 'Ajax Post Listing', 'cbnetmbpauto' ), 'prefix' => 'mbp_apl', 'installed' => 'false' );
		$this->cbnetmbpauto_mbpri = array( 'plugin' => 'random-image', 'pluginname' => __( 'Random Image', 'cbnetmbpauto' ), 'prefix' => 'mbpri', 'installed' => 'false' );
		$this->cbnetmbpauto_abc = array( 'plugin' => 'access-by-category', 'pluginname' => __( 'Access By Category', 'cbnetmbpauto' ), 'prefix' => 'abc', 'installed' => 'false' );
		$this->cbnetmbpauto_captcha = array( 'plugin' => 'captcha-for-comment', 'pluginname' => __( 'Captcha For Comment', 'cbnetmbpauto' ), 'prefix' => 'captcha', 'installed' => 'false' );
		$this->cbnetmbpauto_mbp_alt = array( 'plugin' => 'affiliate-image-tracker', 'pluginname' => __( 'Affiliate Image Tracker', 'cbnetmbpauto' ), 'prefix' => 'mbp_alt', 'installed' => 'false' );
		$this->cbnetmbpauto_mbp_io = array( 'plugin' => 'image-organizer', 'pluginname' => __( 'Image Organizer', 'cbnetmbpauto' ), 'prefix' => 'mbo_io', 'installed' => 'false' );
		$this->cbnetmbpauto_rc = array( 'plugin' => 'easy-custom-fields', 'pluginname' => __( 'Easy Custom Fields', 'cbnetmbpauto' ), 'prefix' => 'rc', 'installed' => 'false' );
		$this->cbnetmbpauto_mbp_po = array( 'plugin' => 'post-ordering', 'pluginname' => __( 'Post Ordering', 'cbnetmbpauto' ), 'prefix' => 'mbp_po', 'installed' => 'false' );
		$this->cbnetmbpauto_mbp_pi = array( 'plugin' => 'post-image', 'pluginname' => __( 'Post Image', 'cbnetmbpauto' ), 'prefix' => 'mbp_pi', 'installed' => 'false' );
		$this->cbnetmbpauto_mbp_plbc = array( 'plugin' => 'posts-list-by-category', 'pluginname' => __( 'Posts List By Category', 'cbnetmbpauto' ), 'prefix' => 'mbp_plbc', 'installed' => 'false' );
		$this->cbnetmbpauto_mbp_el = array( 'plugin' => 'excerpt-listing', 'pluginname' => __( 'Excerpt Listing', 'cbnetmbpauto' ), 'prefix' => 'mbp_el', 'installed' => 'false' );
		
		// Hooks - codex: http://codex.wordpress.org/Plugin_API
		register_activation_hook( __FILE__, array( $this, 'cbnetmbpautoActivate' ) );
		add_action('admin_init', array(&$this, 'cbnetmbpautoUpdateOptions')); 
		add_action('admin_menu', array(&$this, 'cbnetmbpautoAddMenu')); 
		add_filter('plugin_action_links_'.plugin_basename(__FILE__), array($this, 'cbnetmbpauto_actlinks'), 10, 1 );
	}
	
	/**
	 * Called when plugin is activated and when an Admin page is loaded. Adds option value to the options table.
	 */
	function cbnetmbpautoActivate() {
		cbnetmbpautoUpdateOptions();
		return true;
	}
	
	/**
	 * Updates xyz_activate option for installed MBP plugins
	 */
	function cbnetmbpautoUpdateOptions() {
		// pull in the array of prefixes from the Constructor
		$prefixes = $this->cbnetmbpautoPrefixes;
		// check for each plugin
		foreach($prefixes as $prefix) {  
           // sets $key to 'xyz_activate' - which is the variable each plugin uses
		   $key=$prefix.'_activate';  
			// set 'xyz_activate' value to '2' ("activated")
			update_option( $key, '2'); 
		}
	}
	
	/**
	 * Adds "cbnet MBP Auto-Activate" link to admin Options menu
	 */
	function cbnetmbpautoAddMenu() {
		// codex: http://codex.wordpress.org/Adding_Administration_Menus
		add_options_page('cbnet MBP Auto-Activate', __( 'cbnet MBP Auto-Activate', 'cbnetmbpauto' ), 'manage_options', 'cbnet-mbp-auto-activate', array(&$this, 'cbnetmbpautoOptionsPg'));
		// Using get_plugin_page_hook
		$cbnetmbpautohook = get_plugin_page_hook('cbnet-mbp-auto-activate', 'options-general.php');
		add_action("admin_head-$cbnetmbpautohook", array(&$this, 'cbnetmbpauto_css'));
	}

	/**
	 * Adds "Settings" link to Plugin Action links on Manage Plugins page
	 */
	function cbnetmbpauto_actlinks( $links ) {
		$cbnetpo_settings_link = '<a href="options-general.php?page=cbnet-mbp-auto-activate">' . __( 'Settings', 'cbnetmbpauto' ) . '</a>'; 
		$links[] = $cbnetpo_settings_link;
		return $links; 
	}
	
	/**
	 * Displays the page content for "cbnet MBP Auto-Update" Options submenu
	 * Carries out all the operations in Options page
	 */
	function cbnetmbpautoOptionsPg() {
			// codex: http://codex.wordpress.org/Creating_Options_Pages
			?>
			
			<div class="wrap">
			 <h2><?php _e( 'MaxBlogPress Plugins - Status', 'cbnetmbpauto' ); ?></h2>
			 
			<table id="cbnetmbpauto">
			<tr>
				<th style="width:400px;"><?php _e( 'Plugin Name', 'cbnetmbpauto' ); ?></th>
				<th style="width:150px;"><?php _e( 'Install State', 'cbnetmbpauto' ); ?></th>
				<th style="width:200px;"><?php _e( 'MBP Activation State', 'cbnetmbpauto' ); ?></th>
			</tr>
			<?php
				// pull in the array of prefixes from the Constructor
				$prefixes = $this->cbnetmbpautoPrefixes;
				// check for each plugin
				foreach($prefixes as $prefix) { 
					//  return value for cbnetmbpauto_xyz['pluginname'] (plugin name)
					$pluginname = $this->{'cbnetmbpauto_'.$prefix}['pluginname']; 
					// is plugin installed?
					$pluginslug = $this->{'cbnetmbpauto_'.$prefix}['plugin'];
					$pluginpath = $pluginslug.'/'.$pluginslug.'.php';
					$pluginactive = is_plugin_active( $pluginpath);
					// if plugin is installed, set the installed state to "true" in plugin array
					$this->{'cbnetmbpauto_'.$prefix}['installed'] =  ( $pluginactive ? 'true' : 'false'); 
					//  return value for cbnetmbpauto_xyz['installed'] (installed state) - "true" or "false"
					$installed = $this->{'cbnetmbpauto_'.$prefix}['installed']; 
					// if $installed = true, 'Installed', else 'Not Installed'
					$installedtxt = ( $installed == 'true' ? __( 'Installed', 'cbnetmbpauto' ) : __( 'Not Installed', 'cbnetmbpauto' ) ); 
					// set $key to 'xyz_activate' - which is the variable each plugin uses
					$key = $prefix.'_activate';
					// return value for 'xyz_activate; - '2' = activated, 'false' = not installed
					$keyval = get_option($key);
					$value = ($keyval ? $keyval : 'null');
					// if $value = false, 'N/A', else 'Activated'
					$state = ($installed == 'true' ? __( 'Activated', 'cbnetmbpauto' ) : __( 'N/A', 'cbnetmbpauto' ) ); 
					$emphasis = ( $installed  == 'true' ? ' class="cbnetmbpautoinstalled"' : '');
					?>
						<tr>
							<td<?php echo $emphasis; ?> style="text-align:left;"><?php _e( 'MaxBlogPress', 'cbnetmbpauto' ); ?> <?php echo $pluginname; ?> <?php _e( 'plugin', 'cbnetmbpauto' ); ?></td>
							<td<?php echo $emphasis; ?>><?php echo $installedtxt; ?></td>
							<td<?php echo $emphasis; ?>><?php echo $state; ?></td>
						</tr>
						<?php }
				?>
				</table>
			</div>
			<?php
		}
	
	function cbnetmbpauto_css() {
		
		echo "
		<style type='text/css'>
		.wrap #cbnetmbpauto {
			padding:0;
			margin:0;
			text-align:center;
			border:1px solid black;
			border-collapse: collapse;
			font-size:8pt;
		}
		.wrap #cbnetmbpauto tr {
			padding:0;
			margin:0;
			text-align:center;
		}
		.wrap #cbnetmbpauto th {
			font-weight:bold;
			background-color:silver;
			text-align:center;
			border-bottom:1px solid black;
		}
		.wrap #cbnetmbpauto td {
			padding:3px;
			margin:0;
			border-bottom:1px solid silver;
			border-spacing:0;
			text-align:center;
			font-size:7pt;
		}
		.wrap #cbnetmbpauto td.cbnetmbpautoinstalled {
			font-weight: bold;
			color: blue;
			background-color: #ddd;
		}
		</style>
		";
	}
	
} // Eof Class

$cbnetmbpauto = new cbnetmbpauto();
?>
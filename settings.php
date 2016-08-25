<?php
if(!class_exists('WP_WoW_Recruitment_Settings'))
{
class WP_WoW_Recruitment_Settings
{
/**
* Construct the plugin object
*/
public function __construct()
{
// register actions
add_action('admin_init', array(&$this, 'admin_init'));
add_action('admin_menu', array(&$this, 'add_menu'));
} // END public function __construct
/**
* hook into WP's admin_init action hook
*/
public function admin_init()
{

// add your settings section
add_settings_section(
'wp_wow_recruitment-section',
'Currently Recruiting',
array(&$this, 'intro_section_wp_wow_recruitment'),
'wp_wow_recruitment'
);

add_settings_section(
'wp_wow_recruitment-settings-section',
'Settings',
array(&$this, 'settings_section_wp_wow_recruitment'),
'wp_wow_recruitment'
);

// add your setting's fields
add_settings_field(
'deathknight',
'Deathknight',
array(&$this, 'class_spec_selection'),
'wp_wow_recruitment',
'wp_wow_recruitment-section',
array(
'class' => 'deathknight',
'specs' => array(
		'spec1' => 'blood',
		'spec2' => 'frost',
		'spec3' => 'unholy'
		)
)
);

add_settings_field(
'druid',
'Druid',
array(&$this, 'class_spec_selection'),
'wp_wow_recruitment',
'wp_wow_recruitment-section',
array(
'class' => 'druid',
'specs' => array(
		'spec1' => 'guardian',
		'spec2' => 'feral',
		'spec3' => 'balance',
		'spec4' => 'restoration'
		)
)
);

add_settings_field(
'hunter',
'Hunter',
array(&$this, 'class_spec_selection'),
'wp_wow_recruitment',
'wp_wow_recruitment-section',
array(
'class' => 'hunter',
'specs' => array(
		'spec1' => 'beastmastery',
		'spec2' => 'marksmanship',
		'spec3' => 'survival'
		)
)
);

add_settings_field(
'mage',
'Mage',
array(&$this, 'class_spec_selection'),
'wp_wow_recruitment',
'wp_wow_recruitment-section',
array(
'class' => 'mage',
'specs' => array(
		'spec1' => 'frost',
		'spec2' => 'arcane',
		'spec3' => 'fire'
		)
)
);

add_settings_field(
'monk',
'Monk',
array(&$this, 'class_spec_selection'),
'wp_wow_recruitment',
'wp_wow_recruitment-section',
array(
'class' => 'monk',
'specs' => array(
		'spec1' => 'brewmaster',
		'spec2' => 'windwalker',
		'spec3' => 'mistweaver'
		)
)
);

add_settings_field(
'paladin',
'Paladin',
array(&$this, 'class_spec_selection'),
'wp_wow_recruitment',
'wp_wow_recruitment-section',
array(
'class' => 'paladin',
'specs' => array(
		'spec1' => 'protection',
		'spec2' => 'retribution',
		'spec3' => 'holy'
		)
)
);

add_settings_field(
'priest',
'Priest',
array(&$this, 'class_spec_selection'),
'wp_wow_recruitment',
'wp_wow_recruitment-section',
array(
'class' => 'priest',
'specs' => array(
		'spec1' => 'shadow',
		'spec2' => 'discipline',
		'spec3' => 'holy'
		)
)
);

add_settings_field(
'rogue',
'Rogue',
array(&$this, 'class_spec_selection'),
'wp_wow_recruitment',
'wp_wow_recruitment-section',
array(
'class' => 'rogue',
'specs' => array(
		'spec1' => 'assassination',
		'spec2' => 'combat',
		'spec3' => 'subtlety'
		)
)
);

add_settings_field(
'shaman',
'Shaman',
array(&$this, 'class_spec_selection'),
'wp_wow_recruitment',
'wp_wow_recruitment-section',
array(
'class' => 'shaman',
'specs' => array(
		'spec1' => 'elemental',
		'spec2' => 'enhancement',
		'spec3' => 'restoration'
		)
)
);

add_settings_field(
'warlock',
'Warlock',
array(&$this, 'class_spec_selection'),
'wp_wow_recruitment',
'wp_wow_recruitment-section',
array(
'class' => 'warlock',
'specs' => array(
		'spec1' => 'affliction',
		'spec2' => 'demonology',
		'spec3' => 'destruction'
		)
)
);

add_settings_field(
'warrior',
'Warrior',
array(&$this, 'class_spec_selection'),
'wp_wow_recruitment',
'wp_wow_recruitment-section',
array(
'class' => 'warrior',
'specs' => array(
		'spec1' => 'protection',
		'spec2' => 'arms',
		'spec3' => 'fury'
		)
)
);

add_settings_field(
'icon-size',
'Icon Size',
array(&$this, 'class_icon_size'),
'wp_wow_recruitment',
'wp_wow_recruitment-settings-section',
array(
'sizes' => array(
	        'small' => '16',
		'default' => '25',
	        'large' => '36'
	        )  
)
);

add_settings_field(
'icon-grayscale',
'Gray out un-needed specializations?',
array(&$this,'class_icon_grayscale'),
'wp_wow_recruitment',
'wp_wow_recruitment-settings-section'
);

add_settings_field(
'icon-class',
'Show class icon?',
array(&$this,'class_icon_show'),
'wp_wow_recruitment',
'wp_wow_recruitment-settings-section'
);
register_setting('wp_wow_recruitment_options', 'deathknight');
register_setting('wp_wow_recruitment_options', 'druid');
register_setting('wp_wow_recruitment_options', 'hunter');
register_setting('wp_wow_recruitment_options', 'mage');
register_setting('wp_wow_recruitment_options', 'monk');
register_setting('wp_wow_recruitment_options', 'paladin');
register_setting('wp_wow_recruitment_options', 'priest');
register_setting('wp_wow_recruitment_options', 'rogue');
register_setting('wp_wow_recruitment_options', 'shaman');
register_setting('wp_wow_recruitment_options', 'warlock');
register_setting('wp_wow_recruitment_options', 'warrior');
register_setting('wp_wow_recruitment_options', 'icon-size');
register_setting('wp_wow_recruitment_options', 'icon-grayscale');
register_setting('wp_wow_recruitment_options', 'icon-class');

} // END public static function activate
public function intro_section_wp_wow_recruitment()
{
	echo 'Select the class specializations that you are recruiting for. To select/deslect all specializations for a class, select the class icon.';
}
public function settings_section_wp_wow_recruitment()
{
	echo 'These settings can change the how the icons are displayed.';
}
public function class_icon_show()
{
	$options = get_option('icon-class');
	if( $options == '' ){
		$options = 'on';
	}
	$html = '';
	$html .= '<input type="hidden" name="icon-class" value="off" />';
	$html .= '<input type="checkbox" name="icon-class" id="icon-class-yes" ' . checked( $options, "on", false ) . ' />';
	echo $html;
}
public function class_icon_grayscale()
{
	$options = get_option('icon-grayscale');
	if( $options == '' ){
		$options = 'on';
	}
	$html = '';
	$html .= '<input type="hidden" name="icon-grayscale" value="off" />';
	$html .= '<input type="checkbox" name="icon-grayscale" id="icon-grayscale-yes" ' . checked( $options, "on", false ) . ' />';
	$html .= 'If unchecked, the icons of un-needed specs will not show.';
	echo $html;
}
public function class_icon_size($args)
{
$sizes = $args['sizes'];
$options = get_option('icon-size');
$html = '';
$html = '<table class="wp-wow-recruitment-table"><tr>';
foreach( $sizes as $size => $value ){
$image = '';
if( $value > 16 ){
	$image = 'druid-guardian-lrg.jpg';
}
else {
	$image = 'druid-guardian.gif';
}
$checked = '';
if( $options == $value ){
	$checked = 'checked';
}
else if( $options == '' && $value == '25'){
	$checked = 'checked';
}
$html .= sprintf('<td style="display: table-cell;vertical-align: bottom;"><input type="radio" name="icon-size" id="icon-size-%1$s" value="%2$s" %3$s />', $size, $value, $checked);
$html .= sprintf('<label for="icon-size-%1$s"><img src="%3$simages/%4$s" width="%2$s" /></label></td>', $size, $value, plugin_dir_url( __FILE__ ), $image);
}
$html .= '</tr></table>';
echo $html;
}
public function class_spec_selection($args)
{
$class = $args['class'];
$specs = $args['specs'];
$options = array();
$options = get_option($class);

if($options != ""){
$checked = in_array($class, $options) ? 'checked="checked"' : '';
}
else{
$checked = '';
} 
$htmlSpecs = sprintf('<td style="padding:0;margin:0;"><input type="checkbox" class="jq-class" name="%1$s[]" id="%1$s" onClick="toggleAll(this)" value="%1$s" %2$s /></td>', $class, $checked);
$htmlSpecsImg = sprintf('<td style="padding:0;margin:0;"><img src="%2$simages/%1$s.gif" width="15" height="15" /></td>', $class, plugin_dir_url( __FILE__ ));
foreach( $specs as $key ){
if($options != ""){
$checked = in_array($key, $options) ? 'checked="checked"' : '';
}
else{
$checked = '';
}
$htmlSpecs .= sprintf('<td style="padding:0;margin:0;"><input type="checkbox" name="%1$s[]" id="%1$s[%2$s]" value="%2$s" %3$s /></td>', $class, $key, $checked);
$htmlSpecsImg .= sprintf('<td style="padding:0;margin:0;"><img src="%3$simages/%1$s-%2$s.gif" width="15" height="15" /></td>', $class, $key, plugin_dir_url( __FILE__ ));

}
$script = '<script language="JavaScript">function toggleAll(source) {checkboxes = document.getElementsByName(source.name);for(var i=0, n=checkboxes.length;i<n;i++) {checkboxes[i].checked = source.checked;}}</script>';
$html = sprintf('<table style="padding:0;margin:0;"><tr style="padding:0;margin:0;">%1$s</tr><tr style="padding:0;margin:0;">%2$s</tr></table>', $htmlSpecsImg, $htmlSpecs);
echo $script ." ". $html;
}
/**
* add a menu
*/	
public function add_menu()
{
// Add a page to manage this plugin's settings
add_options_page(
'WP WoW Recruitment Settings',
'WP WoW Recruitment',
'manage_options',
'wp_wow_recruitment',
array(&$this, 'plugin_settings_page')
);
} // END public function add_menu()
/**
* Menu Callback
*/	
public function plugin_settings_page()
{
if(!current_user_can('manage_options'))
{
wp_die(__('You do not have sufficient permissions to access this page.'));
}
// Render the settings template
include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
} // END public function plugin_settings_page()
} // END class WP_WoW_Recruitment_Settings
} // END if(!class_exists('WP_WoW_Recruitment_Settings'))
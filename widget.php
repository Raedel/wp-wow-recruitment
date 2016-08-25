<?php
class WP_WoW_Recruitment_Widget extends WP_Widget {

	// constructor
	function WP_WoW_Recruitment_Widget() {
		parent::WP_Widget(false, $name = __('WoW Recruitment', 'wp_widget_plugin'));
	}

	// widget form creation
	function form($instance) {	
		// Check values
		if( $instance) {
			$title = esc_attr($instance['title']);
			$textarea = $instance['textarea'];
		} else {
			$title = '';
			$textarea = '';
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'wp_widget_plugin'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Description:', 'wp_widget_plugin'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>" rows="7" cols="20" ><?php echo $textarea; ?></textarea>
		</p>
		<?php
	}


	

	// widget update
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['textarea'] = strip_tags($new_instance['textarea']);
		return $instance;
	}

	// widget display
	function widget($args, $instance) {
		extract( $args );
		wp_register_style( 'wp_wow_recruitment_css', plugin_dir_url( __FILE__ ) . 'css/wp_wow_recruitment.css' );
		wp_enqueue_style('wp_wow_recruitment_css');
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$textarea = $instance['textarea'];
		echo $before_widget;

		// Display the widget
		echo '<div style="padding:0;margin:0;">';
		// Check if title is set
		if ( $title ) {
			echo $before_title . $title . $after_title ;
		}


		// Check if textarea is set
		echo '<div style="padding:0;margin:0;">';
		if( $textarea ) {
			echo '<p style="padding:0;margin:0;">'.$textarea.'</p>';
		}
		
		$iconSize = get_option('icon-size');
		$iconGrayscale = get_option('icon-grayscale');
		$showClassIcon = get_option('icon-class');
		$classImage = '';
		$imageMime = '';
		$defaultSize = '';
		if( $iconSize == '' ){
			$imageMime = '-lrg.jpg';
			$defaultSize = '25';
		}
		else if( $iconSize != null && $iconSize == 16){
			$imageMime = '.gif';
		}
		else{
			$imageMime = '-lrg.jpg';
		}
		
		$classes = array(
				"Deathknight" => array("blood","frost","unholy"),
				"Druid" => array("guardian","feral","balance","restoration"),
				"Hunter" => array("beastmastery","marksmanship","survival"),
				"Mage" => array("frost","arcane","fire"),
				"Monk" => array("brewmaster","windwalker","mistweaver"),
				"Paladin" => array("protection","retribution","holy"),
				"Priest" => array("shadow","discipline","holy"),
				"Rogue" => array("assassination","combat","subtlety"),
				"Shaman" => array("elemental","enhancement","restoration"),
				"Warlock" => array("affliction","demonology","destruction"),
				"Warrior" => array("protection","arms","fury")
				);
		echo '<table style="width:90%;padding:15px 0;margin:0 auto 0 auto;">';
		foreach($classes as $class => $specs){
			$options = get_option($class);
			if($options != '' ){
				$specInArray = '';
				$specInArray = array_intersect($specs,$options);
				if(in_array(strtolower($class),$options) || $specInArray != '' || $iconGrayscale == "on"){
					if( $showClassIcon != "off" && $showClassIcon != '' ){
						$classImage = sprintf('<img src="%1$simages/%2$s%3$s" width="%4$s" title="%2$s" style="padding-left: 5px;" />', plugin_dir_url( __FILE__ ), 
								strtolower($class), $imageMime, $iconSize);
					}
					echo '<tr><td style="padding:2px 15px 2px 0;"><h5 class="wow-class-heading" style="text-align:right;padding:0;margin:0;">'.$class. ' ' . $classImage . '</h5></td>';
				}
				foreach($specs as $spec){
					if(in_array($spec, $options)){
						echo sprintf('<td style="padding:2px 5px;"><img src="%1$simages/%2$s-%3$s%4$s" width="%5$s" title="%3$s" /></td>', 
								plugin_dir_url( __FILE__ ),strtolower($class),$spec,$imageMime,$iconSize );
					}
					else if( $iconGrayscale == "on" ){
						echo sprintf('<td style="padding:2px 5px;"><img src="%1$simages/%2$s-%3$s%4$s" width="%5$s" 
							      class="wp-wow-recruit-grayscale" title="%3$s" /></td>', plugin_dir_url( __FILE__ ),strtolower($class),$spec,$imageMime,$iconSize);
					}
				}
				echo '</tr>';
			}
			else if( $iconGrayscale == "on" ){
				if( $showClassIcon != "off" && $showClassIcon != '' ){
					$classImage = sprintf('<img src="%1$simages/%2$s%3$s" width="%4$s" title="%2$s" style="padding-left: 5px;" class="wp-wow-recruit-grayscale" />', 
							plugin_dir_url( __FILE__ ), strtolower($class), $imageMime, $iconSize);
				}
				echo '<tr><td style="padding:2px 15px 2px 0;"><h5 class="wow-class-heading" style="text-align:right;padding:0;margin:0;">'.$class. ' ' . $classImage . '</h5></td>';
				foreach($specs as $spec){
					echo sprintf('<td style="padding:2px 5px;"><img src="%1$simages/%2$s-%3$s%4$s" width="%5$s" 
						     class="wp-wow-recruit-grayscale" title="%3$s" /></td>', plugin_dir_url( __FILE__ ),strtolower($class),$spec,$imageMime,$iconSize);
				}
				echo '</tr>';
			}
		}
		echo '</table>';
		echo '</div>';
		echo '</div>';
		echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("WP_WoW_Recruitment_Widget");'));
?>
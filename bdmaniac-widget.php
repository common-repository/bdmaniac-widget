<?php
/*
Plugin Name: BD Maniac Widget
Plugin URI: http://bdmaniac.fr
Description: This widget allows you to view your profile and your last Maniac comic books
Version: 1.0
Author: Steaw
Author URI: http://steaw.com
License: GPL2
*/
?>

<?php

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'bdmaniac_load_widgets' );

function bdmaniac_load_widgets() {
	register_widget( 'BDManiac_Widget' );
}

class BDManiac_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function BDManiac_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'bdmaniac', 'description' => __('Ce widget vous permet d&#39;afficher votre profil BD Maniac ainsi que vos dernières lectures', 'bdmaniac') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'id_base' => 'bdmaniac-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'bdmaniac-widget', __('BD Maniac Widget', 'bdmaniac'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$name = $instance['name'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display name from widget settings if one was input. */
		if ( $name )?>
		
		<div class="widget_bdmaniac">
		<iframe src="http://bdmaniac.fr/widgets/user_profile/<?php echo $instance['name']; ?>" width="100%" height="432" frameborder="0" scrolling="no"></iframe>
		<div style="font-size:11px;"><a href="http://bdmaniac.fr/">BD Maniac</a> - <a href="http://actus.bdmaniac.fr">Actus BD</a> - <a href="http://bdmaniac.fr/users/sign_up">Devenir membre</a></div>
		</div>
		
		<?php
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['name'] = strip_tags( $new_instance['name'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('bdmaniac', 'bdmaniac'), 'name' => __('hollin', 'bdmaniac') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Your Name: Text Input -->
		<div class="widget_bdmaniac">
		<iframe src="http://bdmaniac.fr/widgets/user_profile/<?php echo $instance['name']; ?>" width="100%" height="432" frameborder="0" scrolling="no"></iframe>
		<div style="font-size:11px;"><a href="http://bdmaniac.fr/">BD Maniac</a> - <a href="http://actus.bdmaniac.fr">Actus BD</a> - <a href="http://bdmaniac.fr/users/sign_up">Devenir membre</a></div>
		</div>
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Votre nom:', 'bdmaniac'); ?></label>
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
		</p>
	<?php
	}
}

?>

<?php
/*  Copyright 2011  Steaw.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
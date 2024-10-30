<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
* Register shortcode
*/
function mpodmf_register_shortcode(){
	add_shortcode('modlitba_za_farnost', 'modlitba_za_farnost'); //Select control -> register
}
add_action( 'init', 'mpodmf_register_shortcode',1);

/*
* Shortcode to display the current prayer
*/
function modlitba_za_farnost($attrs) {
  $attrs = (object) shortcode_atts( array(
 ), $attrs );

	if (get_option('mod_za_far_date') != current_time('Y-m-d')) 
	{
		mpodmf_get_today_modlitba(); // Refresh, if today's prayer not presenet in DB
	}
	
	$modlitba = "<div class='modlitba-za-farnost'>";
		$modlitba .= wp_kses(get_option('mod_za_far_text'), array(
			'br' => array(),
			'strong' => array()
		));
	$modlitba .= "</div>";	

	return $modlitba;
}

/*
* Function to refresh daily prayer from abuba.sk
*/
function mpodmf_get_today_modlitba() {

	$modlitba_url= "https://www.abuba.sk/knazi/farnosti.php";
	$response = wp_remote_get($modlitba_url, array('timeout' => 30));
	$modlitba = wp_kses($response['body'], array(
		'br' => array(),
		'strong' => array()
	));

	update_option('mod_za_far_text',$modlitba);
	update_option('mod_za_far_date',current_time('Y-m-d'));
}
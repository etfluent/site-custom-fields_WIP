<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://etfluent.com
 * @since      1.0.0
 *
 * @package    Site_Custom_Fields
 * @subpackage Site_Custom_Fields/admin/partials
 */
?>

<?php
/**
 * Variables Declared
 */

global $wpdb;

// debug to console function
function debug_to_console( $data ) {
    $output = "<script>console.log( $data );</script>";
    echo $output;
}

// get amount of fields in database
$count_result = $wpdb->get_var(
	$wpdb->prepare(
		"
		SELECT option_value
		FROM $wpdb->options
		WHERE option_name = 'SCF_field_count'
		"
	)
);
?>

<?php
// insert field_count and initial field data options if none exists
// also tells wether to show make-new-area or not based on if this
// will be the first field or not
if ($count_result == 0 || $count_result == null) {
	$wpdb->insert( 
		$wpdb->options, 
		array( 
			'option_name' => 'SCF_field_count',
			'option_value' => '1'
		)
	);
	$wpdb->insert( 
		$wpdb->options, 
		array( 
			'option_name' => 'SCF_field_1_data',
			'option_value' => '<p>Enter the input for your first field here...</p>'
		)
	);
	$count_result = 1;
}

// add count values to an array based on how many fields there is
for ($i = 0; $i < $count_result; $i++){
    $SCF_array[] = $i+1;
}

?>

<div class='wrap'>
	<h2>Site Custom Fields</h2>

<!-- begin edit-existing-area -->
<!-- iterate through array above and create editable form for each data field -->
	<?php foreach($SCF_array as $value): ?>

		<form method="post" action="options.php">
			<?php
				wp_nonce_field('update-options'); 
				debug_to_console( $count_result );
			?>

		    <?php $val_to_string = strval($value); ?>

				<p><strong>Field <?php echo $val_to_string ?> data</strong><br />
				<textarea name="SCF_field_<?php echo $val_to_string; ?>_data" cols="100"><?php echo get_option('SCF_field_'.$val_to_string.'_data'); ?></textarea></p>
				<input type="hidden" name="page_options" value="<?php echo 'SCF_field_'.$val_to_string.'_data'; ?>"/>

			<?php $val_to_string = strval($value+1); ?>

			<p><input type="submit" name="Submit" value="Update Field" /></p>

			<input type="hidden" name="action" value="update" />

		</form>

	<?php endforeach; ?>
<!-- end edit-existing-area -->

<!-- begin make-new-area -->
		<form method="post" action="options.php">
			<?php wp_nonce_field('update-options'); ?>

			<p><strong>Add Field <?php echo $val_to_string ?> data</strong><br />
			<textarea name="SCF_field_<?php echo $val_to_string; ?>_data" cols="100"></textarea></p>
			<p style="display:none;"><textarea name="SCF_field_count" cols="100"><?php echo $val_to_string; ?></textarea></p>				
			<input type="hidden" name="page_options" value="<?php echo 'SCF_field_'.$val_to_string.'_data'; ?>, SCF_field_count"/>

			<p><input type="submit" name="Submit" value="Add Field" /></p>

			<input type="hidden" name="action" value="update" />

		</form>
<!-- end make-new-area -->
</div>

<?php
// add shortcodes for fields
// function bartag_func( $atts, $count_result ) {
// 	$SCF_shortcode_array = array();
// 	for ($i = 0; $i < $count_result; $i++){
// 		$SCF_shortcode_array[$i] = shortcode_atts( array(
// 			$i => $i,
// 		), $atts );
// 	}

// 	return "foo = {$a['foo']}";
// }
// 	add_shortcode( 'bartag', 'bartag_func' );
?>
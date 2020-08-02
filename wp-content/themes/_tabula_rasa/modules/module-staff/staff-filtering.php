<?php
/**
 * 
 */

	$depts = !empty($mC['allowed_filters']['departments']) ? $mC['allowed_filters']['departments'] : '';
	$tags = !empty($mC['allowed_filters']['tags']) ? $mC['allowed_filters']['tags'] : '';


	$guides['filter-option'] = '<option value="%2$s">%1$s</option>';
	
	$return .= '<div class="staff-filtering js__staff-filtering"><form>';
	
	// if we have departments
	if( !empty($mC['allowed_filters']['departments']) ){

		$return .= '<div class="filters"><label><span>Departments:</span><select multiple><option disabled > - select an option - </option>';
		// loop thru each department
		foreach( $mC['allowed_filters']['departments'] as $department ){

			// add an <option> for this department
			$return .= sprintf(
				$guides['filter-option']
				,get_term($department, 'departments')->name
				,get_term($department, 'departments')->slug
			);

		}
		$return .= '</select></label></div>';

	}

	
	// if we have tags
	if( !empty($mC['allowed_filters']['tags']) ){

		$return .= '<div class="filters"><label><span>Tags:</span><select multiple><option disabled> - select an option - </option>';
		// loop thru each department
		foreach( $mC['allowed_filters']['tags'] as $tag ){

			// add an <option> for this department
			$return .= sprintf(
				$guides['filter-option']
				,get_term($tag, 'staff-tags')->name
				,get_term($tag, 'staff-tags')->slug
			);

		}
		$return .= '</select></label></div>';

	}

	$return .= '<input type="submit" value="Filter" class="button" /></form></div>';
	
	
// 
?>
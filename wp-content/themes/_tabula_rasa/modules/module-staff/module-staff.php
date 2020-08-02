<?php 
/**
 * 
 */


	$return = '';
	$guides = [
		'
		<li class="staffmember">
			<a href="%4$s" title="More about %2$s"%5$s>
			<div class="headshot"><img %1$s alt="" /></div>
			<div class="content">
				<p>%2$s</p>
				%3$s
				%6$s
			</div>
			</a>
		</li>
		',
		'
		<li class="staffmember">
			<div class="headshot"><img %1$s alt="" /></div>
			<div class="content">
				<p>%2$s</p>
				%3$s
				%6$s
			</div>
		</li>
		'
	];
	

	$return .= '
		<section class="tr__module tr__module-'.$mC['acf_fc_layout'].'">
			<div class="container '.$mC['width'].' flexgrid cols-'.$mC['options']['col_count'].'">
	';


	if( !empty($mC['options']['enable_filtering']) ){
    include( locate_template( '/modules/module-staff/staff-filtering.php', false, false ) );
	}



	// 
	$linkToDetail = !empty($mC['options']['link_to_detail']) ? true : false;

	$return .= '<ul>';
	foreach( $mC['staff_members'] as $sM ){

		// get staff member fields
		$rec = get_fields($sM)['staff_member'];
		
		// set empty vars
		$linkAttrs = '';
		$linkUrl = get_permalink($sM);

		// enable lightbox
		if( !empty($mC['options']['use_lightbox']) ) {
			$linkUrl = 'javascript:void(0);'; // remove link href
			$linkAttrs = ' class="js__biolightbox" data-action="tr__biolightbox" data-postid="'.$sM.'"'; // add mfp attrs
		}
		
		// use custom profile URL
		if( !empty($rec['profile_url']) ) {
			$linkUrl = $rec['profile_url']; // override href to custom profile (over enabled lightbox)
		}

		$srcset = wp_get_attachment_image_srcset( $rec['headshot']['ID'] );

		$return .= sprintf(
			$linkToDetail ? $guides[0] : $guides[1]
			// required
			,'src="'.$rec['headshot']['url'].'" srcset="'.$srcset.'"'
			,$rec['name']
			,'<p><small>'.$rec['title'].'</small></p>'
			// link to lightbox, post single, or custom profile URL
			,$linkUrl
			,$linkAttrs
			,!empty($rec['excerpt']) ? '<p class="excerpt">'.$rec['excerpt'].'</p>' : ''
		);
		
	}
	

	$return .= '</ul></div></section>';

	
	echo $return;

 ?>
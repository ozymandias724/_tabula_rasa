<?php
/**
 * 
 */

$return = '';
$guides = [
  '
  <div>
    <div class="staffmember">
      <div class="headshot"><img %1$s alt="" /></div>
      <div class="content">
        <p>%2$s</p>
        %3$s
      </div>
    </div>
  </div>
  '
];

$return .= sprintf(
  $guides[0]
  // required
  ,'src="'.$rec['headshot']['url'].'" srcset="'.$srcset.'"'
  ,$rec['name']
  ,'<p><small>'.$rec['title'].'</small></p>'
);
  
  

echo $return;
// 
?>
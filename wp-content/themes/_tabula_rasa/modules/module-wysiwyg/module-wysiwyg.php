<?php
/**
 * 
 */

  $return = '';
  $guides = [
    '<section class="tr__module tr__module-'.$mC['acf_fc_layout'].'">
      <div class="container %1$s">
        %2$s
      <div>
    </section>'
  ];


  /**
   * 
   */
    $return .= sprintf(
      $guides[0]
      ,$mC['width']
      ,$mC['content']
    );
    
  // 





  echo $return;
// 
?>
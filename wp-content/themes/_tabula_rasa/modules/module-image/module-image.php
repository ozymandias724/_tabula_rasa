<?php 
/**
 * 
 */



  $return = '<section class="tr__module tr__module-'.$mC['acf_fc_layout'].'"><div class="container '.$mC['image_module']['width'].'">';
  $guides = [
    '<figure><img src="%1$s" srcset="%2$s" sizes="%3$s" alt="%4$s" />%5$s</figure>'
  ];


  $rec = $mC['image_module'];



  $return .= sprintf(
    $guides[0]
    ,$rec['image']['url']
    ,wp_get_attachment_image_srcset( $rec['image']['ID'], 'large' )
    ,wp_get_attachment_image_sizes( $rec['image']['ID'], 'large' )
    ,$rec['image']['alt']
    ,''
  );

  $return .= '</div></section>';
  
  
  echo $return;

  
    


 ?>
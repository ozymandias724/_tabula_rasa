<?php
/**
 * 
 */

  if( !empty($fields['hero']) ){
  
    $guides = [
      '<section class="hero">
        <div class="container%1$s">
          %2$s
        </div>
      </section>',
      '<div class="bgimage" style="background-image: url(%1$s);">
        <div>%2$s%3$s</div>
      </div>'
    ];


    if( $fields['hero']['type'] == 'image' ){

      $heroContent = sprintf(
        $guides[1]
        ,$fields['hero']['image']['url']
        ,(!empty( $fields['hero']['title'] ) ? '<h1>'.$fields['hero']['title'].'</h1>' : '')
        ,(!empty( $fields['hero']['subtitle'] ) ? '<h2>'.$fields['hero']['subtitle'].'</h2>' : '')
      );
    }

    
    $return = sprintf(
      $guides[0]
      ,' '.$fields['hero']['width']
      ,$heroContent
    );
  
    
  
    echo $return;

  }
?>
<?php
/**
 * 
 */

    if( !empty($fields['page_hero']['status']) ){
  
    $guides = [
      '
        <section class="hero">
          <div class="container%1$s">
            %2$s
          </div>
        </section>
      '
      ,
        '<div class="bgimage" style="background-image: url(%1$s);">
          <div>%2$s%3$s</div>
        </div>
      '
    ];


    if( $fields['page_hero']['type'] == 'image' ){

      $heroContent = sprintf(
        $guides[1]
        ,$fields['page_hero']['image']['url']
        ,(!empty( $fields['page_hero']['title'] ) ? '<h1>'.$fields['page_hero']['title'].'</h1>' : '')
        ,(!empty( $fields['page_hero']['subtitle'] ) ? '<h2>'.$fields['page_hero']['subtitle'].'</h2>' : '')
      );
    }

    
    $return = sprintf(
      $guides[0]
      ,' '.$fields['page_hero']['width']
      ,$heroContent
    );
  
    
  
    echo $return;

  }
?>
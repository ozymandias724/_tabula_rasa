<?php


  $guides = [
    '<section class="tr__module tr__module_columns"><div class="container">%1$s</div></section>'
  ];
  
  
  $return = ['columns' => '', 'module' => ''];



  $return['columns'] .= '<div class="flexgrid"><ul>';


  
  foreach($cB['columns'] as $i => $column){

    $return['columns'] .= '<li>';
    
    foreach( $column as $rows ){

      foreach($rows as $row){

        $cB = $row;

        ob_start();
        include_once(locate_template( 'modules/'.$cB['acf_fc_layout'].'/module.'.$cB['acf_fc_layout'].'.php'));
        $return['columns'] .= ob_get_clean();

      }
      

    }

    $return['columns'] .= '</li>';

  }
  $return['columns'] .= '</ul></div>';


  $return['module'] .= sprintf(
    $guides[0]
    ,$return['columns']
  );
  
  
  echo $return['module'];

?>
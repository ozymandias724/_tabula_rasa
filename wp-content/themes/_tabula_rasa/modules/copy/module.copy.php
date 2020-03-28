<?php

  $guides = [
    '<section class="tr__module tr__module_copy"><div class="container">%1$s</div></section>'
  ];
  $return = sprintf(
    $guides[0]
    ,$cB['copy']
  );
  
  
  echo $return;

  unset($cB);
?>
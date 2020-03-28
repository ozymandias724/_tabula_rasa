<?php

function tr__header_nav($echo = false){
  $args = array(
    'theme_location' => 'header'
    ,'walker' => new Tabula_Rasa_Nav_Menu
    ,'echo' => $echo
    ,'container' => 'nav'
    ,'container_class' => 'navlinks'
    ,'link_before' => '<span>'
    ,'link_after' => '</span>'
  );
  return wp_nav_menu($args);
}


?>
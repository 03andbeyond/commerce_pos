<?php

class POSPane_Alerts extends POS_Pane {


  function build(POS_State $state, POS_Button_Registry $registry, $js = FALSE) {
    return $js ? array('#theme' => 'status_messages') : array();
  }
}
<?php


class POSPane_Commands extends POS_Pane {
  protected $config = array(
    'show_keypad' => FALSE,
  );

  function build(POS_State $state, POS_Button_Registry $registry, $js = FALSE) {
    $buttons = array();
    $numbers = array();
    foreach ($registry->getButtons() as $button) {
      if ($button->access(NULL, $state)) {
        $buttons[] = $button->render();
      }
    }
    if ($this->config['show_keypad']) {
      foreach (range(9, 0) as $i) {
        $numbers[] = '<span class="pos-button" data-pos-input="%s' . $i . '" data-pos-submit="false">' . $i . '</span>';
      }
      $numbers[] = '<span class="pos-button" data-pos-input="%s*" data-pos-submit="false">*</span>';
    }

    return array(
      '#theme' => 'pos_buttons',
      '#buttons' => $buttons,
      '#numbers' => $numbers,
    );
  }
}
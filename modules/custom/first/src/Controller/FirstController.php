<?php

namespace Drupal\first\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class FirstController.
 */
class FirstController extends ControllerBase {

  /**
   * Content.
   *
   * @return string
   *   Return Hello string.
   */
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hey Dude! Whatsupp!'),
    ];
  }

  /**
   * First Tab Content.
   */
  public function tab() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Second Tab'),
    ];
  }

}

<?php

namespace Drupal\jsset\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class JssetController.
 */
class JssetController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function jsPage() {
    return [
      '#type' => 'markup',
      '#markup' => '<div class="js-var"></div>',
      '#attached' => [
        'library' => ['jsset/jsset'],
        'drupalSettings' => [
          'js_example' => [
            'test' => "Parameter works!",
          ],
        ],
      ],
    ];
  }

}
